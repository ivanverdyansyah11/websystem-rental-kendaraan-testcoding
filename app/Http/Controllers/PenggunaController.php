<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use App\Models\Pajak;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        return view('pengguna.index', [
            'title' => 'Pengguna',
            'penggunas' => Auth::paginate(6),
        ]);
    }

    public function search(Request $request)
    {
        $penggunas = Auth::where('nama_lengkap', 'like', '%' . $request->search . '%')
            ->orWhere('email', 'like', '%' . $request->search . '%')
            ->orWhere('role', 'like', '%' . $request->search . '%')
            ->paginate(6);

        return view('pengguna.index', [
            'title' => 'Pengguna',
            'penggunas' => $penggunas,
        ]);
    }

    function detail($id)
    {
        $pengguna = Auth::where('id', $id)->first();
        return response()->json($pengguna);
    }

    function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:3|max:255',
        ]);

        $validatedData['role'] = 'staff';

        $pengguna = Auth::create($validatedData);

        if ($pengguna) {
            return redirect(route('pengguna'))->with('success', 'Berhasil Tambah Pengguna!');
        } else {
            return redirect(route('pengguna'))->with('failed', 'Gagal Tambah Pengguna!');
        }
    }

    function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $pengguna = Auth::where('id', $id)->first()->update($validatedData);

        if ($pengguna) {
            return redirect(route('pengguna'))->with('success', 'Berhasil Update Pengguna!');
        } else {
            return redirect(route('pengguna'))->with('failed', 'Gagal Update Pengguna!');
        }
    }

    function delete($id)
    {
        $pengguna = Auth::where('id', $id)->first()->delete();

        if ($pengguna) {
            return redirect(route('pengguna'))->with('success', 'Berhasil Hapus Pengguna!');
        } else {
            return redirect(route('pengguna'))->with('failed', 'Gagal Hapus Pengguna!');
        }
    }
}
