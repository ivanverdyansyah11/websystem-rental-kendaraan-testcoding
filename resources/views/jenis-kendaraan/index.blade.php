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
                <form class="form-search d-inline-block" method="POST" action="{{ route('jenisKendaraan.search') }}">
                    @csrf
                    <div class="wrapper-search">
                        <input type="text" class="input-search" placeholder=" " name="search">
                        <label class="d-flex align-items-center">
                            <img src="{{ asset('assets/img/button/search.svg') }}" alt="Searcing Icon"
                                class="img-fluid search-icon">
                            <p>Cari jenis..</p>
                        </label>
                    </div>
                </form>
                <button type="button" class="button-primary d-none d-md-flex align-items-center" data-bs-toggle="modal"
                    data-bs-target="#tambahJenisModal">
                    <img src="{{ asset('assets/img/button/add.svg') }}" alt="Tambah Icon" class="img-fluid button-icon">
                    Tambah
                </button>
            </div>
        </div>
        <div class="row table-default">
            <div class="col-12 table-row table-header">
                <div class="row table-data gap-4">
                    <div class="col data-header">Nama Jenis Kendaraan</div>
                    <div class="col-3 col-xl-2 data-header"></div>
                </div>
            </div>
            @if ($jenises->count() == 0)
                <div class="col-12 table-row table-border">
                    <div class="row table-data gap-4 align-items-center">
                        <div class="col data-value data-length">Tidak Ada Data Jenis Kendaraan!</div>
                    </div>
                </div>
            @else
                @foreach ($jenises as $jenis)
                    <div class="col-12 table-row table-border">
                        <div class="row table-data gap-4 align-items-center">
                            <div class="col data-value data-length">{{ $jenis->nama }}</div>
                            <div class="col-3 col-xl-2 data-value d-flex justify-content-end">
                                <div class="wrapper-action d-flex">
                                    <button type="button"
                                        class="button-action button-detail d-flex justify-content-center align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#detailJenisModal"
                                        data-id="{{ $jenis->id }}">
                                        <div class="detail-icon"></div>
                                    </button>
                                    <button type="button"
                                        class="button-action button-edit d-none d-md-flex justify-content-center align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#editJenisModal"
                                        data-id="{{ $jenis->id }}">
                                        <div class="edit-icon"></div>
                                    </button>
                                    <button type="button"
                                        class="button-action button-delete d-none d-md-flex justify-content-center align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#hapusJenisModal"
                                        data-id="{{ $jenis->id }}">
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
            {{ $jenises->links() }}
        </div>
    </div>

    {{-- MODAL TAMBAH JENIS KENDARAAN --}}
    <div class="modal fade" id="tambahJenisModal" tabindex="-1" aria-labelledby="tambahJenisModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Tambah Jenis Kendaraan Baru</h3>
                <form class="form d-inline-block w-100" method="POST" action="{{ route('jenisKendaraan.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="input-group">
                                <p>Nama Jenis Kendaraan</p>
                                <input type="text" id="nama" autocomplete="off" value="{{ old('nama') }}" name="nama" placeholder="Masukkan nama jenis kendaraan" required>
                                @error('nama')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-wrapper d-flex">
                                <button type="submit" class="button-primary">Tambah Jenis</button>
                                <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal
                                    Tambah</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL TAMBAH JENIS KENDARAAN --}}

    {{-- MODAL DETAIL JENIS KENDARAAN --}}
    <div class="modal fade" id="detailJenisModal" tabindex="-1" aria-labelledby="detailJenisModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Detail Jenis Kendaraan</h3>
                <form class="form d-inline-block w-100">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="input-group">
                                <p>Nama Jenis Kendaraan</p>
                                <input type="text" id="nama" class="input" autocomplete="off" disabled
                                    data-value="nama">
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
    {{-- END MODAL DETAIL JENIS KENDARAAN --}}

    {{-- MODAL EDIT JENIS KENDARAAN --}}
    <div class="modal fade" id="editJenisModal" tabindex="-1" aria-labelledby="editJenisModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Edit Jenis Kendaraan</h3>
                <form id="editJenis" class="form d-inline-block w-100" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="input-group">
                                <p>Nama Jenis Kendaraan</p>
                                <input type="text" id="nama" class="input" required autocomplete="off"
                                    data-value="nama" name="nama">
                                @error('nama')
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
    {{-- END MODAL EDIT JENIS KENDARAAN --}}

    {{-- MODAL HAPUS JENIS KENDARAAN --}}
    <div class="modal modal-delete fade" id="hapusJenisModal" tabindex="-1" aria-labelledby="hapusJenisModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Hapus Jenis Kendaraan</h3>
                <form id="hapusJenis" class="form d-inline-block w-100" method="POST">
                    @csrf
                    <p class="caption-description row-button">Konfirmasi Penghapusan Jenis Kendaraan: Apakah Anda yakin
                        ingin
                        menghapus jenis kendaraan ini?
                        Tindakan ini tidak dapat diurungkan, dan jenis kendaraan akan dihapus secara permanen dari sistem.
                    </p>
                    <div class="button-wrapper d-flex">
                        <button type="submit" class="button-primary">Hapus Jenis Kendaraan</button>
                        <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL HAPUS JENIS KENDARAAN --}}

    <script>
        $(document).on('click', '[data-bs-target="#detailJenisModal"]', function() {
            let id = $(this).data('id');
            $.ajax({
                type: 'get',
                url: '/jenis-kendaraan/detail/' + id,
                success: function(data) {
                    $('[data-value="nama"]').val(data.nama);
                }
            });
        });

        $(document).on('click', '[data-bs-target="#editJenisModal"]', function() {
            let id = $(this).data('id');
            $('#editJenis').attr('action', '/jenis-kendaraan/edit/' + id);
            $.ajax({
                type: 'get',
                url: '/jenis-kendaraan/detail/' + id,
                success: function(data) {
                    $('[data-value="nama"]').val(data.nama);
                }
            });
        });

        $(document).on('click', '[data-bs-target="#hapusJenisModal"]', function() {
            let id = $(this).data('id');
            $('#hapusJenis').attr('action', '/jenis-kendaraan/hapus/' + id);
        });
    </script>
@endsection
