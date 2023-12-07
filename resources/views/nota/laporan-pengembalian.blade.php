{{-- @extends('template.main')

@section('content')
    <div class="report-nota row justify-content-center my-5">
        <div class="col-md-9 col-lg-7 col-xl-6">
            <div class="nota-paper mx-3 mx-md-0">
                <div class="wrapper d-flex justify-content-between align-items-end">
                    <img src="{{ asset('assets/img/brand/brand-text.svg') }}" alt="Brand Nusa Kendala Logo Teks"
                        class="img-fluid login-brand d-none d-md-inline-block" draggable="false" width="240">
                    <p class="paragraph">Petugas: {{ $laporan->pengguna->nama_lengkap }}</p>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h5 class="title">Data Pengembalian Kendaraan</h5>
                        <table class="table table-bordered">
                            <tr>
                                <td scope="col">Nama Pelanggan</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">
                                    {{ $pengembalian->pelepasan_pemesanan->pemesanan->pelanggan->nama }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Nomor Telepon</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">
                                    {{ $pengembalian->pelepasan_pemesanan->pemesanan->pelanggan->nomor_telepon }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="col">Nomor Plat</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">
                                    {{ $pengembalian->pelepasan_pemesanan->kendaraan->nomor_plat }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Jenis Pembayaran</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">
                                    {{ $pengembalian->jenis_pembayaran }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Total Bayar</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">
                                    Rp. {{ $pengembalian->total_bayar }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Metode Bayar</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">
                                    {{ $pengembalian->metode_bayar }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Tanggal Kembali</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">
                                    {{ $pengembalian->tanggal_kembali }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Kilometer Kembali</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">
                                    {{ $pengembalian->kilometer_kembali }} km</td>
                            </tr>
                            <tr>
                                <td scope="col">Bensin Kembali</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">
                                    {{ $pengembalian->bensin_kembali }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Ketepatan Waktu</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">
                                    {{ $pengembalian->ketepatan_waktu }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Terlambat</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">
                                    {{ $pengembalian->terlambat ?: '-' }} hari</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-12">
                        <h5 class="title">Data Kelengkapan Pengembalian Kendaraan</h5>
                        <table class="table table-bordered">
                            <tr>
                                <td scope="col">Sarung Jok</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">{{ $pengembalian->sarung_jok }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Karpet</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">{{ $pengembalian->karpet }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Kondisi Kendaraan</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">{{ $pengembalian->kondisi_kendaraan }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Ban Serep</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">{{ $pengembalian->ban_serep }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-12">
                        <h5 class="title">Data Kelengkapan Pelepasan Kendaraan</h5>
                        <table class="table table-bordered">
                            <tr>
                                <td scope="col">Sarung Jok</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">{{ $pengembalian->pelepasan_pemesanan->sarung_jok }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="col">Karpet</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">{{ $pengembalian->pelepasan_pemesanan->karpet }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Kondisi Kendaraan</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">
                                    {{ $pengembalian->pelepasan_pemesanan->kondisi_kendaraan }}</td>
                            </tr>
                            @if ($pengembalian->pelepasan_pemesanan->ban_serep)
                                <tr>
                                    <td scope="col">Ban Serep</td>
                                    <td scope="col-1">:</td>
                                    <td scope="col" class="text-end">{{ $pengembalian->pelepasan_pemesanan->ban_serep }}
                                    </td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
                <p class="copyright">Diproduksi oleh Nusa Kendala Rental Kendaraan</p>
            </div>
        </div>
    </div>
@endsection --}}


@extends('template.main')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                @if (session()->has('success'))
                    <div class="alert alert-success mb-4" role="alert">
                        {{ session('success') }}
                    </div>
                @elseif(session()->has('failed'))
                    <div class="alert alert-danger mb-4" role="alert">
                        {{ session('failed') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row" style="margin-bottom: 32px">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h5 class="subtitle">Laporan Data Pengembalian Kendaraan</h5>
                <a href="{{ route('laporan.pengembalian.print', $laporan->id) }}"
                    class="button-primary d-flex gap-2 align-items-center">
                    <div class="export-icon"></div>
                    Print Pemesanan
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-5">
                        <div class="input-wrapper">
                            <p style="font-size: 0.875rem; opacity: 0.72;" class="mb-2">Foto Pembayaran</p>
                            <div class="wrapper d-flex gap-3 align-items-end">
                                <img src="{{ asset('assets/img/pengembalian-pemesanan-images/' . $pengembalian->foto_pembayaran) }}"
                                    class="img-fluid tag-create-transaction" alt="Pembayaran Image" width="80">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="jenis_pembayaran_sebelumnya">Jenis Pembayaran Sebelumnya</label>
                                    <input type="text" id="jenis_pembayaran_sebelumnya" class="input" autocomplete="off"
                                        value="{{ $pengembalian->pelepasan_pemesanan->pembayaran_pemesanan->jenis_pembayaran }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="total_bayar">Total Bayar Sebelumnya</label>
                                    <input type="text" id="total_bayar" class="input" autocomplete="off"
                                        value="{{ $pengembalian->pelepasan_pemesanan->pembayaran_pemesanan->total_bayar ?: '0' }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label>Tanggal Kembali</label>
                                    <input type="date" class="input"
                                        value="{{ $pengembalian->pelepasan_pemesanan->pemesanan->tanggal_akhir_awal ? $pengembalian->pelepasan_pemesanan->pemesanan->tanggal_akhir_awal : $pengembalian->pelepasan_pemesanan->pemesanan->tanggal_akhir }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="total_tarif_sewa">Total Tarif Sewa</label>
                                    <input type="text" id="total_tarif_sewa" class="input"
                                        value="{{ $pengembalian->pelepasan_pemesanan->pembayaran_pemesanan->total_tarif_sewa }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="jenis_pembayaran">Jenis Pembayaran</label>
                                    <input type="text" id="jenis_pembayaran" class="input"
                                        value="{{ $pengembalian->jenis_pembayaran }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="metode_bayar">Metode Pembayaran</label>
                                    <input type="text" id="metode_bayar" class="input"
                                        value="{{ $pengembalian->metode_bayar }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="tanggal_kembali">Pengembalian Tanggal</label>
                                    <input type="date" id="tanggal_kembali" class="input"
                                        value="{{ $pengembalian->tanggal_kembali }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="total_bayar">Total Bayar</label>
                                    <input type="number" id="total_bayar" class="input"
                                        value="{{ $pengembalian->total_bayar }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="kilometer_kembali">Kilometer Kembali (Km)</label>
                                    <input type="number" id="kilometer_kembali" class="input"
                                        value="{{ $pengembalian->kilometer_kembali }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="bensin_kembali">Bensin Kembali (Liter)</label>
                                    <input type="number" id="bensin_kembali" class="input"
                                        value="{{ $pengembalian->bensin_kembali }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="ketepatan_waktu">Ketepatan Waktu</label>
                                    <input type="text" id="ketepatan_waktu" class="input"
                                        value="{{ $pengembalian->ketepatan_waktu }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="terlambat">Terlambat (Max 3 Jam)</label>
                                    <input type="number" id="terlambat" class="input"
                                        value="{{ $pengembalian->terlambat ? $pengembalian->terlambat : '-' }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="sarung_jok">Sarung Jok</label>
                                    <input type="text" id="sarung_jok" class="input"
                                        value="{{ $pengembalian->sarung_jok }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="karpet">Karpet</label>
                                    <input type="text" id="karpet" class="input"
                                        value="{{ $pengembalian->karpet }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="kondisi_kendaraan">Kondisi Kendaraan</label>
                                    <input type="text" id="kondisi_kendaraan" class="input"
                                        value="{{ $pengembalian->kondisi_kendaraan }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-wrapper">
                                    <label for="ban_serep">Ban Serep</label>
                                    <input type="text" id="ban_serep" class="input"
                                        value="{{ $pengembalian->ban_serep }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="biaya_tambahan">Biaya Tambahan</label>
                                    <input type="number" id="biaya_tambahan" class="input"
                                        value="{{ $pengembalian->biaya_tambahan ? $pengembalian->biaya_tambahan : '-' }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" id="keterangan" class="input"
                                        value="{{ $pengembalian->keterangan ? $pengembalian->keterangan : '-' }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="penggunas_id">Pengguna Menambahkan</label>
                                    <input type="text" id="penggunas_id" class="input" autocomplete="off" readonly
                                        value="{{ $laporan->pengguna->nama_lengkap }}">
                                </div>
                            </div>
                            <div class="col-md-6 row-button">
                                <div class="input-wrapper">
                                    <label for="tanggal_dibuat">Tanggal & Jam Dibuat</label>
                                    <input type="text" id="tanggal_dibuat" class="input" autocomplete="off" readonly
                                        value="{{ $laporan->created_at }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="button-wrapper d-flex">
                                    <a href="{{ route('laporan.pengembalian') }}" class="button-reverse">Kembali ke
                                        Halaman</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
