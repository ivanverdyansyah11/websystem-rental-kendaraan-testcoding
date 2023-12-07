<?php

namespace App\Http\Controllers;

use App\Models\JenisKendaraan;
use App\Models\Kendaraan;
use App\Models\Laporan;
use App\Models\Pelanggan;
use App\Models\PelepasanPemesanan;
use App\Models\PembayaranPemesanan;
use App\Models\Pemesanan;
use App\Models\Pengembalian;
use App\Models\Sopir;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index()
    {
        return view('pengembalian.index', [
            'title' => 'Pengembalian',
            'pemesanans' => PelepasanPemesanan::whereHas('kendaraan', function ($query) {
                $query->where('status', 'dipesan');
            })->with('pemesanan', 'kendaraan')->paginate(6),
        ]);
    }

    public function search(Request $request)
    {
        $pemesanans = PelepasanPemesanan::whereHas('pemesanan', function ($query) use ($request) {
            $query->where('tanggal_mulai', '>=', $request->tanggal_mulai)->where('tanggal_akhir', '<=', $request->tanggal_akhir);
        })->paginate(6);

        return view('pengembalian.index', [
            'title' => 'Pemesanan',
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
            'pemesanans' => $pemesanans,
        ]);
    }

    public function detail($id)
    {
        $pelepasan_pemesanan = PelepasanPemesanan::where('id', $id)->with('pemesanan', 'kendaraan')->first();

        return view('pengembalian.detail', [
            'title' => 'Pengembalian',
            'pelepasan_pemesanan' => $pelepasan_pemesanan,
        ]);
    }

    public function restoration($id)
    {
        return view('pengembalian.restoration', [
            'title' => 'Pengembalian',
            'pemesanan' => PelepasanPemesanan::where('id', $id)->with('pemesanan', 'kendaraan')->latest()->first(),
            'pembayaran' => PembayaranPemesanan::where('pelepasan_pemesanans_id', $id)->latest()->first(),
        ]);
    }

    public function restorationAction($id, Request $request)
    {
        $pemesanan = PelepasanPemesanan::where('kendaraans_id', $id)->with('kendaraan', 'pemesanan')->latest()->first();

        $pembayaran = PembayaranPemesanan::where('kendaraans_id', $id)->with('sopir')->latest()->first();

        if ($request->sarung_jok == '' || $request->karpet == '' || $request->kondisi_kendaraan == '' || $request->ban_serep == '' || $request->jenis_pembayaran == '' || $request->ketepatan_waktu == '') {
            return redirect(route('pengembalian.restoration', $id))->with('failed', 'Isi Form Input Pengembalian Kendaraan Terlebih Dahulu!');
        }

        $validatedData = $request->validate([
            'foto_pembayaran' => 'required|image',
            'jenis_pembayaran' => 'required|string',
            'total_bayar' => 'nullable|string',
            'total_kembalian' => 'nullable|string',
            'metode_bayar' => 'nullable|string',
            'tanggal_kembali' => 'required|date',
            'kilometer_kembali' => 'required|string',
            'bensin_kembali' => 'required|string',
            'ketepatan_waktu' => 'required|string',
            'terlambat' => 'nullable|string',
            'sarung_jok' => 'required|string',
            'karpet' => 'required|string',
            'kondisi_kendaraan' => 'required|string',
            'ban_serep' => 'required|string',
            'biaya_tambahan' => 'nullable|string',
            'keterangan' => 'nullable|string',
        ]);

        $validatedData['pelepasan_pemesanans_id'] = $pemesanan->id;

        if ($request->metode_bayar == "-") {
            $validatedData['metode_bayar'] = null;
        }

        if (!empty($validatedData['foto_pembayaran'])) {
            $image = $request->file('foto_pembayaran');
            $imageName = date("Ymdhis") . "_" . $image->getClientOriginalName();
            $image->move(public_path('assets/img/pengembalian-pemesanan-images/'), $imageName);
            $validatedData['foto_pembayaran'] = $imageName;
        }

        $kategori_kilometer = (int)$pemesanan->kendaraan->kilometer_kendaraan->jumlah;
        $kilometer_sebelumnya = (int)$pemesanan->kendaraan->kilometer;
        $kilometer_saat_ini = $validatedData['kilometer_kembali'];
        $total_kilometer = $kilometer_saat_ini - $kilometer_sebelumnya;

        $kendaraan = Kendaraan::where('id', $id)->first()->update([
            'kilometer_saat_ini' => $validatedData['kilometer_kembali'],
        ]);

        if ($total_kilometer >= $kategori_kilometer) {
            Kendaraan::where('id', $id)->first()->update([
                'status' => 'servis',
            ]);
        } else {
            Kendaraan::where('id', $id)->first()->update([
                'status' => 'ready',
            ]);
        }

        if ($pembayaran->sopirs_id !== null) {
            Sopir::where('id', $pembayaran->sopirs_id)->first()->update([
                'status' => 'ada',
            ]);
        }

        $pengembalian = Pengembalian::create($validatedData);
        $pengembalianID = Pengembalian::latest()->first();

        $laporan = Laporan::create([
            'penggunas_id' => auth()->user()->id,
            'relations_id' => $pengembalianID->id,
            'kategori_laporan' => 'pengembalian',
        ]);

        $pemesanan = Pemesanan::where('kendaraans_id', $id)->latest()->first()->update([
            'status' => 'selesai',
        ]);

        if ($pengembalian && $pemesanan && $kendaraan && $laporan) {
            return redirect(route('pengembalian'))->with('success', 'Berhasil Melakukan Pengembalian Kendaraan!');
        } else {
            return redirect(route('pengembalian'))->with('failed', 'Gagal Melakukan Pengembalian Kendaraan!');
        }
    }
}
