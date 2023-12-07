<?php

namespace App\Http\Controllers;

use App\Models\KelengkapanPelanggan;
use App\Models\Laporan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PelangganController extends Controller
{
    public function index()
    {
        return view('pelanggan.index', [
            'title' => 'Pelanggan',
            'pelanggans' => Pelanggan::paginate(6),
        ]);
    }

    public function search(Request $request)
    {
        $pelanggans = Pelanggan::where('nama', 'like', '%' . $request->search . '%')
            ->orWhere('nik', 'like', '%' . $request->search . '%')
            ->orWhere('nomor_telepon', 'like', '%' . $request->search . '%')
            ->orWhere('nomor_ktp', 'like', '%' . $request->search . '%')
            ->orWhere('nomor_kk', 'like', '%' . $request->search . '%')
            ->orWhere('alamat', 'like', '%' . $request->search . '%')
            ->paginate(6);

        return view('pelanggan.index', [
            'title' => 'Pelanggan',
            'pelanggans' => $pelanggans,
        ]);
    }

    public function detail($id)
    {
        return view('pelanggan.detail', [
            'title' => 'Pelanggan',
            'pelanggan' => Pelanggan::where('id', $id)->first(),
        ]);
    }

    public function create()
    {
        return view('pelanggan.create', [
            'title' => 'Pelanggan',
        ]);
    }

    function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'nik' => 'required|string',
            'nomor_telepon' => 'nullable|string',
            'nomor_ktp' => 'nullable|string',
            'nomor_kk' => 'nullable|string',
            'foto_ktp' => 'nullable|image|max:2048',
            'foto_kk' => 'nullable|image|max:2048',
            'alamat' => 'required|string',
            'data_ktp' => 'required|string',
            'data_kk' => 'required|string',
            'data_nomor_telepon' => 'required|string',
        ]);

        if ($validatedData['data_ktp'] == '' || $validatedData['data_kk'] == '') {
            return redirect(route('pelanggan.create'))->with('failed', 'Isi Form Input Kelengkapan KTP & KK Terlebih Dahulu!');
        }

        if (!empty($validatedData['foto_ktp'])) {
            $image = $request->file('foto_ktp');
            $imageName = date("Ymdhis") . "_" . $image->getClientOriginalName();
            $image->move(public_path('assets/img/ktp-images/'), $imageName);
            $validatedData['foto_ktp'] = $imageName;
        }

        if (!empty($validatedData['foto_kk'])) {
            $image = $request->file('foto_kk');
            $imageName = date("Ymdhis") . "_" . $image->getClientOriginalName();
            $image->move(public_path('assets/img/kk-images/'), $imageName);
            $validatedData['foto_kk'] = $imageName;
        }

        if ($request->foto_ktp && $validatedData['nomor_ktp'] !== null) {
            $validatedData['kelengkapan_ktp'] = 'lengkap';
        } else {
            $validatedData['kelengkapan_ktp'] = 'belum lengkap';
        }

        if ($request->foto_kk && $validatedData['nomor_kk'] !== null) {
            $validatedData['kelengkapan_kk'] = 'lengkap';
        } else {
            $validatedData['kelengkapan_kk'] = 'belum lengkap';
        }

        if ($validatedData['nomor_telepon'] !== null) {
            $validatedData['kelengkapan_nomor_telepon'] = 'lengkap';
        } else {
            $validatedData['kelengkapan_nomor_telepon'] = 'belum lengkap';
        }

        $pelanggan = Pelanggan::create($validatedData);
        $pelangganID = Pelanggan::where('nik', $validatedData['nik'])->first();

        $laporan = Laporan::create([
            'penggunas_id' => auth()->user()->id,
            'relations_id' => $pelangganID->id,
            'kategori_laporan' => 'pelanggan',
        ]);

        if ($pelanggan && $laporan) {
            return redirect(route('pelanggan'))->with('success', 'Berhasil Tambah Pelanggan!');
        } else {
            return redirect(route('pelanggan'))->with('failed', 'Gagal Tambah Pelanggan!');
        }
    }

    public function edit($id)
    {
        return view('pelanggan.edit', [
            'title' => 'Pelanggan',
            'pelanggan' => Pelanggan::where('id', $id)->first(),
        ]);
    }

    function update($id, Request $request)
    {
        $pelanggan = Pelanggan::where('id', $id)->first();
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'nik' => 'required|string',
            'nomor_telepon' => 'nullable|string',
            'nomor_ktp' => 'nullable|string',
            'nomor_kk' => 'nullable|string',
            'alamat' => 'required|string',
            'data_ktp' => 'required|string',
            'data_kk' => 'required|string',
            'data_nomor_telepon' => 'required|string',
        ]);

        if ($validatedData['data_ktp'] == '' || $validatedData['data_kk'] == '') {
            return redirect(route('pelanggan.edit', $id))->with('failed', 'Isi Form Input Kelengkapan KTP & KK Terlebih Dahulu!');
        }

        if ($request->file('foto_ktp')) {
            $path = "assets/img/ktp-images/$pelanggan->foto_ktp";

            if (File::exists($path)) {
                File::delete($path);
            }

            $image = $request->file('foto_ktp');
            $imageName = $imageName = date("Ymdhis") . "_" . $image->getClientOriginalName();;
            $image->move(public_path('assets/img/ktp-images/'), $imageName);
            $validatedData['foto_ktp'] = $imageName;
        } else {
            $validatedData['foto_ktp'] = $pelanggan->foto_ktp;
        }

        if ($request->file('foto_kk')) {
            $path = "assets/img/kk-images/$pelanggan->foto_kk";

            if (File::exists($path)) {
                File::delete($path);
            }

            $image = $request->file('foto_kk');
            $imageName = $imageName = date("Ymdhis") . "_" . $image->getClientOriginalName();;
            $image->move(public_path('assets/img/kk-images/'), $imageName);
            $validatedData['foto_kk'] = $imageName;
        } else {
            $validatedData['foto_kk'] = $pelanggan->foto_kk;
        }

        if ($validatedData['foto_ktp'] !== null && $validatedData['nomor_ktp'] !== null) {
            $validatedData['kelengkapan_ktp'] = 'lengkap';
        } else {
            $validatedData['kelengkapan_ktp'] = 'belum lengkap';
        }

        if ($validatedData['foto_kk'] !== null && $validatedData['nomor_kk'] !== null) {
            $validatedData['kelengkapan_kk'] = 'lengkap';
        } else {
            $validatedData['kelengkapan_kk'] = 'belum lengkap';
        }

        if ($validatedData['nomor_telepon'] !== null) {
            $validatedData['kelengkapan_nomor_telepon'] = 'lengkap';
        } else {
            $validatedData['kelengkapan_nomor_telepon'] = 'belum lengkap';
        }

        $pelanggan = Pelanggan::where('id', $id)->first()->update($validatedData);

        if ($pelanggan) {
            return redirect(route('pelanggan'))->with('success', 'Berhasil Edit Pelanggan!');
        } else {
            return redirect(route('pelanggan'))->with('failed', 'Gagal Edit Pelanggan!');
        }
    }

    function delete($id)
    {
        $pelanggan = Pelanggan::where('id', $id)->first();

        $pathKTP = "assets/img/ktp-images/$pelanggan->foto_ktp";

        if (File::exists($pathKTP)) {
            File::delete($pathKTP);
        }

        $pathKK = "assets/img/kk-images/$pelanggan->foto_kk";

        if (File::exists($pathKK)) {
            File::delete($pathKK);
        }

        $pelanggan = $pelanggan->delete();

        if ($pelanggan) {
            return redirect(route('pelanggan'))->with('success', 'Berhasil Hapus Pelanggan!');
        } else {
            return redirect(route('pelanggan'))->with('failed', 'Gagal Hapus Pelanggan!');
        }
    }
}
