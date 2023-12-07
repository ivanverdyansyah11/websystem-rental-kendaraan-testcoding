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
                <h5 class="subtitle">Tambah Sopir</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form d-inline-block w-100" method="POST" action="{{ route('sopir.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ asset('assets/img/default/image-notfound.svg') }}"
                                        class="img-fluid tag-create-ktp" alt="KTP Image" width="80">
                                    <div class="wrapper-image w-100">
                                        <input type="file" accept=".png,.jpg,.jpeg" id="image"
                                            class="input-create-ktp" name="foto_ktp" style="opacity: 0;">
                                        <button type="button" class="button-reverse button-create-ktp">Pilih Foto
                                            KTP</button>
                                    </div>
                                </div>
                                @error('foto_ktp')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ asset('assets/img/default/image-notfound.svg') }}"
                                        class="img-fluid tag-create-sim" alt="SIM Image" width="80">
                                    <div class="wrapper-image w-100">
                                        <input type="file" accept=".png,.jpg,.jpeg" id="image"
                                            class="input-create-sim" name="foto_sim" style="opacity: 0;">
                                        <button type="button" class="button-reverse button-create-sim">Pilih Foto
                                            SIM</button>
                                    </div>
                                </div>
                                @error('foto_sim')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="input-group">
                                    <p>Nama Pengguna</p>
                                    <input type="text" id="nama" autocomplete="off" value="{{ old('nama') }}" name="nama" placeholder="Masukkan nama pengguna">
                                    @error('nama')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group">
                                    <p>NIK</p>
                                    <input type="text" id="nik" autocomplete="off" value="{{ old('nik') }}" name="nik" placeholder="Masukkan nik">
                                    @error('nik')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group">
                                    <p>Nomor Telepon</p>
                                    <input type="text" id="nomor_telepon" autocomplete="off" value="{{ old('nomor_telepon') }}" name="nomor_telepon" placeholder="Masukkan nomor telepon">
                                    @error('nomor_telepon')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group">
                                    <p>Nomor KTP</p>
                                    <input type="text" id="nomor_ktp" autocomplete="off" value="{{ old('nomor_ktp') }}" name="nomor_ktp" placeholder="Masukkan nomor ktp">
                                    @error('nomor_ktp')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group">
                                    <p>Nomor SIM</p>
                                    <input type="text" id="nomor_sim" autocomplete="off" value="{{ old('nomor_sim') }}" name="nomor_sim" placeholder="Masukkan nomor sim">
                                    @error('nomor_sim')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group">
                                    <p>Alamat</p>
                                    <input type="text" id="alamat" autocomplete="off" value="{{ old('alamat') }}" name="alamat" placeholder="Masukkan alamat">
                                    @error('alamat')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group">
                                    <p for="data_ktp">Data KTP</p>
                                    <select name="data_ktp" class="input" required id="data_ktp">
                                        <option value="">Pilih kelengkapan ktp</option>
                                        <option value="benar" {{ old('data_ktp') == 'benar' ? 'selected' : '' }}>Sudah
                                            Benar</option>
                                        <option value="salah" {{ old('data_ktp') == 'salah' ? 'selected' : '' }}>Belum
                                            Benar</option>
                                    </select>
                                    @error('data_ktp')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group">
                                    <p for="data_sim">Data SIM</p>
                                    <select name="data_sim" class="input" required id="data_sim">
                                        <option value="">Pilih kelengkapan sim</option>
                                        <option value="benar" {{ old('data_sim') == 'benar' ? 'selected' : '' }}>Sudah
                                            Benar</option>
                                        <option value="salah" {{ old('data_sim') == 'salah' ? 'selected' : '' }}>Belum
                                            Benar</option>
                                    </select>
                                    @error('data_sim')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-group">
                                    <p for="data_nomor_telepon">Data Nomor Telepon</p>
                                    <select name="data_nomor_telepon" class="input" id="data_nomor_telepon" required>
                                        <option value="">Pilih kelengkapan nomor telepon</option>
                                        <option value="benar"
                                            {{ old('data_nomor_telepon') == 'benar' ? 'selected' : '' }}>Sudah
                                            Benar</option>
                                        <option value="salah"
                                            {{ old('data_nomor_telepon') == 'salah' ? 'selected' : '' }}>Belum
                                            Benar</option>
                                    </select>
                                    @error('data_nomor_telepon')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="button-wrapper d-flex">
                                    <button type="submit" class="button-primary">Tambah Sopir</button>
                                    <a href="{{ route('sopir') }}" class="button-reverse">Batal
                                        Tambah</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $("#data_ktp").select2({
            theme: "bootstrap-5",
        });

        $("#data_sim").select2({
            theme: "bootstrap-5",
        });

        $("#data_nomor_telepon").select2({
            theme: "bootstrap-5",
        });

        const tagCreateKTP = document.querySelector('.tag-create-ktp');
        const inputCreateKTP = document.querySelector('.input-create-ktp');
        const buttonCreateKTP = document.querySelector('.button-create-ktp');

        const tagCreateSIM = document.querySelector('.tag-create-sim');
        const inputCreateSIM = document.querySelector('.input-create-sim');
        const buttonCreateSIM = document.querySelector('.button-create-sim');

        buttonCreateKTP.addEventListener('click', function() {
            inputCreateKTP.click();
        });

        inputCreateKTP.addEventListener('change', function() {
            tagCreateKTP.src = URL.createObjectURL(inputCreateKTP.files[0]);
        });

        buttonCreateSIM.addEventListener('click', function() {
            inputCreateSIM.click();
        });

        inputCreateSIM.addEventListener('change', function() {
            tagCreateSIM.src = URL.createObjectURL(inputCreateSIM.files[0]);
        });
    </script>
@endsection
