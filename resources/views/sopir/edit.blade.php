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
                <h5 class="subtitle">Edit Sopir</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form d-inline-block w-100" enctype="multipart/form-data" method="POST"
                    action="{{ route('sopir.update', $sopir->id) }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ $sopir->foto_ktp ? asset('assets/img/ktp-images/' . $sopir->foto_ktp) : asset('assets/img/default/image-notfound.svg') }}"
                                        class="img-fluid tag-edit-ktp" alt="KTP Image" width="80">
                                    <div class="wrapper-image w-100">
                                        <input type="file" accept=".png,.jpg,.jpeg" id="image" class="input-edit-ktp"
                                            name="foto_ktp" style="opacity: 0;">
                                        <button type="button" class="button-reverse button-edit-ktp">Pilih Foto
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
                                    <img src="{{ $sopir->foto_sim ? asset('assets/img/sim-images/' . $sopir->foto_sim) : asset('assets/img/default/image-notfound.svg') }}"
                                        class="img-fluid tag-edit-sim" alt="SIM Image" width="80">
                                    <div class="wrapper-image w-100">
                                        <input type="file" accept=".png,.jpg,.jpeg" id="image" class="input-edit-sim"
                                            name="foto_sim" style="opacity: 0;">
                                        <button type="button" class="button-reverse button-edit-sim">Pilih Foto
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
                                    <input type="text" id="nama" autocomplete="off" value="{{ $sopir->nama }}" name="nama">
                                    <label for="nama" class="d-flex align-items-center">
                                        <span>Masukkan nama pengguna</span>
                                    </label>
                                    @error('nama')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group">
                                    <p>NIK</p>
                                    <input type="text" id="nik" autocomplete="off" value="{{ $sopir->nik }}" name="nik">
                                    <label for="nik" class="d-flex align-items-center">
                                        <span>Masukkan nik</span>
                                    </label>
                                    @error('nik')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group">
                                    <p>Nomor Telepon</p>
                                    <input type="text" id="nomor_telepon" autocomplete="off" value="{{ $sopir->nomor_telepon }}" name="nomor_telepon">
                                    <label for="nomor_telepon" class="d-flex align-items-center">
                                        <span>Masukkan nomor telepon</span>
                                    </label>
                                    @error('nomor_telepon')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group">
                                    <p>Nomor KTP</p>
                                    <input type="text" id="nomor_ktp" autocomplete="off" value="{{ $sopir->nomor_ktp }}" name="nomor_ktp">
                                    <label for="nomor_ktp" class="d-flex align-items-center">
                                        <span>Masukkan nomor ktp</span>
                                    </label>
                                    @error('nomor_ktp')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group">
                                    <p>Nomor SIM</p>
                                    <input type="text" id="nomor_sim" autocomplete="off" value="{{ $sopir->nomor_sim }}" name="nomor_sim">
                                    <label for="nomor_sim" class="d-flex align-items-center">
                                        <span>Masukkan nomor sim</span>
                                    </label>
                                    @error('nomor_sim')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group">
                                    <p>Alamat</p>
                                    <input type="text" id="alamat" autocomplete="off" value="{{ $sopir->alamat }}" name="alamat">
                                    <label for="alamat" class="d-flex align-items-center">
                                        <span>Masukkan alamat</span>
                                    </label>
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
                                        <option value="benar" {{ $sopir->data_ktp == 'benar' ? 'selected' : '' }}>
                                            Sudah Benar</option>
                                        <option value="salah" {{ $sopir->data_ktp == 'salah' ? 'selected' : '' }}>
                                            Belum Benar</option>
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
                                        <option value="benar" {{ $sopir->data_sim == 'benar' ? 'selected' : '' }}>
                                            Sudah
                                            Benar</option>
                                        <option value="salah" {{ $sopir->data_sim == 'salah' ? 'selected' : '' }}>
                                            Belum
                                            Benar</option>
                                    </select>
                                    @error('data_sim')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group">
                                    <p for="data_nomor_telepon">Data Nomor Telepon</p>
                                    <select name="data_nomor_telepon" class="input" id="data_nomor_telepon" required>
                                        <option value="benar"
                                            {{ $sopir->data_nomor_telepon == 'benar' ? 'selected' : '' }}>
                                            Sudah
                                            Benar</option>
                                        <option value="salah"
                                            {{ $sopir->data_nomor_telepon == 'salah' ? 'selected' : '' }}>
                                            Belum
                                            Benar</option>
                                    </select>
                                    @error('data_nomor_telepon')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-group">
                                    <p for="status">Status</p>
                                    <select name="status" class="input" id="status" required>
                                        <option value="ada" {{ $sopir->status == 'ada' ? 'selected' : '' }}>
                                            Aktif</option>
                                        <option value="tidak ada" {{ $sopir->status == 'tidak ada' ? 'selected' : '' }}>
                                            Tidak Aktif</option>
                                    </select>
                                    @error('status')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="button-wrapper d-flex">
                                    <button type="submit" class="button-primary">Simpan Perubahan</button>
                                    <a href="{{ route('sopir') }}" class="button-reverse">Batal
                                        Edit</a>
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

        $("#status").select2({
            theme: "bootstrap-5",
        });

        const tagEditKTP = document.querySelector('.tag-edit-ktp');
        const inputEditKTP = document.querySelector('.input-edit-ktp');
        const buttonEditKTP = document.querySelector('.button-edit-ktp');

        const tagEditSIM = document.querySelector('.tag-edit-sim');
        const inputEditSIM = document.querySelector('.input-edit-sim');
        const buttonEditSIM = document.querySelector('.button-edit-sim');

        buttonEditKTP.addEventListener('click', function() {
            inputEditKTP.click();
        });

        inputEditKTP.addEventListener('change', function() {
            tagEditKTP.src = URL.createObjectURL(inputEditKTP.files[0]);
        });

        buttonEditSIM.addEventListener('click', function() {
            inputEditSIM.click();
        });

        inputEditSIM.addEventListener('change', function() {
            tagEditSIM.src = URL.createObjectURL(inputEditSIM.files[0]);
        });
    </script>
@endsection
