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
                <h5 class="subtitle">Detail Seri Kendaraan</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form d-inline-block w-100">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="nomor">Seri Kendaraan</label>
                                <input type="text" id="nomor" class="input" autocomplete="off"
                                    value="{{ $seri->nomor_seri }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="jenis_kendaraan_add">Jenis Kendaraan</label>
                                @if ($seri->jenis_kendaraan)
                                    <input type="text" id="jenis_kendaraan_add" class="input" autocomplete="off"
                                        value="{{ $seri->jenis_kendaraan->nama }}" disabled>
                                @else
                                    <input type="text" id="jenis_kendaraan_add" class="input" autocomplete="off"
                                        value="Tidak memilih jenis kendaraan" disabled>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 row-button">
                            <div class="input-wrapper">
                                <label for="brand_kendaraan_add">Brand Kendaraan</label>
                                @if ($seri->brand_kendaraan)
                                    <input type="text" id="brand_kendaraan_add" class="input" autocomplete="off"
                                        value="{{ $seri->brand_kendaraan->nama }}" disabled>
                                @else
                                    <input type="text" id="brand_kendaraan_add" class="input" autocomplete="off"
                                        value="Tidak memilih brand kendaraan" disabled>
                                @endif
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-wrapper d-flex">
                                <a href="{{ route('seriKendaraan') }}" class="button-reverse">Kembali ke Halaman</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
