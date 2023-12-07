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
                <h5 class="subtitle">Detail Sopir</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form d-inline-block w-100">
                    <div class="row">
                        <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ $sopir->foto_ktp ? asset('assets/img/ktp-images/' . $sopir->foto_ktp) : asset('assets/img/default/image-notfound.svg') }}"
                                        class="img-fluid tag-create-ktp" alt="KTP Image" width="80">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ $sopir->foto_sim ? asset('assets/img/sim-images/' . $sopir->foto_sim) : asset('assets/img/default/image-notfound.svg') }}"
                                        class="img-fluid tag-create-sim" alt="SIM Image" width="80">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="input-group">
                                    <p>Nama Pengguna</p>
                                    <input type="text" id="nama" autocomplete="off" disabled value="{{ $sopir->nama }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group">
                                    <p>NIK</p>
                                    <input type="text" id="nik" autocomplete="off" disabled value="{{ $sopir->nik }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group">
                                    <p>Nomor Telepon</p>
                                    <input type="text" id="nomor_telepon" autocomplete="off" disabled value="{{ $sopir->nomor_telepon ? $sopir->nomor_telepon : '-' }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group">
                                    <p>Nomor KTP</p>
                                    <input type="text" id="nomor_ktp" autocomplete="off" disabled value="{{ $sopir->nomor_ktp ? $sopir->nomor_ktp : '-' }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group">
                                    <p>Nomor SIM</p>
                                    <input type="text" id="nomor_sim" autocomplete="off" disabled value="{{ $sopir->nomor_sim ? $sopir->nomor_sim : '-' }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group">
                                    <p>Alamat</p>
                                    <input type="text" id="alamat" autocomplete="off" disabled value="{{ $sopir->alamat }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group">
                                    <p>Data KTP</p>
                                    <input type="text" id="data_ktp" autocomplete="off" disabled value="{{ $sopir->data_ktp }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group">
                                    <p>Data SIM</p>
                                    <input type="text" id="data_sim" autocomplete="off" disabled value="{{ $sopir->data_sim }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group">
                                    <p>Data Nomor Telepon</p>
                                    <input type="text" id="data_nomor_telepon" autocomplete="off" disabled value="{{ $sopir->data_nomor_telepon }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-group">
                                    <p>Status</p>
                                    <input type="text" id="status" autocomplete="off" disabled value="{{ $sopir->status }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="button-wrapper d-flex">
                                    <a href="{{ route('sopir') }}" class="button-reverse">Kembali ke Halaman</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
