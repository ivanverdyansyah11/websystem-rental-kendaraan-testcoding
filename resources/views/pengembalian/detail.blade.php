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
                <form class="form d-inline-block w-100">
                    <div class="row mb-4">
                        <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ $pelepasan_pemesanan->foto_dokumen ? asset('assets/img/pemesanan-dokumen-images/' . $pelepasan_pemesanan->foto_dokumen) : asset('assets/img/default/image-notfound.svg') }}"
                                        class="img-fluid tag-create-document" alt="Dokumen Image" width="80">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ $pelepasan_pemesanan->foto_kendaraan ? asset('assets/img/pemesanan-kendaraan-images/' . $pelepasan_pemesanan->foto_kendaraan) : asset('assets/img/default/image-notfound.svg') }}"
                                        class="img-fluid tag-create-vehicle" alt="Kendaraan Image" width="80">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ $pelepasan_pemesanan->foto_pelanggan ? asset('assets/img/pemesanan-pelanggan-images/' . $pelepasan_pemesanan->foto_pelanggan) : asset('assets/img/default/image-notfound.svg') }}"
                                        class="img-fluid tag-create-customer" alt="Pelanggan Image" width="80">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <p for="nama_penyewa">Nama Pelanggan</p>
                                        @if ($pelepasan_pemesanan->pemesanan->pelanggan)
                                            <input type="text" id="nama_penyewa" class="input" autocomplete="off"
                                                value="{{ $pelepasan_pemesanan->pemesanan->pelanggan->nama }}" readonly>
                                        @else
                                            <input type="text" id="nama_penyewa" class="input" autocomplete="off"
                                                value="Belum memilih pelanggan" readonly>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <p for="nomor_plat">Nomor Plat</p>
                                        @if ($pelepasan_pemesanan->kendaraan)
                                            <input type="text" id="nomor_plat" class="input" autocomplete="off"
                                                value="{{ $pelepasan_pemesanan->kendaraan->nomor_plat }}" readonly>
                                        @else
                                            <input type="text" id="nomor_plat" class="input" autocomplete="off"
                                                value="Belum memilih kendaraan" readonly>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <p for="kilometer_keluar">Kilometer Keluar (Km)</p>
                                        <input type="number" id="kilometer_keluar" class="input" autocomplete="off" readonly
                                            value="{{ $pelepasan_pemesanan->kilometer_keluar }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <p for="bensin_keluar">Bensin Keluar (Liter)</p>
                                        <input type="number" id="bensin_keluar" class="input" autocomplete="off" readonly
                                            value="{{ $pelepasan_pemesanan->bensin_keluar }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <p for="sarung_jok">Sarung Jok</p>
                                        <input type="text" id="sarung_jok" class="input text-capitalize" autocomplete="off"
                                            readonly value="{{ $pelepasan_pemesanan->sarung_jok }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <p for="karpet">Karpet</p>
                                        <input type="text" id="karpet" class="input text-capitalize" autocomplete="off"
                                            readonly value="{{ $pelepasan_pemesanan->karpet }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <p for="kondisi_kendaraan">Kondisi Kendaraan</p>
                                        <input type="text" id="kondisi_kendaraan" class="input text-capitalize"
                                            autocomplete="off" readonly
                                            value="{{ $pelepasan_pemesanan->kondisi_kendaraan }}">
                                    </div>
                                </div>
                                <div class="col-mb-3">
                                    <div class="input-group">
                                        <p for="ban_serep">Ban Serep</p>
                                        <input type="text" id="ban_serep" class="input text-capitalize"
                                            autocomplete="off" readonly value="{{ $pelepasan_pemesanan->ban_serep }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4 mt-2">
                        <div class="input-wrapper">
                            <div class="input-line position-relative mb-2">
                                <div class="line"></div>
                                <p>Pembayaran Pelepasan Kendaraan</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ $pelepasan_pemesanan->pembayaran_pemesanan->foto_pembayaran ? asset('assets/img/pembayaran-pemesanan-images/' . $pelepasan_pemesanan->pembayaran_pemesanan->foto_pembayaran) : asset('assets/img/default/image-notfound.svg') }}"
                                        class="img-fluid tag-create-transaction" alt="Pembayaran Image" width="80">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <p for="waktu_sewa">Waktu Sewa (Hari)</p>
                                        <input type="number" id="waktu_sewa" class="input" autocomplete="off"
                                            value="{{ $pelepasan_pemesanan->pembayaran_pemesanan->waktu_sewa }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <p for="total_tarif_sewa">Total Tarif Sewa</p>
                                        <input type="number" id="total_tarif_sewa" class="input" autocomplete="off"
                                            value="{{ $pelepasan_pemesanan->pembayaran_pemesanan->total_tarif_sewa }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <p for="total_bayar">Total Bayar</p>
                                        <input type="number" id="total_bayar" class="input" autocomplete="off" readonly
                                            value="{{ $pelepasan_pemesanan->pembayaran_pemesanan->total_bayar ? $pelepasan_pemesanan->pembayaran_pemesanan->total_bayar : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <p for="total_kembalian">Total Kembalian</p>
                                        <input type="number" id="total_kembalian" class="input" autocomplete="off"
                                            value="{{ $pelepasan_pemesanan->pembayaran_pemesanan->total_kembalian }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <p for="jenis_pembayaran">Jenis Pembayaran</p>
                                        <input type="text" id="jenis_pembayaran" class="input text-capitalize"
                                            autocomplete="off" readonly
                                            value="{{ $pelepasan_pemesanan->pembayaran_pemesanan->jenis_pembayaran }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <p for="metode_bayar">Metode Pembayaran</p>
                                        <input type="text" id="metode_bayar" class="input text-capitalize"
                                            autocomplete="off" readonly
                                            value="{{ $pelepasan_pemesanan->pembayaran_pemesanan->metode_bayar }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <p for="sopirs_id">Penyewaan Sopir</p>
                                        @if ($pelepasan_pemesanan->pemesanan->sopir)
                                            <input type="text" id="sopirs_id" class="input" autocomplete="off"
                                                value="{{ $pelepasan_pemesanan->pemesanan->sopir->nama }}" readonly>
                                        @else
                                            <input type="text" id="sopirs_id" class="input" autocomplete="off"
                                                value="Tidak Memilih Sopir" readonly>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-group">
                                        <p for="keterangan">Keterangan</p>
                                        <input type="text" id="keterangan" class="input" autocomplete="off" readonly
                                            value="{{ $pelepasan_pemesanan->pembayaran_pemesanan->keterangan }}">
                                    </div>
                                </div>
                                <div class="col-12 d-none d-md-inline-block">
                                    <div class="button-wrapper d-flex">
                                        <a href="{{ route('pengembalian.restoration', $pelepasan_pemesanan->id) }}"
                                            class="button-primary">Lakukan Pengembalian</a>
                                        @if (!\App\Models\PenambahanSewa::where('pelepasan_pemesanans_id', $pelepasan_pemesanan->id)->first())
                                            <a href="{{ route('penambahan.rent', $pelepasan_pemesanan->id) }}"
                                                class="button-primary">Tambah
                                                Persewaan</a>
                                        @endif
                                        <a href="{{ route('pengembalian') }}" class="button-reverse">Batal
                                            Pengembalian</a>
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
                </form>
            </div>
        </div>
    </div>
@endsection
