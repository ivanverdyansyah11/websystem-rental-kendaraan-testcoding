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
            <div class="col-12 d-flex justify-content-between align-items-center">
                <form class="form-search d-inline-block" method="POST" action="{{ route('kilometerKendaraan.search') }}">
                    @csrf
                    <div class="wrapper-search">
                        <input type="text" class="input-search" placeholder=" " name="search">
                        <label class="d-flex align-items-center">
                            <img src="{{ asset('assets/img/button/search.svg') }}" alt="Searcing Icon"
                                class="img-fluid search-icon">
                            <p>Cari kilometer..</p>
                        </label>
                    </div>
                </form>
                <button type="button" class="button-primary d-none d-md-flex align-items-center" data-bs-toggle="modal"
                    data-bs-target="#tambahKilometerModal">
                    <img src="{{ asset('assets/img/button/add.svg') }}" alt="Tambah Icon" class="img-fluid button-icon">
                    Tambah
                </button>
            </div>
        </div>
        <div class="row table-default">
            <div class="col-12 table-row table-header">
                <div class="row table-data gap-4">
                    <div class="col data-header">Kategori Kilometer Kendaraan</div>
                    <div class="col-3 col-xl-2 data-header"></div>
                </div>
            </div>
            @if ($kilometers->count() == 0)
                <div class="col-12 table-row table-border">
                    <div class="row table-data gap-4 align-items-center">
                        <div class="col data-value data-length">Tidak Ada Data Kategori Kilometer Kendaraan!</div>
                    </div>
                </div>
            @else
                @foreach ($kilometers as $kilometer)
                    <div class="col-12 table-row table-border">
                        <div class="row table-data gap-4 align-items-center">
                            <div class="col data-value data-length">Kilometer {{ $kilometer->jumlah }}</div>
                            <div class="col-3 col-xl-2 data-value d-flex justify-content-end">
                                <div class="wrapper-action d-flex">
                                    <button type="button"
                                        class="button-action button-detail d-flex justify-content-center align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#detailKilometerModal"
                                        data-id="{{ $kilometer->id }}">
                                        <div class="detail-icon"></div>
                                    </button>
                                    <button type="button"
                                        class="button-action button-edit d-none d-md-flex justify-content-center align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#editKilometerModal"
                                        data-id="{{ $kilometer->id }}">
                                        <div class="edit-icon"></div>
                                    </button>
                                    <button type="button"
                                        class="button-action button-delete d-none d-md-flex justify-content-center align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#hapusKilometerModal"
                                        data-id="{{ $kilometer->id }}">
                                        <div class="delete-icon"></div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="col-12 d-flex justify-content-end mt-4">
            {{ $kilometers->links() }}
        </div>
    </div>

    {{-- MODAL TAMBAH KILOMETER KENDARAAN --}}
    <div class="modal fade" id="tambahKilometerModal" tabindex="-1" aria-labelledby="tambahKilometerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Tambah Kategori Kilometer</h3>
                <form class="form d-inline-block w-100" method="POST" action="{{ route('kilometerKendaraan.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-12 row-button">
                            <div class="input-wrapper">
                                <label for="nama">Kategori Kilometer</label>
                                <input type="number" id="nama" class="input" required autocomplete="off"
                                    name="jumlah" value="{{ old('jumlah') }}">
                                @error('jumlah')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-wrapper d-flex">
                                <button type="submit" class="button-primary">Tambah Kategori</button>
                                <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal
                                    Tambah</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL TAMBAH KILOMETER KENDARAAN --}}

    {{-- MODAL DETAIL KILOMETER KENDARAAN --}}
    <div class="modal fade" id="detailKilometerModal" tabindex="-1" aria-labelledby="detailKilometerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Detail Kategori Kilometer</h3>
                <form class="form d-inline-block w-100">
                    <div class="row">
                        <div class="col-12 row-button">
                            <div class="input-wrapper">
                                <label for="nama">Kategori Kilometer</label>
                                <input type="number" id="nama" class="input" autocomplete="off" disabled
                                    data-value="jumlah">
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="button" class="button-reverse" data-bs-dismiss="modal">Tutup Modal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL DETAIL KILOMETER KENDARAAN --}}

    {{-- MODAL EDIT KILOMETER KENDARAAN --}}
    <div class="modal fade" id="editKilometerModal" tabindex="-1" aria-labelledby="editKilometerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Edit Kategori Kilometer</h3>
                <form id="editKilometer" class="form d-inline-block w-100" method="POST">
                    @csrf
                    @csrf
                    <div class="row">
                        <div class="col-12 row-button">
                            <div class="input-wrapper">
                                <label for="nama">Kategori Kilometer</label>
                                <input type="number" id="nama" class="input" required autocomplete="off"
                                    data-value="jumlah" name="jumlah">
                                @error('jumlah')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-wrapper d-flex">
                                <button type="submit" class="button-primary">Simpan Perubahan</button>
                                <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal
                                    Edit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL EDIT KILOMETER KENDARAAN --}}

    {{-- MODAL HAPUS KILOMETER KENDARAAN --}}
    <div class="modal modal-delete fade" id="hapusKilometerModal" tabindex="-1"
        aria-labelledby="hapusKilometerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Hapus Kategori Kilometer</h3>
                <form id="hapusKilometer" class="form d-inline-block w-100" method="POST">
                    @csrf
                    <p class="caption-description row-button">Konfirmasi Penghapusan Kategori Kilometer Kendaraan: Apakah
                        Anda yakin
                        ingin
                        menghapus kategori kilometer kendaraan ini?
                        Tindakan ini tidak dapat diurungkan, dan kategori kilometer kendaraan akan dihapus secara permanen
                        dari sistem.
                    </p>
                    <div class="button-wrapper d-flex">
                        <button type="submit" class="button-primary">Hapus Kategori</button>
                        <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL HAPUS KILOMETER KENDARAAN --}}

    <script>
        $(document).on('click', '[data-bs-target="#detailKilometerModal"]', function() {
            let id = $(this).data('id');
            $.ajax({
                type: 'get',
                url: '/kilometer-kendaraan/detail/' + id,
                success: function(data) {
                    $('[data-value="jumlah"]').val(data.jumlah);
                }
            });
        });

        $(document).on('click', '[data-bs-target="#editKilometerModal"]', function() {
            let id = $(this).data('id');
            $('#editKilometer').attr('action', '/kilometer-kendaraan/edit/' + id);
            $.ajax({
                type: 'get',
                url: '/kilometer-kendaraan/detail/' + id,
                success: function(data) {
                    $('[data-value="jumlah"]').val(data.jumlah);
                }
            });
        });

        $(document).on('click', '[data-bs-target="#hapusKilometerModal"]', function() {
            let id = $(this).data('id');
            $('#hapusKilometer').attr('action', '/kilometer-kendaraan/hapus/' + id);
        });
    </script>
@endsection
