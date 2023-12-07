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
            <div class="col-12 d-flex flex-column flex-md-row justify-content-between items-md-center">
                <form class="form-search d-flex gap-3 flex-column flex-md-row" method="POST"
                    action="{{ route('pengembalian.search') }}">
                    @csrf
                    <div class="wrapper-searching position-relative">
                        <p class="mb-2">Tanggal mulai</p>
                        <input type="date" class="input" name="tanggal_mulai" required
                            @if (isset($tanggal_mulai)) value="{{ $tanggal_mulai }}" @endif>
                    </div>
                    <div class="wrapper-searching position-relative">
                        <p class="mb-2">Tanggal berakhir</p>
                        <input type="date" class="input" name="tanggal_akhir" required
                            @if (isset($tanggal_akhir)) value="{{ $tanggal_akhir }}" @endif>
                    </div>
                    <button type="submit" class="button-searching-tanggal position-absolute" style="top: -100px;">
                    </button>
                </form>
            </div>
        </div>
        <div class="row table-default">
            <div class="col-12 table-row table-header">
                <div class="row table-data gap-4">
                    <div class="col data-header">Kode</div>
                    <div class="col d-none d-lg-inline-block data-header">Nama</div>
                    <div class="col d-none d-lg-inline-block data-header">Kendaraan</div>
                    <div class="col d-none d-lg-inline-block data-header">Tanggal Mulai</div>
                    <div class="col d-none d-lg-inline-block data-header">Tanggal Akhir</div>
                    <div class="col-3 col-xl-2 data-header"></div>
                </div>
            </div>
            @if ($pemesanans->count() == 0)
                <div class="col-12 table-row table-border">
                    <div class="row table-data gap-4 align-items-center">
                        <div class="col data-value data-length">Tidak Ada Data Kendaraan Dipesan!</div>
                    </div>
                </div>
            @else
                @foreach ($pemesanans as $pemesanan)
                    <div class="col-12 table-row table-border">
                        <div class="row table-data gap-4 align-items-center">
                            <div class="col data-value data-length">
                                {{ $pemesanan->pemesanan->kode_pemesanan }}
                            </div>
                            <div class="col data-value data-length data-length-none">
                                {{ $pemesanan->pemesanan->pelanggan ? $pemesanan->pemesanan->pelanggan->nama : 'Belum memilih pelanggan' }}
                            </div>
                            <div class="col data-value data-length data-length-none">
                                {{ $pemesanan->kendaraan ? $pemesanan->kendaraan->nomor_plat : 'Belum memilih kendaraan' }}
                            </div>
                            <div class="col data-value data-length data-length-none">
                                {{ $pemesanan->pemesanan->tanggal_mulai }}</div>
                            <div class="col data-value data-length data-length-none">
                                {{ $pemesanan->pemesanan->tanggal_akhir_awal ? $pemesanan->pemesanan->tanggal_akhir_awal : $pemesanan->pemesanan->tanggal_akhir }}
                            </div>
                            <div class="col-3 col-xl-2 data-value d-flex justify-content-end">
                                <div class="wrapper-action d-flex">
                                    <a href="{{ route('pengembalian.detail', $pemesanan->id) }}"
                                        class="button-action button-approve d-flex justify-content-center align-items-center">
                                        <div class="approve-icon"></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="col-12 d-flex justify-content-end mt-4">
            {{ $pemesanans->links() }}
        </div>
    </div>
@endsection
