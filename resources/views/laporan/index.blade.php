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
        <div class="row mb-4">
            <div class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 gap-md-0">
                <h5 class="subtitle">Data Laporan</h5>
                <div class="wrapper position-relative" style="width: max-content;">
                    <button type="button"
                        class="button-other position-relative button-primary-blur d-flex align-items-center">
                        <img src="{{ asset('assets/img/button/filter.svg') }}" alt="Icon Filter"
                            class="img-fluid button-icon">
                        Filter Kategori Laporan
                        <img src="{{ asset('assets/img/button/arrow-down-primary.svg') }}" alt="Icon Filter"
                            class="img-fluid button-icon" style="margin-left: 6px;">
                    </button>
                    <div class="modal-other d-flex flex-column">
                        <a href="{{ route('laporan') }}"
                            class="modal-link {{ Request::is('laporan') ? 'active' : '' }}">Tampilkan Semua</a>
                        <a href="{{ route('laporan.pelanggan') }}"
                            class="modal-link {{ Request::is('laporan/pelanggan') ? 'active' : '' }}">Pelanggan</a>
                        <a href="{{ route('laporan.sopir') }}"
                            class="modal-link {{ Request::is('laporan/sopir') ? 'active' : '' }}">Sopir</a>
                        <a href="{{ route('laporan.kendaraan') }}"
                            class="modal-link {{ Request::is('laporan/kendaraan') ? 'active' : '' }}">Kendaraan</a>
                        <a href="{{ route('laporan.booking') }}"
                            class="modal-link {{ Request::is('laporan/booking') ? 'active' : '' }}">Booking</a>
                        <a href="{{ route('laporan.pemesanan') }}"
                            class="modal-link {{ Request::is('laporan/pemesanan') ? 'active' : '' }}">Pemesanan</a>
                        <a href="{{ route('laporan.pengembalian') }}"
                            class="modal-link {{ Request::is('laporan/pengembalian') ? 'active' : '' }}">Pengembalian</a>
                        <a href="{{ route('laporan.penambahan') }}"
                            class="modal-link {{ Request::is('laporan/penambahan') ? 'active' : '' }}">Penambahan</a>
                        <a href="{{ route('laporan.servis') }}"
                            class="modal-link {{ Request::is('laporan/servis') ? 'active' : '' }}">Servis</a>
                        <a href="{{ route('laporan.pajak') }}"
                            class="modal-link {{ Request::is('laporan/pajak') ? 'active' : '' }}">Pajak</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row table-default">
            <div class="col-12 table-row table-header">
                <div class="row table-data gap-4">
                    <div class="col-md-3 col-lg-4 col-xl-5 data-header">Laporan Kegiatan</div>
                    <div class="col d-none d-lg-inline-block data-header">Pengguna</div>
                    <div class="col d-none d-lg-inline-block data-header">Tanggal dan Waktu</div>
                    <div class="col-3 col-xl-2 data-header"></div>
                </div>
            </div>
            @if ($laporans->count() == 0)
                <div class="col-12 table-row table-border">
                    <div class="row table-data gap-4 align-items-center">
                        <div class="col data-value data-length">Tidak Ada Data Laporan!</div>
                    </div>
                </div>
            @else
                @foreach ($laporans as $laporan)
                    <div class="col-12 table-row table-border">
                        <div class="row table-data gap-4 align-items-center">
                            @if ($laporan->kategori_laporan == 'pelanggan')
                                <div class="col col-lg-4 col-xl-5 data-value data-length">
                                    {{ \App\Models\Pelanggan::where('id', $laporan->relations_id)->first()->nama }} telah
                                    terdaftar menjadi salah satu pelanggan kami</div>
                            @elseif ($laporan->kategori_laporan == 'sopir')
                                <div class="col col-lg-4 col-xl-5 data-value data-length">
                                    {{ \App\Models\Sopir::where('id', $laporan->relations_id)->first()->nama }} telah
                                    terdaftar menjadi salah satu sopir kami</div>
                            @elseif ($laporan->kategori_laporan == 'kendaraan')
                                <div class="col col-lg-4 col-xl-5 data-value data-length">
                                    {{ \App\Models\Kendaraan::where('id', $laporan->relations_id)->first()->stnk_nama }}
                                    telah menyewakan kendaraannya dengan nomor
                                    {{ \App\Models\Kendaraan::where('id', $laporan->relations_id)->first()->nomor_plat }}
                                </div>
                            @elseif ($laporan->kategori_laporan == 'booking')
                                <div class="col col-lg-4 col-xl-5 data-value data-length">
                                    Kendaraan
                                    {{ \App\Models\Pemesanan::where('id', $laporan->relations_id)->with('pelanggan')->first()->kendaraan->nomor_plat }}
                                    telah dibooking oleh
                                    {{ \App\Models\Pemesanan::where('id', $laporan->relations_id)->with('pelanggan')->first()->pelanggan->nama }}
                                </div>
                            @elseif ($laporan->kategori_laporan == 'pemesanan')
                                <div class="col col-lg-4 col-xl-5 data-value data-length">
                                    Kendaraan
                                    {{ \App\Models\PelepasanPemesanan::where('id', $laporan->relations_id)->with('kendaraan')->first()->kendaraan->nomor_plat }}
                                    telah dipesan oleh
                                    {{ \App\Models\PelepasanPemesanan::where('id', $laporan->relations_id)->with('pemesanan')->first()->pemesanan->pelanggan->nama }}
                                </div>
                            @elseif ($laporan->kategori_laporan == 'pengembalian')
                                <div class="col col-lg-4 col-xl-5 data-value data-length">
                                    Kendaraan
                                    {{ \App\Models\Pengembalian::where('id', $laporan->relations_id)->with('pelepasan_pemesanan')->first()->pelepasan_pemesanan->kendaraan->nomor_plat }}
                                    dikembalikan
                                    {{ \App\Models\Pengembalian::where('id', $laporan->relations_id)->first()->ketepatan_waktu }}
                                    waktu
                                </div>
                            @elseif ($laporan->kategori_laporan == 'penambahan')
                                <div class="col col-lg-4 col-xl-5 data-value data-length">
                                    {{ \App\Models\PenambahanSewa::where('id', $laporan->relations_id)->with('pelepasan_pemesanan')->first()->pelepasan_pemesanan->pemesanan->pelanggan->nama }}
                                    menambahkan penyewaan pada kendaraan
                                    {{ \App\Models\PenambahanSewa::where('id', $laporan->relations_id)->with('kendaraan')->first()->kendaraan->nomor_plat }}
                                </div>
                            @elseif ($laporan->kategori_laporan == 'servis')
                                <div class="col col-lg-4 col-xl-5 data-value data-length">
                                    Kendaraan
                                    {{ \App\Models\Servis::where('id', $laporan->relations_id)->with('kendaraan')->first()->kendaraan->nomor_plat }}
                                    telah diservis
                                </div>
                            @elseif ($laporan->kategori_laporan == 'pajak')
                                <div class="col col-lg-4 col-xl-5 data-value data-length">
                                    Kendaraan
                                    {{ \App\Models\Pajak::where('id', $laporan->relations_id)->with('kendaraan')->first()->kendaraan->nomor_plat }}
                                    telah membayar
                                    {{ \App\Models\Pajak::where('id', $laporan->relations_id)->first()->jenis_pajak }}
                                </div>
                            @endif
                            <div class="col data-value data-length data-length-none">{{ $laporan->pengguna->nama_lengkap }}
                            </div>
                            <div class="col data-value data-length data-length-none">{{ $laporan->created_at }}</div>
                            <div class="col-2 col-md-3 col-xl-2 data-value d-flex justify-content-end">
                                <div class="wrapper-action d-flex">
                                    <a href="{{ route('laporan.pemesanan.detail', $laporan->id) }}"
                                        class="button-action button-detail d-flex justify-content-center align-items-center">
                                        <div class="detail-icon"></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="col-12 d-flex justify-content-end mt-4">
            {{ $laporans->links() }}
        </div>
    </div>

    <script>
        const buttonOther = document.querySelector('.button-other');
        const modalOther = document.querySelector('.modal-other');

        buttonOther.addEventListener('click', function() {
            modalOther.classList.toggle('active');
        });
    </script>
@endsection
