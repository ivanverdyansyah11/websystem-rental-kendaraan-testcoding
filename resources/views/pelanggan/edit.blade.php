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
                <h5 class="subtitle">Edit Pelanggan</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form d-inline-block w-100" method="POST"
                    action="{{ route('pelanggan.update', $pelanggan->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-lg-4 col-xl-3 mb-5">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ $pelanggan->foto_ktp ? asset('assets/img/ktp-images/' . $pelanggan->foto_ktp) : asset('assets/img/default/image-notfound.svg') }}"
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
                        <div class="col-md-6 col-lg-4 col-xl-3 mb-5">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ $pelanggan->foto_kk ? asset('assets/img/kk-images/' . $pelanggan->foto_kk) : asset('assets/img/default/image-notfound.svg') }}"
                                        class="img-fluid tag-edit-kk" alt="KK Image" width="80">
                                    <div class="wrapper-image w-100">
                                        <input type="file" accept=".png,.jpg,.jpeg" id="image" class="input-edit-kk"
                                            name="foto_kk" style="opacity: 0;">
                                        <button type="button" class="button-reverse button-edit-kk">Pilih Foto
                                            KK</button>
                                    </div>
                                </div>
                                @error('foto_kk')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="nama">Nama</label>
                                    <input type="text" id="nama" class="input" required autocomplete="off"
                                        name="nama" value="{{ $pelanggan->nama }}">
                                    @error('nama')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="nik">NIK</label>
                                    <input type="number" id="nik" class="input" required autocomplete="off"
                                        name="nik" value="{{ $pelanggan->nik }}">
                                    @error('nik')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="nomor_telepon">Nomor Telepon</label>
                                    <input type="number" id="nomor_telepon" class="input" autocomplete="off"
                                        name="nomor_telepon" value="{{ $pelanggan->nomor_telepon }}">
                                    @error('nomor_telepon')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="nomor_ktp">Nomor KTP</label>
                                    <input type="number" id="nomor_ktp" class="input" autocomplete="off" name="nomor_ktp"
                                        value="{{ $pelanggan->nomor_ktp }}">
                                    @error('nomor_ktp')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="nomor_kk">Nomor KK</label>
                                    <input type="number" id="nomor_kk" class="input" autocomplete="off" name="nomor_kk"
                                        value="{{ $pelanggan->nomor_kk }}">
                                    @error('nomor_kk')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" id="alamat" class="input" required autocomplete="off"
                                        name="alamat" value="{{ $pelanggan->alamat }}">
                                    @error('alamat')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="data_ktp">Data KTP</label>
                                    <select name="data_ktp" class="input" id="data_ktp" required>
                                        <option value="benar" {{ $pelanggan->data_ktp == 'benar' ? 'selected' : '' }}>
                                            Sudah Benar</option>
                                        <option value="salah" {{ $pelanggan->data_ktp == 'salah' ? 'selected' : '' }}>
                                            Belum Benar</option>
                                    </select>
                                    @error('data_ktp')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="data_kk">Data KK</label>
                                    <select name="data_kk" class="input" id="data_kk" required>
                                        <option value="benar" {{ $pelanggan->data_kk == 'benar' ? 'selected' : '' }}>
                                            Sudah
                                            Benar</option>
                                        <option value="salah" {{ $pelanggan->data_kk == 'salah' ? 'selected' : '' }}>
                                            Belum
                                            Benar</option>
                                    </select>
                                    @error('data_kk')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 row-button">
                                <div class="input-wrapper">
                                    <label for="data_nomor_telepon">Data Nomor Telepon</label>
                                    <select name="data_nomor_telepon" class="input" id="data_nomor_telepon" required>
                                        <option value="benar"
                                            {{ $pelanggan->data_nomor_telepon == 'benar' ? 'selected' : '' }}>
                                            Sudah
                                            Benar</option>
                                        <option value="salah"
                                            {{ $pelanggan->data_nomor_telepon == 'salah' ? 'selected' : '' }}>
                                            Belum
                                            Benar</option>
                                    </select>
                                    @error('data_nomor_telepon')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="button-wrapper d-flex">
                                    <button type="submit" class="button-primary">Simpan Perubahan</button>
                                    <a href="{{ route('pelanggan') }}" class="button-reverse">Batal
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

        $("#data_kk").select2({
            theme: "bootstrap-5",
        });

        $("#data_nomor_telepon").select2({
            theme: "bootstrap-5",
        });

        const tagEditKTP = document.querySelector('.tag-edit-ktp');
        const inputEditKTP = document.querySelector('.input-edit-ktp');
        const buttonEditKTP = document.querySelector('.button-edit-ktp');

        const tagEditKK = document.querySelector('.tag-edit-kk');
        const inputEditKK = document.querySelector('.input-edit-kk');
        const buttonEditKK = document.querySelector('.button-edit-kk');

        buttonEditKTP.addEventListener('click', function() {
            inputEditKTP.click();
        });

        inputEditKTP.addEventListener('change', function() {
            tagEditKTP.src = URL.createObjectURL(inputEditKTP.files[0]);
        });

        buttonEditKK.addEventListener('click', function() {
            inputEditKK.click();
        });

        inputEditKK.addEventListener('change', function() {
            tagEditKK.src = URL.createObjectURL(inputEditKK.files[0]);
        });
    </script>
@endsection
