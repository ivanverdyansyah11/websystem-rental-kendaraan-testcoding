<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Laporan;
use App\Models\Pajak;
use Illuminate\Http\Request;

class PajakController extends Controller
{
    public function index()
    {
        return view('pajak.index', [
            'title' => 'Pajak',
            'kendaraans' => Kendaraan::paginate(6),
        ]);
    }

    public function search(Request $request)
    {
        $kendaraans = Kendaraan::where('nomor_plat', 'like', '%' . $request->search . '%')
            ->orWhere('kilometer_saat_ini', 'like', '%' . $request->search . '%')
            ->orWhere('tarif_sewa_hari', 'like', '%' . $request->search . '%')
            ->orWhere('tarif_sewa_minggu', 'like', '%' . $request->search . '%')
            ->orWhere('tarif_sewa_bulan', 'like', '%' . $request->search . '%')
            ->orWhere('tahun_pembuatan', 'like', '%' . $request->search . '%')
            ->orWhere('tanggal_pembelian', 'like', '%' . $request->search . '%')
            ->orWhere('warna', 'like', '%' . $request->search . '%')
            ->orWhere('nomor_rangka', 'like', '%' . $request->search . '%')
            ->orWhere('nomor_mesin', 'like', '%' . $request->search . '%')
            ->paginate(6);

        return view('pajak.index', [
            'title' => 'Pajak',
            'kendaraans' => $kendaraans,
        ]);
    }

    public function transaction($id)
    {
        return view('pajak.transaction', [
            'title' => 'Pajak',
            'kendaraan' => Kendaraan::where('id', $id)->with('jenis_kendaraan', 'brand_kendaraan', 'seri_kendaraan')->first(),
        ]);
    }

    public function transactionAction($id, Request $request)
    {
        $validatedData = $request->validate([
            'jenis_pajak' => 'required|string',
            'tanggal_bayar' => 'required|date',
            'metode_bayar' => 'required|string',
            'jumlah_bayar' => 'required|string',
            'finance' => 'required|string',
        ]);

        $validatedData['kendaraans_id'] = $id;
        $pajak = Pajak::create($validatedData);
        $pajakID = Pajak::latest()->first();
        $laporan = Laporan::create([
            'penggunas_id' => auth()->user()->id,
            'relations_id' => $pajakID->id,
            'kategori_laporan' => 'pajak',
        ]);

        if ($pajak && $laporan) {
            return redirect(route('pajak'))->with('success', 'Berhasil Tambah Bayar Pajak Kendaraan!');
        } else {
            return redirect(route('pajak'))->with('failed', 'Gagal Tambah Bayar Pajak Kendaraan!');
        }
    }
}
