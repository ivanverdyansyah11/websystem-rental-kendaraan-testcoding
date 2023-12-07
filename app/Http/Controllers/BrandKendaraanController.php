<?php

namespace App\Http\Controllers;

use App\Models\BrandKendaraan;
use Illuminate\Http\Request;

class BrandKendaraanController extends Controller
{
    public function index()
    {
        return view('brand-kendaraan.index', [
            'title' => 'Kendaraan',
            'brands' => BrandKendaraan::paginate(6),
        ]);
    }

    public function search(Request $request)
    {
        $brands = BrandKendaraan::where('nama', 'like', '%' . $request->search . '%')->paginate(6);

        return view('brand-kendaraan.index', [
            'title' => 'Kendaraan',
            'brands' => $brands,
        ]);
    }

    function detail($id)
    {
        $brand = BrandKendaraan::where('id', $id)->first();
        return response()->json($brand);
    }

    function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $brand = BrandKendaraan::create($validatedData);

        if ($brand) {
            return redirect(route('brandKendaraan'))->with('success', 'Berhasil Tambah Brand Kendaraan!');
        } else {
            return redirect(route('brandKendaraan'))->with('failed', 'Gagal Tambah Brand Kendaraan!');
        }
    }

    function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $brand = BrandKendaraan::where('id', $id)->first()->update($validatedData);

        if ($brand) {
            return redirect(route('brandKendaraan'))->with('success', 'Berhasil Update Brand Kendaraan!');
        } else {
            return redirect(route('brandKendaraan'))->with('failed', 'Gagal Update Brand Kendaraan!');
        }
    }

    function delete($id)
    {
        $brand = BrandKendaraan::where('id', $id)->first()->delete();

        if ($brand) {
            return redirect(route('brandKendaraan'))->with('success', 'Berhasil Hapus Brand Kendaraan!');
        } else {
            return redirect(route('brandKendaraan'))->with('failed', 'Gagal Hapus Brand Kendaraan!');
        }
    }
}
