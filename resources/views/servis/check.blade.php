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
                <h5 class="subtitle">Servis Kendaraan</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form d-inline-block w-100" action="{{ route('servis.check.action', $kendaraan->id) }}"
                    method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-5">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ asset('assets/img/kendaraan-images/' . $kendaraan->foto_kendaraan) }}"
                                        class="img-fluid tag-create-image" alt="Kendaraan Image" width="80">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="nomor_plat">Nomor Plat</label>
                                        <input type="text" id="nomor_plat" class="input" autocomplete="off" disabled
                                            value="{{ $kendaraan->nomor_plat }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="kategori_kilometer">Kategori Kilometer</label>
                                        <input type="text" id="kategori_kilometer" class="input" autocomplete="off"
                                            disabled value="{{ $kendaraan->kilometer_kendaraan->jumlah }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="kilometer_sebelum">Kilometer Sebelum</label>
                                        <input type="number" id="kilometer_sebelum" name="kilometer_sebelum" class="input"
                                            autocomplete="off" value="{{ $kendaraan->kilometer }}" required>
                                        @error('kilometer_sebelum')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="kilometer_setelah">Kilometer Setelah</label>
                                        <input type="number" id="kilometer_setelah" name="kilometer_setelah" class="input"
                                            autocomplete="off" value="{{ $kendaraan->kilometer_saat_ini }}" required>
                                        @error('kilometer_setelah')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="tanggal_servis">Tanggal Servis</label>
                                        <input type="date" id="tanggal_servis" name="tanggal_servis" class="input"
                                            autocomplete="off" value="{{ old('tanggal_servis') }}" required>
                                        @error('tanggal_servis')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="total_bayar">Total Bayar</label>
                                        <input type="number" id="total_bayar" class="input" autocomplete="off"
                                            name="total_bayar" value="{{ old('total_bayar') }}">
                                        @error('total_bayar')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="air_accu">Air Accu</label>
                                        <select id="air_accu" class="input" name="air_accu" required>
                                            <option value="">Pilih kondisi air accu</option>
                                            <option value="ada" {{ old('air_accu') == 'ada' ? 'selected' : '' }}>Ada
                                            </option>
                                            <option value="tidak ada"
                                                {{ old('air_accu') == 'tidak ada' ? 'selected' : '' }}>Tidak Ada</option>
                                            <option value="kosong" {{ old('air_accu') == 'kosong' ? 'selected' : '' }}>
                                                Kosong</option>
                                        </select>
                                        @error('air_accu')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="air_waiper">Air Waiper</label>
                                        <select id="air_waiper" class="input" name="air_waiper" required>
                                            <option value="">Pilih kondisi air waiper</option>
                                            <option value="ada" {{ old('air_waiper') == 'ada' ? 'selected' : '' }}>Ada
                                            </option>
                                            <option value="tidak ada"
                                                {{ old('air_waiper') == 'tidak ada' ? 'selected' : '' }}>Tidak Ada</option>
                                            <option value="kosong" {{ old('air_waiper') == 'kosong' ? 'selected' : '' }}>
                                                Kosong</option>
                                        </select>
                                        @error('air_waiper')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="ban">Ban</label>
                                        <select id="ban" class="input" name="ban" required>
                                            <option value="">Pilih kondisi ban</option>
                                            <option value="ada" {{ old('ban') == 'ada' ? 'selected' : '' }}>Ada
                                            </option>
                                            <option value="tidak ada" {{ old('ban') == 'tidak ada' ? 'selected' : '' }}>
                                                Tidak Ada</option>
                                            <option value="kosong" {{ old('ban') == 'kosong' ? 'selected' : '' }}>Kosong
                                            </option>
                                        </select>
                                        @error('ban')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="oli">Oli</label>
                                        <select id="oli" class="input" name="oli" required>
                                            <option value="">Pilih kondisi oli</option>
                                            <option value="ada" {{ old('oli') == 'ada' ? 'selected' : '' }}>Ada
                                            </option>
                                            <option value="tidak ada" {{ old('oli') == 'tidak ada' ? 'selected' : '' }}>
                                                Tidak Ada</option>
                                            <option value="kosong" {{ old('oli') == 'kosong' ? 'selected' : '' }}>Kosong
                                            </option>
                                        </select>
                                        @error('oli')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 row-button">
                                    <div class="input-wrapper">
                                        <label for="keterangan">Keterangan</label>
                                        <input type="text" id="keterangan" class="input" autocomplete="off"
                                            name="keterangan" value="{{ old('keterangan') }}">
                                        @error('keterangan')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="button-wrapper d-flex">
                                        <button type="submit" class="button-primary">Servis Kendaraan</button>
                                        <a href="{{ route('servis') }}" class="button-reverse">Batal
                                            Servis</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $("#air_accu").select2({
            theme: "bootstrap-5",
        });

        $("#air_waiper").select2({
            theme: "bootstrap-5",
        });

        $("#ban").select2({
            theme: "bootstrap-5",
        });

        $("#oli").select2({
            theme: "bootstrap-5",
        });
    </script>
@endsection
