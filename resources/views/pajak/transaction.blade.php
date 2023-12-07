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
                <h5 class="subtitle">Bayar Pajak</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form d-inline-block w-100" method="POST"
                    action="{{ route('pajak.transaction.action', $kendaraan->id) }}">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ asset('assets/img/kendaraan-images/' . $kendaraan->foto_kendaraan) }}"
                                        class="img-fluid" alt="Kendaraan Image" width="80">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="input-group">
                                <p for="stnk_nama">STNK Atas Nama</p>
                                <input type="text" id="stnk_nama" class="input" autocomplete="off"
                                    value="{{ $kendaraan->stnk_nama }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="input-group">
                                <p for="nomor_seri">Nomor Seri</p>
                                <input type="text" id="nomor_seri" class="input" autocomplete="off"
                                    value="{{ $kendaraan->seri_kendaraan->nomor_seri }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="input-group">
                                <p for="jenis">Jenis Kendaraan</p>
                                <input type="text" id="jenis" class="input" autocomplete="off"
                                    value="{{ $kendaraan->jenis_kendaraan->nama }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="input-group">
                                <p for="brand">Brand Kendaraan</p>
                                <input type="text" id="brand" class="input" autocomplete="off"
                                    value="{{ $kendaraan->brand_kendaraan->nama }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="input-group">
                                <p for="jenis_pajak">Jenis Pajak</p>
                                <select id="jenis_pajak" class="input" name="jenis_pajak" required>
                                    <option value="">Pilih jenis pajak kendaraan</option>
                                    <option value="samsat" {{ old('jenis_pajak') == 'samsat' ? 'selected' : '' }}>Samsat
                                    </option>
                                    <option value="angsuran" {{ old('jenis_pajak') == 'angsuran' ? 'selected' : '' }}>
                                        Angsuran</option>
                                    <option value="ganti nomor polisi"
                                        {{ old('jenis_pajak') == 'ganti nomor polisi' ? 'selected' : '' }}>Ganti Nomor
                                        Polisi</option>
                                </select>
                                @error('jenis_pajak')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="input-group">
                                <p for="metode_bayar">Metode Pembayaran</p>
                                <select id="metode_bayar" class="input" name="metode_bayar" required>
                                    <option value="">Pilih metode pembayaran</option>
                                    <option value="transfer bank"
                                        {{ old('metode_bayar') == 'transfer bank' ? 'selected' : '' }}>Transfer Bank
                                    </option>
                                    <option value="internet banking"
                                        {{ old('metode_bayar') == 'internet banking' ? 'selected' : '' }}>Internet Banking
                                        (E-Banking)</option>
                                    <option value="mobile banking"
                                        {{ old('metode_bayar') == 'mobile banking' ? 'selected' : '' }}>Mobile Banking
                                    </option>
                                    <option value="virtual account"
                                        {{ old('metode_bayar') == 'virtual account' ? 'selected' : '' }}>Virtual Account
                                        (VA)
                                    </option>
                                    <option value="online credit card"
                                        {{ old('metode_bayar') == 'online credit card' ? 'selected' : '' }}>Online Credit
                                        Card
                                    </option>
                                    <option value="rekening bersama"
                                        {{ old('metode_bayar') == 'rekening bersama' ? 'selected' : '' }}>Rekening Bersama
                                        (Rekber)</option>
                                    <option value="payPal" {{ old('metode_bayar') == 'payPal' ? 'selected' : '' }}>
                                        PayPal</option>
                                    <option value="e-money" {{ old('metode_bayar') == 'e-money' ? 'selected' : '' }}>
                                        e-Money</option>
                                </select>
                                @error('metode_bayar')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="input-group">
                                <p for="tanggal_bayar">Tanggal Bayar</p>
                                <input type="date" id="tanggal_bayar" class="input" autocomplete="off"
                                    name="tanggal_bayar" value="{{ old('tanggal_bayar') }}" required>
                                @error('tanggal_bayar')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="input-group">
                                <p for="jumlah_bayar">Jumlah Bayar</p>
                                <input type="number" id="jumlah_bayar" class="input" autocomplete="off"
                                    name="jumlah_bayar" value="{{ old('jumlah_bayar') }}" required>
                                @error('jumlah_bayar')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="input-group">
                                <p for="finance">Staff Finance</p>
                                <input type="text" id="finance" class="input" autocomplete="off" name="finance"
                                    value="{{ old('finance') }}" required>
                                @error('finance')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-wrapper d-flex">
                                <button type="submit" class="button-primary">Bayar Pajak</button>
                                <a href="{{ route('pajak') }}" class="button-reverse">Batal
                                    Bayar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $("#jenis_pajak").select2({
            theme: "bootstrap-5",
        });

        $("#metode_bayar").select2({
            theme: "bootstrap-5",
        });
    </script>
@endsection
