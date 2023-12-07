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
                <h5 class="subtitle">Laporan Data Pelanggan</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form d-inline-block w-100">
                    <div class="row">
                        <div class="col-md-6 col-lg-4 col-xl-3 mb-5">
                            <div class="input-wrapper">
                                <p style="font-size: 0.875rem; opacity: 0.72;" class="mb-2">Foto KTP</p>
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ $pelanggan->foto_ktp ? asset('assets/img/ktp-images/' . $pelanggan->foto_ktp) : asset('assets/img/default/image-notfound.svg') }}"
                                        class="img-fluid tag-create-ktp" alt="KTP Image" width="80">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-3 mb-5">
                            <div class="input-wrapper">
                                <p style="font-size: 0.875rem; opacity: 0.72;" class="mb-2">Foto KK</p>
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ $pelanggan->foto_kk ? asset('assets/img/kk-images/' . $pelanggan->foto_kk) : asset('assets/img/default/image-notfound.svg') }}"
                                        class="img-fluid tag-create-kk" alt="KK Image" width="80">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="nama">Nama</label>
                                    <input type="text" id="nama" class="input" autocomplete="off" readonly
                                        value="{{ $pelanggan->nama }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="nik">NIK</label>
                                    <input type="text" id="nik" class="input" autocomplete="off" readonly
                                        value="{{ $pelanggan->nik }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="nomor_telepon">Nomor Telepon</label>
                                    <input type="text" id="nomor_telepon" class="input" autocomplete="off" readonly
                                        value="{{ $pelanggan->nomor_telepon }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="nomor_ktp">Nomor KTP</label>
                                    <input type="text" id="nomor_ktp" class="input" autocomplete="off" readonly
                                        value="{{ $pelanggan->nomor_ktp }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="nomor_kk">Nomor KK</label>
                                    <input type="text" id="nomor_kk" class="input" autocomplete="off" readonly
                                        value="{{ $pelanggan->nomor_kk }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" id="alamat" class="input" autocomplete="off" readonly
                                        value="{{ $pelanggan->alamat }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="data_ktp">Data KTP</label>
                                    <input type="text" id="data_ktp" class="input" autocomplete="off" readonly
                                        value="{{ $pelanggan->data_ktp }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="data_kk">Data KK</label>
                                    <input type="text" id="data_kk" class="input" autocomplete="off" readonly
                                        value="{{ $pelanggan->data_kk }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="data_nomor_telepon">Data Nomor Telepon</label>
                                    <input type="text" id="data_nomor_telepon" class="input" autocomplete="off"
                                        readonly value="{{ $pelanggan->data_nomor_telepon }}">
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
                                    <a href="{{ route('laporan.pelanggan') }}" class="button-reverse">Kembali ke
                                        Halaman</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
