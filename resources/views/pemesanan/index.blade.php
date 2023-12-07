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
            <div class="col-12 d-flex flex-column flex-md-row justify-content-md-between align-items-md-center">
                <form class="form-search d-flex gap-3 flex-column flex-md-row" method="POST"
                    action="{{ route('pemesanan.search') }}">
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
                @if (\App\Models\Pelanggan::where('kelengkapan_ktp', 'lengkap')->where('kelengkapan_kk', 'lengkap')->where('kelengkapan_nomor_telepon', 'lengkap')->count() == 0 || \App\Models\Kendaraan::whereIn('status', ['ready', 'booking'])->count() == 0)
                    <form action="{{ route('booking.check') }}" method="POST">
                        @csrf
                        <button type="submit" class="button-primary d-none d-md-flex align-items-center"
                            style="height: max-content;">
                            <img src="{{ asset('assets/img/button/add.svg') }}" alt="Tambah Icon"
                                class="img-fluid button-icon">
                            Booking
                        </button>
                    </form>
                @else
                    <a href="{{ route('booking.create') }}" class="button-primary d-none d-md-flex align-items-center"
                        style="height: max-content;">
                        <img src="{{ asset('assets/img/button/add.svg') }}" alt="Tambah Icon" class="img-fluid button-icon">
                        Booking
                    </a>
                @endif
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
                    <div class="col d-none d-lg-inline-block data-header">Status</div>
                    <div class="col-3 col-xl-2 data-header"></div>
                </div>
            </div>
            @if ($bookings->count() == 0)
                <div class="col-12 table-row table-border">
                    <div class="row table-data gap-4 align-items-center">
                        <div class="col data-value data-length">Tidak Ada Data Kendaraan Dibooking!</div>
                    </div>
                </div>
            @else
                @foreach ($bookings as $booking)
                    <div class="col-12 table-row table-border">
                        <div class="row table-data gap-4 align-items-center">
                            <div class="col data-value data-length">
                                {{ $booking->kode_pemesanan }}</div>
                            <div class="col data-value data-length data-length-none">
                                {{ $booking->pelanggan ? $booking->pelanggan->nama : 'Belum memilih pelanggan' }}</div>
                            <div class="col data-value data-length data-length-none">
                                {{ $booking->kendaraan ? $booking->kendaraan->nomor_plat : 'Belum memilih kendaraan' }}
                            </div>
                            <div class="col data-value data-length data-length-none">{{ $booking->tanggal_mulai }}</div>
                            <div class="col data-value data-length data-length-none">{{ $booking->tanggal_akhir }}</div>
                            <div class="col data-value data-length data-length-none">
                                @if ($booking->kendaraan->status == 'dipesan' && $booking->status == 'selesai booking')
                                    <p class="status-true">Sedang Dipesan</p>
                                @elseif ($booking->kendaraan->status == 'servis')
                                    <p class="status-false">Diservis</p>
                                @elseif($booking->kendaraan->status == 'booking')
                                    <p class="status-true">Ready</p>
                                @else
                                    <p class="status-false">Sudah Dipesan</p>
                                @endif
                            </div>
                            <div class="col-3 col-xl-2 data-value d-flex justify-content-end">
                                <div class="wrapper-action d-flex">
                                    @if ($booking->kendaraan->status == 'booking')
                                        <a href="{{ route('booking.detail', $booking->id) }}"
                                            class="button-action button-approve d-flex justify-content-center align-items-center">
                                            <div class="approve-icon"></div>
                                        </a>
                                    @endif
                                    @if ($booking->kendaraan->status == 'dipesan' && $booking->status == 'selesai booking')
                                        <a href="{{ route('pemesanan.edit', $booking->id) }}"
                                            class="button-action button-edit d-none d-md-flex justify-content-center align-items-center">
                                            <div class="edit-icon"></div>
                                        </a>
                                    @else
                                        <a href="{{ route('booking.update', $booking->id) }}"
                                            class="button-action button-edit d-none d-md-flex justify-content-center align-items-center">
                                            <div class="edit-icon"></div>
                                        </a>
                                    @endif
                                    @if (
                                        ($booking->kendaraan->status == 'dipesan' && $booking->status == 'booking') ||
                                            $booking->kendaraan->status == 'booking')
                                        <button type="button"
                                            class="button-action button-delete d-none d-md-flex justify-content-center align-items-center"
                                            data-bs-toggle="modal" data-bs-target="#hapusBookingModal"
                                            data-id="{{ $booking->id }}">
                                            <div class="delete-icon"></div>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="col-12 d-flex justify-content-end mt-4">
            {{ $bookings->links() }}
        </div>
    </div>

    {{-- MODAL HAPUS BOOKING --}}
    <div class="modal modal-delete fade" id="hapusBookingModal" tabindex="-1" aria-labelledby="hapusBookingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Hapus Booking</h3>
                <form id="hapusBooking" class="form d-inline-block w-100" method="POST">
                    @csrf
                    <p class="caption-description row-button">Konfirmasi Penghapusan Booking: Apakah Anda yakin ingin
                        menghapus booking ini?
                        Tindakan ini tidak dapat diurungkan, dan booking akan dihapus secara permanen dari sistem.
                    </p>
                    <div class="button-wrapper d-flex">
                        <button type="submit" class="button-primary">Hapus Booking</button>
                        <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL HAPUS BOOKING --}}

    <script>
        $(document).on('click', '[data-bs-target="#detailBookingModal"]', function() {
            let id = $(this).data('id');
            $.ajax({
                type: 'get',
                url: '/booking/detail/' + id,
                success: function(data) {
                    $('.button-pemesanan').attr('href', '/pemesanan/release/' + data.id);
                    $('[data-value="nama_penyewa"]').val(data.pelanggan.nama);
                    $('[data-value="nama_kendaraan"]').val(data.kendaraan.nama_kendaraan);
                    $('[data-value="tanggal_mulai"]').val(data.tanggal_mulai);
                    $('[data-value="tanggal_akhir"]').val(data.tanggal_akhir);
                }
            });
        });

        $(document).on('click', '[data-bs-target="#editBookingModal"]', function() {
            let id = $(this).data('id');
            $('#editBooking').attr('action', '/booking/edit/' + id);
            $.ajax({
                type: 'get',
                url: '/booking/detail/' + id,
                success: function(data) {
                    $('[data-value="tanggal_mulai"]').val(data.tanggal_mulai);
                    $('[data-value="tanggal_akhir"]').val(data.tanggal_akhir);
                }
            });
        });

        $(document).on('click', '[data-bs-target="#hapusBookingModal"]', function() {
            let id = $(this).data('id');
            $('#hapusBooking').attr('action', '/booking/hapus/' + id);
        });
    </script>
@endsection
