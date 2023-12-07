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
                <h5 class="subtitle">Laporan Data Booking Kendaraan</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="input-wrapper">
                            <label for="total_harian">Total Harian</label>
                            <input type="number" id="total_harian" class="input" autocomplete="off" name="total_harian"
                                readonly value="{{ $booking->total_harian != 0 ? $booking->total_harian : '0' }}">
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="input-wrapper">
                            <label for="total_mingguan">Total Mingguan</label>
                            <input type="number" id="total_mingguan" class="input" autocomplete="off" readonly
                                name="total_mingguan"
                                value="{{ $booking->total_mingguan != 0 ? $booking->total_mingguan : '0' }}">
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="input-wrapper">
                            <label for="total_bulanan">Total Bulanan</label>
                            <input type="number" id="total_bulanan" class="input" autocomplete="off" name="total_bulanan"
                                readonly value="{{ $booking->total_bulanan != 0 ? $booking->total_bulanan : '0' }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="tanggal_mulai">Tanggal Diambil</label>
                            <input type="date" id="tanggal_mulai" class="input" autocomplete="off"
                                value="{{ $booking->tanggal_mulai }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="tanggal_akhir">Tanggal Kembali</label>
                            <input type="date" id="tanggal_akhir" class="input" autocomplete="off"
                                value="{{ $booking->tanggal_akhir }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="pelanggans_id">Pelanggan</label>
                            <input type="text" id="pelanggans_id" class="input" autocomplete="off"
                                value="{{ $booking->pelanggan->nama }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="sopirs_id">Sopir</label>
                            @if ($booking->sopirs_id == null)
                                <input type="text" id="sopirs_id" class="input" autocomplete="off"
                                    value="Tidak memilih sopir" readonly>
                            @else
                                <input type="text" id="sopirs_id" class="input" autocomplete="off"
                                    value="{{ $booking->sopir->nama }}" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="jenis">Jenis Kendaraan</label>
                            <input type="text" id="jenis" class="input" autocomplete="off" readonly
                                value="{{ $booking->kendaraan->jenis_kendaraan->nama }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="brand">Brand Kendaraan</label>
                            <input type="text" id="brand" class="input" autocomplete="off" readonly
                                value="{{ $booking->kendaraan->brand_kendaraan->nama }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="seri">Seri Kendaraan</label>
                            <input type="text" id="seri" class="input" autocomplete="off" readonly
                                value="{{ $booking->kendaraan->seri_kendaraan->nomor_seri }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="kendaraans_id">Kendaraan</label>
                            <input type="text" id="kendaraans_id" class="input" autocomplete="off"
                                value="{{ $booking->kendaraan->nomor_plat }}" readonly>
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
                        <div class="button-wrapper">
                            <a href="{{ route('laporan.booking') }}" class="button-reverse">Kembali ke Halaman</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
