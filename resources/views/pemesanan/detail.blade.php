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
                <h5 class="subtitle">Detail Booking Kendaraan</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="input-wrapper">
                            <label for="tarif_sewa_hari">Tarif Sewa Kendaran Harian</label>
                            @if ($pemesanan->kendaraan)
                                <input type="text" id="tarif_sewa_hari" class="input" autocomplete="off"
                                    value="{{ $pemesanan->kendaraan->tarif_sewa_hari }}" disabled>
                            @else
                                <input type="text" id="tarif_sewa_hari" class="input" autocomplete="off"
                                    value="Belum memilih kendaraan" disabled>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="input-wrapper">
                            <label for="tarif_sewa_minggu">Tarif Sewa Kendaran Mingguan</label>
                            @if ($pemesanan->kendaraan)
                                <input type="text" id="tarif_sewa_minggu" class="input" autocomplete="off"
                                    value="{{ $pemesanan->kendaraan->tarif_sewa_minggu }}" disabled>
                            @else
                                <input type="text" id="tarif_sewa_minggu" class="input" autocomplete="off"
                                    value="Belum memilih kendaraan" disabled>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="input-wrapper">
                            <label for="tarif_sewa_bulan">Tarif Sewa Kendaran Bulanan</label>
                            @if ($pemesanan->kendaraan)
                                <input type="text" id="tarif_sewa_bulan" class="input" autocomplete="off"
                                    value="{{ $pemesanan->kendaraan->tarif_sewa_bulan }}" disabled>
                            @else
                                <input type="text" id="tarif_sewa_bulan" class="input" autocomplete="off"
                                    value="Belum memilih kendaraan" disabled>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="input-wrapper">
                            <label for="total_harian">Total Harian</label>
                            <input type="number" id="total_harian" class="input" autocomplete="off" name="total_harian"
                                disabled value="{{ $pemesanan->total_harian != 0 ? $pemesanan->total_harian : '0' }}">
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="input-wrapper">
                            <label for="total_mingguan">Total Mingguan</label>
                            <input type="number" id="total_mingguan" class="input" autocomplete="off" disabled
                                name="total_mingguan"
                                value="{{ $pemesanan->total_mingguan != 0 ? $pemesanan->total_mingguan : '0' }}">
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="input-wrapper">
                            <label for="total_bulanan">Total Bulanan</label>
                            <input type="number" id="total_bulanan" class="input" autocomplete="off" name="total_bulanan"
                                disabled value="{{ $pemesanan->total_bulanan != 0 ? $pemesanan->total_bulanan : '0' }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="tanggal_mulai">Tanggal Diambil</label>
                            <input type="date" id="tanggal_mulai" class="input" autocomplete="off"
                                value="{{ $pemesanan->tanggal_mulai }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="tanggal_akhir">Tanggal Kembali</label>
                            <input type="date" id="tanggal_akhir" class="input" autocomplete="off"
                                value="{{ $pemesanan->tanggal_akhir }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="pelanggans_id">Pelanggan</label>
                            @if ($pemesanan->pelanggan)
                                <input type="text" id="pelanggans_id" class="input" autocomplete="off"
                                    value="{{ $pemesanan->pelanggan->nama }}" disabled>
                            @else
                                <input type="text" id="pelanggans_id" class="input" autocomplete="off"
                                    value="Belum memilih pelanggan" disabled>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="sopirs_id">Sopir</label>
                            @if ($pemesanan->sopir)
                                @if ($pemesanan->sopirs_id == null)
                                    <input type="text" id="sopirs_id" class="input" autocomplete="off"
                                        value="Tidak memilih sopir" disabled>
                                @else
                                    <input type="text" id="sopirs_id" class="input" autocomplete="off"
                                        value="{{ $pemesanan->sopir->nama }}" disabled>
                                @endif
                            @else
                                <input type="text" id="sopirs_id" class="input" autocomplete="off"
                                    value="Belum memilih sopir" disabled>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="jenis">Jenis Kendaraan</label>
                            @if ($pemesanan->kendaraan->jenis_kendaraan)
                                <input type="text" id="jenis" class="input" autocomplete="off" disabled
                                    value="{{ $pemesanan->kendaraan->jenis_kendaraan->nama }}">
                            @else
                                <input type="text" id="jenis" class="input" autocomplete="off" disabled
                                    value="Belum memilih jenis kendaraan">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="brand">Brand Kendaraan</label>
                            @if ($pemesanan->kendaraan->brand_kendaraan)
                                <input type="text" id="brand" class="input" autocomplete="off" disabled
                                    value="{{ $pemesanan->kendaraan->brand_kendaraan->nama }}">
                            @else
                                <input type="text" id="brand" class="input" autocomplete="off" disabled
                                    value="Belum memilih brand kendaraan">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="seri">Seri Kendaraan</label>
                            @if ($pemesanan->kendaraan->seri_kendaraan)
                                <input type="text" id="seri" class="input" autocomplete="off" disabled
                                    value="{{ $pemesanan->kendaraan->seri_kendaraan->nomor_seri }}">
                            @else
                                <input type="text" id="seri" class="input" autocomplete="off" disabled
                                    value="Belum memilih seri kendaraan">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 row-button">
                        <div class="input-wrapper">
                            <label for="kendaraans_id">Kendaraan</label>
                            @if ($pemesanan->kendaraan)
                                <input type="text" id="kendaraans_id" class="input" autocomplete="off"
                                    value="{{ $pemesanan->kendaraan->nomor_plat }}" disabled>
                            @else
                                <input type="text" id="kendaraans_id" class="input" autocomplete="off"
                                    value="Belum memilih kendaraan" disabled>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 d-none d-md-inline-block">
                        <div class="button-wrapper d-flex">
                            <a href="{{ route('pemesanan.release', $pemesanan->id) }}" class="button-primary">Pesan
                                Kendaraan</a>
                            <a href="{{ route('pemesanan') }}" class="button-reverse">Batal
                                Pesan</a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="button-wrapper d-flex d-md-none">
                            <a href="{{ route('pemesanan') }}" class="button-reverse">Kembali ke Halaman</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
