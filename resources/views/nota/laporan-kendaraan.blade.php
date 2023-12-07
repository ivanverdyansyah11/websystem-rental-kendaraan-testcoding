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
                <h5 class="subtitle">Laporan Data Kendaraan</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form d-inline-block w-100">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <p style="font-size: 0.875rem; opacity: 0.72;" class="mb-2">Foto Kendaraan</p>
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ asset('assets/img/kendaraan-images/' . $kendaraan->foto_kendaraan) }}"
                                        class="img-fluid tag-create-image" alt="Kendaraan Image" width="80">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <p for="stnk_nama">STNK Atas Nama</p>
                                        <input type="text" id="stnk_nama" class="input" autocomplete="off" readonly
                                            value="{{ $kendaraan->stnk_nama }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <p for="nomor_plat">Nomor Plat</p>
                                        <input type="text" id="nomor_plat" class="input" autocomplete="off" readonly
                                            value="{{ $kendaraan->nomor_plat }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <p for="jenis">Jenis Kendaraan</p>
                                        <input type="text" id="jenis" class="input" autocomplete="off"
                                            value="{{ $kendaraan->jenis_kendaraan->nama }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <p for="brand">Brand Kendaraan</p>
                                        <input type="text" id="brand" class="input" autocomplete="off"
                                            value="{{ $kendaraan->brand_kendaraan->nama }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <p for="seri">Nomor Seri</p>
                                        <input type="text" id="seri" class="input" autocomplete="off"
                                            value="{{ $kendaraan->seri_kendaraan->nomor_seri }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <p for="kilometer">Kategori Kilometer</p>
                                        <input type="text" id="kilometer" class="input" autocomplete="off"
                                            value="{{ $kendaraan->kilometer_kendaraan->jumlah }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <p for="kilometer">Kilometer</p>
                                        <input type="text" id="kilometer" class="input" autocomplete="off" readonly
                                            value="{{ $kendaraan->kilometer_saat_ini }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <p for="tarif_sewa_hari">Tarif Sewa Harian</p>
                                        <input type="text" id="tarif_sewa_hari" class="input" autocomplete="off"
                                            readonly value="{{ $kendaraan->tarif_sewa_hari }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <p for="tarif_sewa_minggu">Tarif Sewa Mingguan</p>
                                        <input type="text" id="tarif_sewa_minggu" class="input" autocomplete="off"
                                            readonly value="{{ $kendaraan->tarif_sewa_minggu }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <p for="tarif_sewa_bulan">Tarif Sewa Bulanan</p>
                                        <input type="text" id="tarif_sewa_bulan" class="input" autocomplete="off"
                                            readonly value="{{ $kendaraan->tarif_sewa_bulan }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <p for="tahun_pembuatan">Tahun Pembuatan</p>
                                        <input type="text" id="tahun_pembuatan" class="input" autocomplete="off"
                                            readonly value="{{ $kendaraan->tahun_pembuatan }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <p for="tanggal_pembelian">Tanggal Pembelian</p>
                                        <input type="text" id="tanggal_pembelian" class="input" autocomplete="off"
                                            readonly value="{{ $kendaraan->tanggal_pembelian }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <p for="warna">Warna</p>
                                        <input type="text" id="warna" class="input" autocomplete="off" readonly
                                            value="{{ $kendaraan->warna }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <p for="nomor_rangka">Nomor Rangka</p>
                                        <input type="text" id="nomor_rangka" class="input" autocomplete="off"
                                            readonly value="{{ $kendaraan->nomor_rangka }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <p for="nomor_mesin">Nomor Mesin</p>
                                        <input type="text" id="nomor_mesin" class="input" autocomplete="off"
                                            readonly value="{{ $kendaraan->nomor_mesin }}">
                                    </div>
                                </div>
                                {{-- <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <p for="penggunas_id">Pengguna Menambahkan</p>
                                        <input type="text" id="penggunas_id" class="input" autocomplete="off"
                                            readonly value="{{ $laporan->pengguna->nama_lengkap }}">
                                    </div>
                                </div> --}}
                                <div class="col-md-6 mb-4">
                                    <div class="input-group">
                                        <p for="tanggal_dibuat">Tanggal & Jam Dibuat</p>
                                        <input type="text" id="tanggal_dibuat" class="input" autocomplete="off"
                                            readonly value="{{ $laporan->created_at }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="button-wrapper d-flex">
                                        <a href="{{ route('laporan') }}" class="button-reverse">Kembali ke
                                            Halaman</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
