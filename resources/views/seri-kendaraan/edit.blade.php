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
                <h5 class="subtitle">Edit Seri Kendaraan</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form d-inline-block w-100" method="POST"
                    action="{{ route('seriKendaraan.update', $seri->id) }}">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="nomor">Seri Kendaraan</label>
                                <input type="text" id="nomor" class="input" required autocomplete="off"
                                    name="nomor_seri" value="{{ $seri->nomor_seri }}">
                                @error('nomor_seri')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="jenis_kendaraan_edit">Jenis Kendaraan</label>
                                <select id="jenis_kendaraan_edit" class="input" name="jenis_kendaraans_id" required>
                                    @if ($seri->jenis_kendaraan)
                                        @foreach ($jenises as $jenis)
                                            <option value="{{ $jenis->id }}"
                                                {{ $jenis->id == $seri->jenis_kendaraans_id ? 'selected' : '' }}>
                                                {{ $jenis->nama }}</option>
                                        @endforeach
                                    @else
                                        <option value="">Pilih jenis kendaraan</option>
                                        @foreach ($jenises as $jenis)
                                            <option value="{{ $jenis->id }}">
                                                {{ $jenis->nama }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('jenis_kendaraans_id')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 row-button">
                            <div class="input-wrapper">
                                <label for="brand_kendaraan_edit">Brand Kendaraan</label>
                                <select id="brand_kendaraan_edit" class="input" name="brand_kendaraans_id" required>
                                    @if ($seri->brand_kendaraan)
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"
                                                {{ $brand->id == $seri->brand_kendaraans_id ? 'selected' : '' }}>
                                                {{ $brand->nama }}</option>
                                        @endforeach
                                    @else
                                        <option value="">Pilih brand kendaraan</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">
                                                {{ $brand->nama }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('brand_kendaraans_id')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-wrapper d-flex">
                                <button type="submit" class="button-primary">Simpan Perubahan</button>
                                <a href="{{ route('seriKendaraan') }}" class="button-reverse">Batal
                                    Edit</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $("#jenis_kendaraan_edit").select2({
            theme: "bootstrap-5",
        });

        $("#brand_kendaraan_edit").select2({
            theme: "bootstrap-5",
        });
    </script>
@endsection
