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
                <h5 class="subtitle">Laporan Data Sewa Kendaraan</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <div class="input-wrapper">
                            <p style="font-size: 0.875rem; opacity: 0.72;" class="mb-2">Foto Kendaraan</p>
                            <div class="wrapper d-flex gap-3 align-items-end">
                                <img src="{{ asset('assets/img/kendaraan-images/' . $penambahan->pelepasan_pemesanan->kendaraan->foto_kendaraan) }}"
                                    class="img-fluid tag-create-image" alt="Kendaraan Image" width="80">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="nomor_plat">Nomor Plat</label>
                                    <input type="text" id="nomor_plat" class="input" autocomplete="off" readonly
                                        value="{{ $penambahan->pelepasan_pemesanan->kendaraan->nomor_plat }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="tarifSewa">Tarif Sewa</label>
                                    <input type="text" id="tarifSewa" class="input" autocomplete="off" readonly
                                        value="{{ $penambahan->pelepasan_pemesanan->kendaraan->tarif_sewa_hari }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="jumlah_hari">Jumlah Hari</label>
                                    <input type="number" id="jumlah_hari" class="input"
                                        value="{{ $penambahan->jumlah_hari }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="total_biaya">Total Biaya</label>
                                    <input type="number" id="total_biaya" class="input"
                                        value="{{ $penambahan->total_biaya }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="penggunas_id">Pengguna Menambahkan</label>
                                    <input type="text" id="penggunas_id" class="input" autocomplete="off" readonly
                                        value="{{ $laporan->pengguna->nama_lengkap }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="tanggal_dibuat">Tanggal & Jam Dibuat</label>
                                    <input type="text" id="tanggal_dibuat" class="input" autocomplete="off" readonly
                                        value="{{ $laporan->created_at }}">
                                </div>
                            </div>
                            <div class="col-12 row-button">
                                <div class="input-wrapper">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" id="keterangan" class="input"
                                        value="{{ $penambahan->keterangan }}" readonly>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="button-wrapper d-flex">
                                    <a href="{{ route('laporan.penambahan') }}" class="button-reverse">Kembali ke
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
