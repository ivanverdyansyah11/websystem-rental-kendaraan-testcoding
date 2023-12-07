<?php

namespace App\Http\Controllers;

use App\Models\KelengkapanSopir;
use App\Models\Laporan;
use App\Models\Sopir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SopirController extends Controller
{
    public function index()
    {
        return view('sopir.index', [
            'title' => 'Sopir',
            'sopirs' => Sopir::paginate(6),
        ]);
    }

    public function search(Request $request)
    {
        $sopirs = Sopir::where('nama', 'like', '%' . $request->search . '%')
            ->orWhere('nik', 'like', '%' . $request->search . '%')
            ->orWhere('nomor_telepon', 'like', '%' . $request->search . '%')
            ->orWhere('nomor_ktp', 'like', '%' . $request->search . '%')
            ->orWhere('nomor_sim', 'like', '%' . $request->search . '%')
            ->orWhere('alamat', 'like', '%' . $request->search . '%')
            ->paginate(6);

        return view('sopir.index', [
            'title' => 'Sopir',
            'sopirs' => $sopirs,
        ]);
    }

    public function detail($id)
    {
        return view('sopir.detail', [
            'title' => 'Sopir',
            'sopir' => Sopir::where('id', $id)->first(),
        ]);
    }

    public function create()
    {
        return view('sopir.create', [
            'title' => 'Sopir',
        ]);
    }

    function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'nik' => 'required|string',
            'nomor_telepon' => 'nullable|string',
            'nomor_ktp' => 'nullable|string',
            'nomor_sim' => 'nullable|string',
            'foto_ktp' => 'nullable|image|max:2048',
            'foto_sim' => 'nullable|image|max:2048',
            'alamat' => 'required|string',
            'data_ktp' => 'required|string',
            'data_sim' => 'required|string',
            'data_nomor_telepon' => 'required|string',
        ]);

        if ($validatedData['data_ktp'] == '' || $validatedData['data_sim'] == '') {
            return redirect(route('sopir.create'))->with('failed', 'Isi Form Input Kelengkapan KTP & SIM Terlebih Dahulu!');
        }

        $validatedData['status'] = "ada";

        if (!empty($validatedData['foto_ktp'])) {
            $image = $request->file('foto_ktp');
            $imageName = date("Ymdhis") . "_" . $image->getClientOriginalName();
            $image->move(public_path('assets/img/ktp-images/'), $imageName);
            $validatedData['foto_ktp'] = $imageName;
        }

        if (!empty($validatedData['foto_sim'])) {
            $image = $request->file('foto_sim');
            $imageName = date("Ymdhis") . "_" . $image->getClientOriginalName();
            $image->move(public_path('assets/img/sim-images/'), $imageName);
            $validatedData['foto_sim'] = $imageName;
        }

        if ($request->foto_ktp && $validatedData['nomor_ktp'] !== null) {
            $validatedData['kelengkapan_ktp'] = 'lengkap';
        } else {
            $validatedData['kelengkapan_ktp'] = 'belum lengkap';
        }

        if ($request->foto_sim && $validatedData['nomor_sim'] !== null) {
            $validatedData['kelengkapan_sim'] = 'lengkap';
        } else {
            $validatedData['kelengkapan_sim'] = 'belum lengkap';
        }

        if ($validatedData['nomor_telepon'] !== null) {
            $validatedData['kelengkapan_nomor_telepon'] = 'lengkap';
        } else {
            $validatedData['kelengkapan_nomor_telepon'] = 'belum lengkap';
        }

        $sopir = Sopir::create($validatedData);
        $sopirID = Sopir::where('nik', $validatedData['nik'])->first();

        $laporan = Laporan::create([
            'penggunas_id' => auth()->user()->id,
            'relations_id' => $sopirID->id,
            'kategori_laporan' => 'sopir',
        ]);

        if ($sopir && $laporan) {
            return redirect(route('sopir'))->with('success', 'Berhasil Tambah Sopir!');
        } else {
            return redirect(route('sopir'))->with('failed', 'Gagal Tambah Sopir!');
        }
    }

    public function edit($id)
    {
        return view('sopir.edit', [
            'title' => 'Sopir',
            'sopir' => Sopir::where('id', $id)->first(),
        ]);
    }

    function update($id, Request $request)
    {
        $sopir = Sopir::where('id', $id)->first();
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'nik' => 'required|string',
            'nomor_telepon' => 'nullable|string',
            'nomor_ktp' => 'nullable|string',
            'nomor_sim' => 'nullable|string',
            'alamat' => 'required|string',
            'data_ktp' => 'required|string',
            'data_sim' => 'required|string',
            'data_nomor_telepon' => 'required|string',
            'status' => 'required|string',
        ]);

        if ($validatedData['data_ktp'] == '' || $validatedData['data_sim'] == '') {
            return redirect(route('sopir.edit', $id))->with('failed', 'Isi Form Input Kelengkapan KTP & SIM Terlebih Dahulu!');
        }

        if ($request->file('foto_ktp')) {
            $path = "assets/img/ktp-images/$sopir->foto_ktp";

            if (File::exists($path)) {
                File::delete($path);
            }

            $image = $request->file('foto_ktp');
            $imageName = date("Ymdhis") . "_" . $image->getClientOriginalName();
            $image->move(public_path('assets/img/ktp-images/'), $imageName);
            $validatedData['foto_ktp'] = $imageName;
        } else {
            $validatedData['foto_ktp'] = $sopir->foto_ktp;
        }

        if ($request->file('foto_sim')) {
            $path = "assets/img/sim-images/$sopir->foto_sim";

            if (File::exists($path)) {
                File::delete($path);
            }

            $image = $request->file('foto_sim');
            $imageName = date("Ymdhis") . "_" . $image->getClientOriginalName();
            $image->move(public_path('assets/img/sim-images/'), $imageName);
            $validatedData['foto_sim'] = $imageName;
        } else {
            $validatedData['foto_sim'] = $sopir->foto_sim;
        }

        if ($validatedData['foto_ktp'] !== null && $validatedData['nomor_ktp'] !== null) {
            $validatedData['kelengkapan_ktp'] = 'lengkap';
        } else {
            $validatedData['kelengkapan_ktp'] = 'belum lengkap';
        }

        if ($validatedData['foto_sim'] !== null && $validatedData['nomor_sim'] !== null) {
            $validatedData['kelengkapan_sim'] = 'lengkap';
        } else {
            $validatedData['kelengkapan_sim'] = 'belum lengkap';
        }

        if ($validatedData['nomor_telepon'] !== null) {
            $validatedData['kelengkapan_nomor_telepon'] = 'lengkap';
        } else {
            $validatedData['kelengkapan_nomor_telepon'] = 'belum lengkap';
        }

        $sopir = Sopir::where('id', $id)->first()->update($validatedData);

        if ($sopir) {
            return redirect(route('sopir'))->with('success', 'Berhasil Edit Sopir!');
        } else {
            return redirect(route('sopir'))->with('failed', 'Gagal Edit Sopir!');
        }
    }

    function delete($id)
    {
        $sopir = Sopir::where('id', $id)->first();

        $pathKTP = "assets/img/ktp-images/$sopir->foto_ktp";

        if (File::exists($pathKTP)) {
            File::delete($pathKTP);
        }

        $pathSIM = "assets/img/sim-images/$sopir->foto_sim";

        if (File::exists($pathSIM)) {
            File::delete($pathSIM);
        }

        $sopir = $sopir->delete();

        if ($sopir) {
            return redirect(route('sopir'))->with('success', 'Berhasil Hapus Sopir!');
        } else {
            return redirect(route('sopir'))->with('failed', 'Gagal Hapus Sopir!');
        }
    }
}
