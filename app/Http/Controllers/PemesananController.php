<?php

namespace App\Http\Controllers;

use App\Models\JenisKendaraan;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use App\Models\KelengkapanPemesanan;
use App\Models\Laporan;
use App\Models\Pelanggan;
use App\Models\PelepasanPemesanan;
use App\Models\PembayaranPemesanan;
use App\Models\Pemesanan;
use App\Models\Sopir;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class PemesananController extends Controller
{
    public function index()
    {
        return view('pemesanan.index', [
            'title' => 'Pemesanan',
            'bookings' => Pemesanan::where('status', '!=', 'selesai')->orderBy('tanggal_mulai', 'ASC')->paginate(6),
        ]);
    }

    public function searchBooking($id)
    {
        return view('pemesanan.index', [
            'title' => 'Pemesanan',
            'bookings' => Pemesanan::where('status', '!=', 'selesai')->where('kendaraans_id', $id)->orderBy('tanggal_mulai', 'ASC')->paginate(6),
        ]);
    }

    public function search(Request $request)
    {
        $bookings = Pemesanan::where('status', '!=', 'selesai')->where('tanggal_mulai', '>=', $request->tanggal_mulai)->where('tanggal_akhir', '<=', $request->tanggal_akhir)->orderBy('tanggal_mulai', 'ASC')->paginate(6);

        return view('pemesanan.index', [
            'title' => 'Pemesanan',
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
            'bookings' => $bookings,
        ]);
    }

    public function release($id)
    {
        $pemesanan = Pemesanan::where('id', $id)->first();

        $tanggalMulai = Carbon::parse($pemesanan->tanggal_mulai);
        $tanggalAkhir = Carbon::parse($pemesanan->tanggal_akhir);
        $waktuSewa = $tanggalMulai->diffInDays($tanggalAkhir);

        $totalHarian = (int)$pemesanan->total_harian * (int)$pemesanan->kendaraan->tarif_sewa_hari;
        $totalMingguan = (int)$pemesanan->total_mingguan * (int)$pemesanan->kendaraan->tarif_sewa_minggu;
        $totalBulanan = (int)$pemesanan->total_bulanan * (int)$pemesanan->kendaraan->tarif_sewa_bulan;

        $totalTarifSewa = $totalHarian + $totalMingguan + $totalBulanan;

        return view('pemesanan.release', [
            'title' => 'Pemesanan',
            'pemesanan' => $pemesanan,
            'sopirs' => Sopir::where('status', 'ada')->where('kelengkapan_ktp', 'lengkap')->where('kelengkapan_sim', 'lengkap')->where('kelengkapan_nomor_telepon', 'lengkap')->get(),
            'waktu_sewa' => $waktuSewa,
            'total_tarif_sewa' => $totalTarifSewa,
        ]);
    }

    public function releaseAction($id, Request $request)
    {
        $pemesanan = Pemesanan::where('id', $id)->with('pelanggan', 'kendaraan')->first();

        if ($request->sarung_jok == '' || $request->karpet == '' || $request->kondisi_kendaraan == '' || $request->ban_serep == '' || $request->jenis_pembayaran == '') {
            return redirect(route('pemesanan.release', $id))->with('failed', 'Isi Form Input Pelepasan & Pembayaran Kendaraan Terlebih Dahulu!');
        }

        if ($request->kondisi_kendaraan == 'rusak berat') {
            return redirect(route('pemesanan'))->with('failed', 'Kondisi Pada Kendaraan Ini Sedang Rusak Berat Tidak Dapat Digunakan!');
        }

        $validatedData = $request->validate([
            'kilometer_keluar' => 'required|string',
            'bensin_keluar' => 'required|string',
            'sarung_jok' => 'required|string',
            'karpet' => 'required|string',
            'kondisi_kendaraan' => 'required|string',
            'ban_serep' => 'required|string',
        ]);

        $validatedDataPembayaran = $request->validate([
            'foto_pembayaran' => 'required|image',
            'waktu_sewa' => 'required|string',
            'total_tarif_sewa' => 'required|string',
            'jenis_pembayaran' => 'required|string',
            'total_bayar' => 'nullable|string',
            'total_kembalian' => 'nullable|string',
            'metode_bayar' => 'nullable|string',
            'keterangan' => 'nullable|string',
        ]);

        $validatedData['pemesanans_id'] = $pemesanan->id;
        $validatedData['kendaraans_id'] = $pemesanan->kendaraans_id;

        $validatedDataPembayaran['kendaraans_id'] = $pemesanan->kendaraans_id;

        if (!$pemesanan->sopirs_id) {
            $validatedDataPembayaran['sopirs_id'] = null;
        } else {
            $validatedDataPembayaran['sopirs_id'] = $pemesanan->sopirs_id;
            // Sopir::where('id', $validatedDataPembayaran['sopirs_id'])->first()->update([
            //     'status' => 'tidak ada',
            // ]);
        }

        if ($request->metode_bayar == "-") {
            $validatedDataPembayaran['metode_bayar'] = null;
        }

        if (!empty($validatedDataPembayaran['foto_pembayaran'])) {
            $image = $request->file('foto_pembayaran');
            $imageName = date("Ymdhis") . "_" . $image->getClientOriginalName();
            $image->move(public_path('assets/img/pembayaran-pemesanan-images/'), $imageName);
            $validatedDataPembayaran['foto_pembayaran'] = $imageName;
        }

        $pelepasanPemesanan = PelepasanPemesanan::create($validatedData);
        $pelepasanPemesananID = PelepasanPemesanan::latest()->first();

        $validatedDataPembayaran['pelepasan_pemesanans_id'] = $pelepasanPemesananID->id;


        if ($validatedDataPembayaran['total_tarif_sewa'] < $validatedDataPembayaran['total_bayar']) {
            $validatedDataPembayaran['total_bayar'] = $validatedDataPembayaran['total_bayar'] - $validatedDataPembayaran['total_kembalian'];
        }

        $pembayaranPemesanan = PembayaranPemesanan::create($validatedDataPembayaran);
        $kendaraan = Kendaraan::where('id', $validatedData['kendaraans_id'])->first()->update([
            'kilometer_saat_ini' => $validatedData['kilometer_keluar'],
            'status' => 'dipesan',
        ]);

        $laporan = Laporan::create([
            'penggunas_id' => auth()->user()->id,
            'relations_id' => $validatedDataPembayaran['pelepasan_pemesanans_id'],
            'kategori_laporan' => 'pemesanan',
        ]);

        $pemesanan = $pemesanan->update([
            'status' => 'selesai booking',
        ]);

        if ($pelepasanPemesanan && $pembayaranPemesanan && $kendaraan && $laporan && $pemesanan) {
            return redirect(route('pemesanan'))->with('success', 'Berhasil Melakukan Pelepasan Kendaraan!');
        } else {
            return redirect(route('pemesanan'))->with('failed', 'Gagal Melakukan Pelepasan Kendaraan!');
        }
    }

    public function edit($id)
    {
        $pelepasanPemesanan = PelepasanPemesanan::where('pemesanans_id', $id)->with('pembayaran_pemesanan')->first();

        return view('pemesanan.edit-release', [
            'title' => 'Pemesanan',
            'laporan' => Laporan::where('relations_id', $pelepasanPemesanan->id)->where('kategori_laporan', 'pemesanan')->with('pengguna')->first(),
            'pemesanan' => Pemesanan::where('id', $id)->first(),
            'pelepasan_pemesanan' => $pelepasanPemesanan,
        ]);
    }

    public function update($id, Request $request)
    {
        if (is_null($request->foto_dokumen) && is_null($request->foto_kendaraan) && is_null($request->foto_pelanggan) && is_null($request->foto_pembayaran)) {
            return redirect(route('pemesanan.edit', $id))->with('failed', 'Silahkan input data dengan benar!');
        }

        $pelepasan_pemesanan = PelepasanPemesanan::where('pemesanans_id', $id)->with('pembayaran_pemesanan')->first();
        $pembayaran_pemesanan = PembayaranPemesanan::where('pelepasan_pemesanans_id', $pelepasan_pemesanan->id)->first();

        $validatedData = $request->validate([
            'foto_dokumen' => 'nullable|image',
            'foto_kendaraan' => 'nullable|image',
            'foto_pelanggan' => 'nullable|image',
            // 'kilometer_keluar' => 'required|string',
            // 'bensin_keluar' => 'required|string',
            // 'sarung_jok' => 'required|string',
            // 'karpet' => 'required|string',
            // 'kondisi_kendaraan' => 'required|string',
            // 'ban_serep' => 'required|string',
        ]);

        $validatedDataPembayaran = $request->validate([
            'foto_pembayaran' => 'nullable|image',
            // 'waktu_sewa' => 'required|string',
            // 'total_tarif_sewa' => 'required|string',
            // 'jenis_pembayaran' => 'required|string',
            // 'total_bayar' => 'nullable|string',
            // 'total_kembalian' => 'nullable|string',
            // 'metode_bayar' => 'nullable|string',
            // 'keterangan' => 'nullable|string',
        ]);

        if ($request->file('foto_dokumen')) {
            $path = "assets/img/pemesanan-dokumen-images/$pelepasan_pemesanan->foto_dokumen";

            if (File::exists($path)) {
                File::delete($path);
            }

            $image = $request->file('foto_dokumen');
            $imageName = date("Ymdhis") . "_" . $image->getClientOriginalName();
            $image->move(public_path('assets/img/pemesanan-dokumen-images/'), $imageName);
            $validatedData['foto_dokumen'] = $imageName;
        } else {
            if ($pelepasan_pemesanan->foto_dokumen) {
                $validatedData['foto_dokumen'] = $pelepasan_pemesanan->foto_dokumen;
            } else {
                $validatedData['foto_dokumen'] = null;
            }
        }

        if ($request->file('foto_kendaraan')) {
            $path = "assets/img/pemesanan-kendaraan-images/$pelepasan_pemesanan->foto_kendaraan";

            if (File::exists($path)) {
                File::delete($path);
            }

            $image = $request->file('foto_kendaraan');
            $imageName = date("Ymdhis") . "_" . $image->getClientOriginalName();
            $image->move(public_path('assets/img/pemesanan-kendaraan-images/'), $imageName);
            $validatedData['foto_kendaraan'] = $imageName;
        } else {
            if ($pelepasan_pemesanan->foto_kendaraan) {
                $validatedData['foto_kendaraan'] = $pelepasan_pemesanan->foto_kendaraan;
            } else {
                $validatedData['foto_kendaraan'] = null;
            }
        }

        if ($request->file('foto_pelanggan')) {
            $path = "assets/img/pemesanan-pelanggan-images/$pelepasan_pemesanan->foto_pelanggan";

            if (File::exists($path)) {
                File::delete($path);
            }

            $image = $request->file('foto_pelanggan');
            $imageName = date("Ymdhis") . "_" . $image->getClientOriginalName();
            $image->move(public_path('assets/img/pemesanan-pelanggan-images/'), $imageName);
            $validatedData['foto_pelanggan'] = $imageName;
        } else {
            if ($pelepasan_pemesanan->foto_pelanggan) {
                $validatedData['foto_pelanggan'] = $pelepasan_pemesanan->foto_pelanggan;
            } else {
                $validatedData['foto_pelanggan'] = null;
            }
        }

        if ($request->file('foto_pembayaran')) {
            $path = "assets/img/pembayaran-pemesanan-images/$pembayaran_pemesanan->foto_pembayaran";

            if (File::exists($path)) {
                File::delete($path);
            }

            $image = $request->file('foto_pembayaran');
            $imageName = date("Ymdhis") . "_" . $image->getClientOriginalName();
            $image->move(public_path('assets/img/pembayaran-pemesanan-images/'), $imageName);
            $validatedDataPembayaran['foto_pembayaran'] = $imageName;
        } else {
            $validatedDataPembayaran['foto_pembayaran'] = $pembayaran_pemesanan->foto_pembayaran;
        }

        $pembayaran_pemesanan = PembayaranPemesanan::where('pelepasan_pemesanans_id', $pelepasan_pemesanan->id)->first()->update($validatedDataPembayaran);
        $pelepasan_pemesanan = $pelepasan_pemesanan->update($validatedData);

        if ($pelepasan_pemesanan && $pembayaran_pemesanan) {
            return redirect(route('pemesanan'))->with('success', 'Berhasil Edit Pelepasan Kendaraan!');
        } else {
            return redirect(route('pemesanan'))->with('failed', 'Gagal Edit Pelepasan Kendaraan!');
        }
    }
}
