<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Laporan;
use App\Models\Pajak;
use App\Models\Pelanggan;
use App\Models\PelepasanPemesanan;
use App\Models\Pemesanan;
use App\Models\PenambahanSewa;
use App\Models\Pengembalian;
use App\Models\Servis;
use App\Models\Sopir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class LaporanController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::whereNotIn('kategori_laporan', ['pelanggan', 'sopir', 'kendaraan'])->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        } elseif (auth()->user()->role == 'staff') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('penggunas_id', auth()->user()->id)->whereNotIn('kategori_laporan', ['pelanggan', 'sopir', 'kendaraan'])->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        }
    }

    // public function laporanPelanggan()
    // {
    //     if (auth()->user()->role == 'admin') {
    //         return view('laporan.index', [
    //             'title' => 'Laporan',
    //             'laporans' => Laporan::where('kategori_laporan', 'pelanggan')->orderBy('created_at', 'DESC')->paginate(6),
    //         ]);
    //     } elseif (auth()->user()->role == 'staff') {
    //         return view('laporan.index', [
    //             'title' => 'Laporan',
    //             'laporans' => Laporan::where('kategori_laporan', 'pelanggan')->where('penggunas_id', auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(6),
    //         ]);
    //     }
    // }

    // public function laporanSopir()
    // {
    //     if (auth()->user()->role == 'admin') {
    //         return view('laporan.index', [
    //             'title' => 'Laporan',
    //             'laporans' => Laporan::where('kategori_laporan', 'sopir')->orderBy('created_at', 'DESC')->paginate(6),
    //         ]);
    //     } elseif (auth()->user()->role == 'staff') {
    //         return view('laporan.index', [
    //             'title' => 'Laporan',
    //             'laporans' => Laporan::where('kategori_laporan', 'sopir')->where('penggunas_id', auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(6),
    //         ]);
    //     }
    // }

    // public function laporanKendaraan()
    // {
    //     if (auth()->user()->role == 'admin') {
    //         return view('laporan.index', [
    //             'title' => 'Laporan',
    //             'laporans' => Laporan::where('kategori_laporan', 'kendaraan')->orderBy('created_at', 'DESC')->paginate(6),
    //         ]);
    //     } elseif (auth()->user()->role == 'staff') {
    //         return view('laporan.index', [
    //             'title' => 'Laporan',
    //             'laporans' => Laporan::where('kategori_laporan', 'kendaraan')->where('penggunas_id', auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(6),
    //         ]);
    //     }
    // }

    public function laporanBooking()
    {
        if (auth()->user()->role == 'admin') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('kategori_laporan', 'booking')->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        } elseif (auth()->user()->role == 'staff') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('kategori_laporan', 'booking')->where('penggunas_id', auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        }
    }

    public function laporanPemesanan()
    {
        if (auth()->user()->role == 'admin') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('kategori_laporan', 'pemesanan')->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        } elseif (auth()->user()->role == 'staff') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('kategori_laporan', 'pemesanan')->where('penggunas_id', auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        }
    }

    public function laporanPengembalian()
    {
        if (auth()->user()->role == 'admin') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('kategori_laporan', 'pengembalian')->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        } elseif (auth()->user()->role == 'staff') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('kategori_laporan', 'pengembalian')->where('penggunas_id', auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        }
    }

    public function laporanPenambahan()
    {
        if (auth()->user()->role == 'admin') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('kategori_laporan', 'penambahan')->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        } elseif (auth()->user()->role == 'staff') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('kategori_laporan', 'penambahan')->where('penggunas_id', auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        }
    }

    public function laporanServis()
    {
        if (auth()->user()->role == 'admin') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('kategori_laporan', 'servis')->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        } elseif (auth()->user()->role == 'staff') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('kategori_laporan', 'servis')->where('penggunas_id', auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        }
    }

    public function laporanPajak()
    {
        if (auth()->user()->role == 'admin') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('kategori_laporan', 'pajak')->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        } elseif (auth()->user()->role == 'staff') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('kategori_laporan', 'pajak')->where('penggunas_id', auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        }
    }

    public function detailLaporan($id)
    {
        $laporan = Laporan::where('id', $id)->with('pengguna')->first();

        if ($laporan->kategori_laporan == 'pelanggan') {
            return view('nota.laporan-pelanggan', [
                'title' => 'Nota Pelanggan',
                'laporan' => $laporan,
                'pelanggan' => Pelanggan::where('id', $laporan->relations_id)->first(),
            ]);
        } elseif ($laporan->kategori_laporan == 'sopir') {
            return view('nota.laporan-sopir', [
                'title' => 'Nota Sopir',
                'laporan' => $laporan,
                'sopir' => Sopir::where('id', $laporan->relations_id)->first(),
            ]);
        } elseif ($laporan->kategori_laporan == 'kendaraan') {
            return view('nota.laporan-kendaraan', [
                'title' => 'Nota Kendaraan',
                'laporan' => $laporan,
                'kendaraan' => Kendaraan::where('id', $laporan->relations_id)->with('jenis_kendaraan', 'brand_kendaraan', 'seri_kendaraan', 'kilometer_kendaraan')->first(),
            ]);
        } elseif ($laporan->kategori_laporan == 'booking') {
            return view('nota.laporan-booking', [
                'title' => 'Nota Booking',
                'laporan' => $laporan,
                'booking' => Pemesanan::where('id', $laporan->relations_id)->with('kendaraan', 'pelanggan')->first(),
            ]);
        } elseif ($laporan->kategori_laporan == 'pemesanan') {
            return view('nota.laporan-pemesanan', [
                'title' => 'Nota Pemesanan',
                'laporan' => $laporan,
                'pemesanan' => PelepasanPemesanan::where('id', $laporan->relations_id)->with('kendaraan', 'pemesanan', 'pembayaran_pemesanan')->first(),
            ]);
        } elseif ($laporan->kategori_laporan == 'pengembalian') {
            return view('nota.laporan-pengembalian', [
                'title' => 'Nota Pengembalian',
                'laporan' => $laporan,
                'pengembalian' => Pengembalian::where('id', $laporan->relations_id)->with('pelepasan_pemesanan')->first(),
            ]);
        } elseif ($laporan->kategori_laporan == 'penambahan') {
            return view('nota.laporan-penambahan', [
                'title' => 'Nota Penambahan',
                'laporan' => $laporan,
                'penambahan' => PenambahanSewa::where('id', $laporan->relations_id)->with('pelepasan_pemesanan', 'kendaraan')->first(),
            ]);
        } elseif ($laporan->kategori_laporan == 'servis') {
            return view('nota.laporan-servis', [
                'title' => 'Nota Servis',
                'laporan' => $laporan,
                'servis' => Servis::where('id', $laporan->relations_id)->with('kendaraan')->first(),
            ]);
        } elseif ($laporan->kategori_laporan == 'pajak') {
            return view('nota.laporan-pajak', [
                'title' => 'Nota Pajak',
                'laporan' => $laporan,
                'pajak' => Pajak::where('id', $laporan->relations_id)->with('kendaraan')->first(),
            ]);
        }
    }

    public function updatePemesanan($id, Request $request)
    {
        if (is_null($request->foto_dokumen) && is_null($request->foto_kendaraan) && is_null($request->foto_pelanggan) && is_null($request->foto_nota) && is_null($request->foto_nota_ttd)) {
            return redirect(route('laporan.pemesanan.detail', $id))->with('failed', 'Silahkan input data dengan benar!');
        }

        $laporan = Laporan::where('id', $id)->first();
        $pelepasan = PelepasanPemesanan::where('id', $laporan->relations_id)->first();

        $validatedData = $request->validate([
            'foto_dokumen' => 'nullable|image',
            'foto_kendaraan' => 'nullable|image',
            'foto_pelanggan' => 'nullable|image',
            'foto_nota' => 'nullable|image',
            'foto_nota_ttd' => 'nullable|image',
        ]);

        if ($request->file('foto_dokumen')) {
            $path = "assets/img/pemesanan-dokumen-images/" . $pelepasan->foto_dokumen;

            if (File::exists($path)) {
                File::delete($path);
            }

            $image = $request->file('foto_dokumen');
            $imageName = date("Ymdhis") . "_" . $image->getClientOriginalName();
            $image->move(public_path('assets/img/pemesanan-dokumen-images/'), $imageName);
            $validatedData['foto_dokumen'] = $imageName;
        } else {
            if (is_null($pelepasan->foto_dokumen)) {
                $validatedData['foto_dokumen'] = null;
            } else {
                $validatedData['foto_dokumen'] = $pelepasan->foto_dokumen;
            }
        }

        if ($request->file('foto_kendaraan')) {
            $path = "assets/img/pemesanan-kendaraan-images/" . $pelepasan->foto_kendaraan;

            if (File::exists($path)) {
                File::delete($path);
            }

            $image = $request->file('foto_kendaraan');
            $imageName = date("Ymdhis") . "_" . $image->getClientOriginalName();
            $image->move(public_path('assets/img/pemesanan-kendaraan-images/'), $imageName);
            $validatedData['foto_kendaraan'] = $imageName;
        } else {
            if (is_null($pelepasan->foto_kendaraan)) {
                $validatedData['foto_kendaraan'] = null;
            } else {
                $validatedData['foto_kendaraan'] = $pelepasan->foto_kendaraan;
            }
        }

        if ($request->file('foto_pelanggan')) {
            $path = "assets/img/pemesanan-pelanggan-images/" . $pelepasan->foto_pelanggan;

            if (File::exists($path)) {
                File::delete($path);
            }

            $image = $request->file('foto_pelanggan');
            $imageName = date("Ymdhis") . "_" . $image->getClientOriginalName();
            $image->move(public_path('assets/img/pemesanan-pelanggan-images/'), $imageName);
            $validatedData['foto_pelanggan'] = $imageName;
        } else {
            if (is_null($pelepasan->foto_pelanggan)) {
                $validatedData['foto_pelanggan'] = null;
            } else {
                $validatedData['foto_pelanggan'] = $pelepasan->foto_pelanggan;
            }
        }

        if ($request->file('foto_nota')) {
            $path = "assets/img/nota-images/" . $pelepasan->foto_nota;

            if (File::exists($path)) {
                File::delete($path);
            }

            $image = $request->file('foto_nota');
            $imageName = date("Ymdhis") . "_" . $image->getClientOriginalName();
            $image->move(public_path('assets/img/nota-images/'), $imageName);
            $validatedData['foto_nota'] = $imageName;
        } else {
            if (is_null($pelepasan->foto_nota)) {
                $validatedData['foto_nota'] = null;
            } else {
                $validatedData['foto_nota'] = $pelepasan->foto_nota;
            }
        }

        if ($request->file('foto_nota_ttd')) {
            $path = "assets/img/nota-ttd-images/" . $pelepasan->foto_nota_ttd;

            if (File::exists($path)) {
                File::delete($path);
            }

            $image = $request->file('foto_nota_ttd');
            $imageName = date("Ymdhis") . "_" . $image->getClientOriginalName();
            $image->move(public_path('assets/img/nota-ttd-images/'), $imageName);
            $validatedData['foto_nota_ttd'] = $imageName;
        } else {
            if (is_null($pelepasan->foto_nota_ttd)) {
                $validatedData['foto_nota_ttd'] = null;
            } else {
                $validatedData['foto_nota_ttd'] = $pelepasan->foto_nota_ttd;
            }
        }

        $pelepasan = PelepasanPemesanan::where('id', $laporan->relations_id)->first()->update($validatedData);

        if ($pelepasan) {
            return redirect(route('laporan.pemesanan.detail', $id))->with('success', 'Berhasil Update Data Laporan Pemesanan!');
        } else {
            return redirect(route('laporan.pemesanan.detail', $id))->with('failed', 'Gagal Update Data Laporan Pemesanan!');
        }
    }

    public function generatePemesanan($id)
    {
        $laporan = Laporan::where('id', $id)->with('pengguna')->first();
        $pemesanan = PelepasanPemesanan::where('id', $laporan->relations_id)
            ->with('kendaraan', 'pemesanan', 'pembayaran_pemesanan')
            ->first();

        $data = [
            'title' => 'Nusa Kendala Sewa Kendaraan',
            'laporan' => $laporan,
            'pemesanan' => $pemesanan,
            'penambahan' => PenambahanSewa::where('pelepasan_pemesanans_id', $pemesanan->id)
                ->first(),
        ];

        $pdf = PDF::loadView('nota.generate-pemesanan', $data);

        return $pdf->download('laporan-pelepasan-kendaraan.pdf');
    }

    public function generatePengembalian($id)
    {
        $laporan = Laporan::where('id', $id)->with('pengguna')->first();
        $pemesanan = PelepasanPemesanan::where('id', $laporan->relations_id)
            ->with('kendaraan', 'pemesanan', 'pembayaran_pemesanan')
            ->first();
        $pengembalian = Pengembalian::where('id', $laporan->relations_id)
            ->with('pelepasan_pemesanan')
            ->first();
        $booking = Pemesanan::where('id', $laporan->relations_id)
            ->with('kendaraan', 'pelanggan')
            ->first();

        $data = [
            'title' => 'Nusa Kendala Sewa Kendaraan',
            'laporan' => $laporan,
            'pemesanan' => $pemesanan,
            'penambahan' => PenambahanSewa::where('pelepasan_pemesanans_id', $pemesanan->id)
                ->first(),
            'pengembalian' => $pengembalian,
            'booking' => $booking,
        ];

        $pdf = PDF::loadView('nota.generate-transaksi', $data);

        return $pdf->download('laporan-transaksi-pemesanan.pdf');
    }
}
