<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\PelepasanPemesanan;
use App\Models\PembayaranPemesanan;
use App\Models\Pemesanan;
use App\Models\PenambahanSewa;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PenambahanSewaController extends Controller
{
    public function create($id)
    {
        return view('penambahan-sewa.create', [
            'title' => 'Kendaraan Disewa',
            'pemesanan' => PelepasanPemesanan::where('id', $id)->with('kendaraan')->latest()->first(),
        ]);
    }

    public function store($id, Request $request)
    {
        $validatedData = $request->validate([
            'jumlah_hari' => 'required|string',
            'total_biaya' => 'required|string',
            'keterangan' => 'nullable|string'
        ]);

        $pelepasanPemesanan = PelepasanPemesanan::where('id', $id)->with('kendaraan', 'pemesanan')->latest()->first();
        $pembayaran = PembayaranPemesanan::where('pelepasan_pemesanans_id', $id)->latest()->first();

        $validatedData['pelepasan_pemesanans_id'] = $pelepasanPemesanan->id;
        $validatedData['kendaraans_id'] = $pelepasanPemesanan->kendaraan->id;

        $tanggal_akhir = Carbon::parse($pelepasanPemesanan->pemesanan->tanggal_akhir);
        $jumlah_hari = (int)$validatedData['jumlah_hari'];
        $tanggal_akhir->addDays($jumlah_hari);

        $pemesanan = PelepasanPemesanan::where('id', $id)->with('kendaraan', 'pemesanan')->latest()->first()->pemesanan->update([
            'tanggal_akhir' => $pelepasanPemesanan->pemesanan->tanggal_akhir,
            'tanggal_akhir_awal' => $tanggal_akhir,
        ]);

        $waktu_sewa = $pembayaran->waktu_sewa + (int)$validatedData['jumlah_hari'];
        $total_tarif_sewa = $pembayaran->total_tarif_sewa + (int)$validatedData['total_biaya'];

        $pembayaran = PembayaranPemesanan::where('pelepasan_pemesanans_id', $id)->latest()->first()->update([
            'waktu_sewa' => $waktu_sewa,
            'total_tarif_sewa' => $total_tarif_sewa,
            'jenis_pembayaran' => 'dp',
        ]);

        $penambahan = PenambahanSewa::create($validatedData);
        $penambahanID = PenambahanSewa::latest()->first();

        $laporan = Laporan::create([
            'penggunas_id' => auth()->user()->id,
            'relations_id' => $penambahanID->id,
            'kategori_laporan' => 'penambahan',
        ]);

        if ($penambahan && $pelepasanPemesanan && $pemesanan && $pembayaran && $laporan) {
            return redirect(route('pengembalian'))->with('success', 'Berhasil Melakukan Penambahan Hari Sewa Kendaraan!');
        } else {
            return redirect(route('pengembalian'))->with('failed', 'Gagal Melakukan Penambahan Hari Sewa Kendaraan!');
        }
    }
}
