<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Laporan;
use App\Models\Servis;
use Illuminate\Http\Request;

class ServisController extends Controller
{
    public function index()
    {
        return view('servis.index', [
            'title' => 'Servis',
            'kendaraans' => Kendaraan::where('status', 'servis')->with('jenis_kendaraan', 'brand_kendaraan')->paginate(6),
        ]);
    }

    public function search(Request $request)
    {
        $kendaraans = Kendaraan::where('status', 'servis')
            ->where('nomor_plat', 'like', '%' . $request->search . '%')
            ->orWhere('kilometer_saat_ini', 'like', '%' . $request->search . '%')
            ->orWhere('tarif_sewa_hari', 'like', '%' . $request->search . '%')
            ->orWhere('tarif_sewa_minggu', 'like', '%' . $request->search . '%')
            ->orWhere('tarif_sewa_bulan', 'like', '%' . $request->search . '%')
            ->orWhere('tahun_pembuatan', 'like', '%' . $request->search . '%')
            ->orWhere('tanggal_pembelian', 'like', '%' . $request->search . '%')
            ->orWhere('warna', 'like', '%' . $request->search . '%')
            ->orWhere('nomor_rangka', 'like', '%' . $request->search . '%')
            ->orWhere('nomor_mesin', 'like', '%' . $request->search . '%')->paginate(6);

        return view('servis.index', [
            'title' => 'Servis',
            'kendaraans' => $kendaraans,
        ]);
    }

    public function check($id)
    {
        return view('servis.check', [
            'title' => 'Servis',
            'kendaraan' => Kendaraan::where('id', $id)->with('kilometer_kendaraan')->first(),
        ]);
    }

    public function checkAction($id, Request $request)
    {
        if ($request->air_accu == '' || $request->air_waiper == '' || $request->ban == '' || $request->oli == '') {
            return redirect(route('servis.check', $id))->with('failed', 'Isi Form Input Kelengkapan Kondisi Kendaraan Terlebih Dahulu!');
        }

        $validatedData = $request->validate([
            'tanggal_servis' => 'required|date',
            'kilometer_sebelum' => 'required|string',
            'kilometer_setelah' => 'required|string',
            'air_accu' => 'required|string',
            'air_waiper' => 'required|string',
            'ban' => 'required|string',
            'oli' => 'required|string',
            'total_bayar' => 'nullable|string',
            'keterangan' => 'nullable|string',
        ]);

        $validatedData['kendaraans_id'] = $id;

        $kendaraan = Kendaraan::where('id', $id)->first()->update([
            'kilometer' => $validatedData['kilometer_setelah'],
            'kilometer_saat_ini' => $validatedData['kilometer_setelah'],
            'status' => 'ready',
        ]);

        $servis = Servis::create($validatedData);
        $servisID = Servis::latest()->first();
        $laporan = Laporan::create([
            'penggunas_id' => auth()->user()->id,
            'relations_id' => $servisID->id,
            'kategori_laporan' => 'servis',
        ]);

        if ($servis && $kendaraan && $laporan) {
            return redirect(route('servis'))->with('success', 'Berhasil Melakukan Servis Kendaraan!');
        } else {
            return redirect(route('servis'))->with('failed', 'Gagal Melakukan Servis Kendaraan!');
        }
    }
}
