<?php

namespace App\Http\Controllers;

use App\Models\JenisKendaraan;
use Illuminate\Http\Request;

class JenisKendaraanController extends Controller
{
    public function index()
    {
        return view('jenis-kendaraan.index', [
            'title' => 'Kendaraan',
            'jenises' => JenisKendaraan::paginate(6),
        ]);
    }

    public function search(Request $request)
    {
        $jenises = JenisKendaraan::where('nama', 'like', '%' . $request->search . '%')->paginate(6);

        return view('jenis-kendaraan.index', [
            'title' => 'Kendaraan',
            'jenises' => $jenises,
        ]);
    }

    function detail($id)
    {
        $jenis = JenisKendaraan::where('id', $id)->first();
        return response()->json($jenis);
    }

    function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $jenis = JenisKendaraan::create($validatedData);

        if ($jenis) {
            return redirect(route('jenisKendaraan'))->with('success', 'Berhasil Tambah Jenis Kendaraan!');
        } else {
            return redirect(route('jenisKendaraan'))->with('failed', 'Gagal Tambah Jenis Kendaraan!');
        }
    }

    function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $jenis = JenisKendaraan::where('id', $id)->first()->update($validatedData);

        if ($jenis) {
            return redirect(route('jenisKendaraan'))->with('success', 'Berhasil Update Jenis Kendaraan!');
        } else {
            return redirect(route('jenisKendaraan'))->with('failed', 'Gagal Update Jenis Kendaraan!');
        }
    }

    function delete($id)
    {
        $jenis = JenisKendaraan::where('id', $id)->first()->delete();

        if ($jenis) {
            return redirect(route('jenisKendaraan'))->with('success', 'Berhasil Hapus Jenis Kendaraan!');
        } else {
            return redirect(route('jenisKendaraan'))->with('failed', 'Gagal Hapus Jenis Kendaraan!');
        }
    }
}
