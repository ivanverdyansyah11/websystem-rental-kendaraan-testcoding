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
                <form class="form-search d-inline-block" method="POST" action="{{ route('brandKendaraan.search') }}">
                    @csrf
                    <div class="wrapper-search">
                        <input type="text" class="input-search" placeholder=" " name="search">
                        <label class="d-flex align-items-center">
                            <img src="{{ asset('assets/img/button/search.svg') }}" alt="Searcing Icon"
                                class="img-fluid search-icon">
                            <p>Cari brand..</p>
                        </label>
                    </div>
                </form>
                <button type="button" class="button-primary d-none d-md-flex align-items-center" data-bs-toggle="modal"
                    data-bs-target="#tambahBrandModal">
                    <img src="{{ asset('assets/img/button/add.svg') }}" alt="Tambah Icon" class="img-fluid button-icon">
                    Tambah
                </button>
            </div>
        </div>
        <div class="row table-default">
            <div class="col-12 table-row table-header">
                <div class="row table-data gap-4">
                    <div class="col data-header">Nama Brand Kendaraan</div>
                    <div class="col-3 col-xl-2 data-header"></div>
                </div>
            </div>
            @if ($brands->count() == 0)
                <div class="col-12 table-row table-border">
                    <div class="row table-data gap-4 align-items-center">
                        <div class="col data-value data-length">Tidak Ada Data Brand Kendaraan!</div>
                    </div>
                </div>
            @else
                @foreach ($brands as $brand)
                    <div class="col-12 table-row table-border">
                        <div class="row table-data gap-4 align-items-center">
                            <div class="col data-value data-length">{{ $brand->nama }}</div>
                            <div class="col-3 col-xl-2 data-value d-flex justify-content-end">
                                <div class="wrapper-action d-flex">
                                    <button type="button"
                                        class="button-action button-detail d-flex justify-content-center align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#detailBrandModal"
                                        data-id="{{ $brand->id }}">
                                        <div class="detail-icon"></div>
                                    </button>
                                    <button type="button"
                                        class="button-action button-edit d-none d-md-flex justify-content-center align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#editBrandModal"
                                        data-id="{{ $brand->id }}">
                                        <div class="edit-icon"></div>
                                    </button>
                                    <button type="button"
                                        class="button-action button-delete d-none d-md-flex justify-content-center align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#hapusBrandModal"
                                        data-id="{{ $brand->id }}">
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
            {{ $brands->links() }}
        </div>
    </div>

    {{-- MODAL TAMBAH BRAND KENDARAAN --}}
    <div class="modal fade" id="tambahBrandModal" tabindex="-1" aria-labelledby="tambahBrandModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Tambah Brand Kendaraan Baru</h3>
                <form class="form d-inline-block w-100" method="POST" action="{{ route('brandKendaraan.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="input-group">
                                <p>Nama Brand Kendaraan</p>
                                <input type="text" id="nama" autocomplete="off" value="{{ old('nama') }}" name="nama" placeholder="Masukkan nama brand kendaraan" required>
                                @error('nama')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-wrapper d-flex">
                                <button type="submit" class="button-primary">Tambah Brand</button>
                                <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal
                                    Tambah</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL TAMBAH BRAND KENDARAAN --}}

    {{-- MODAL DETAIL BRAND KENDARAAN --}}
    <div class="modal fade" id="detailBrandModal" tabindex="-1" aria-labelledby="detailBrandModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Detail Brand Kendaraan</h3>
                <form class="form d-inline-block w-100">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="input-group">
                                <p for="nama">Nama Brand Kendaraan</p>
                                <input type="text" id="nama" class="input" autocomplete="off"
                                    data-value="nama" disabled>
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
    {{-- END MODAL DETAIL BRAND KENDARAAN --}}

    {{-- MODAL EDIT BRAND KENDARAAN --}}
    <div class="modal fade" id="editBrandModal" tabindex="-1" aria-labelledby="editBrandModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Edit Brand Kendaraan</h3>
                <form id="editBrand" class="form d-inline-block w-100" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="input-group">
                                <p for="nama">Nama Brand Kendaraan</p>
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
    {{-- END MODAL EDIT BRAND KENDARAAN --}}

    {{-- MODAL HAPUS BRAND KENDARAAN --}}
    <div class="modal modal-delete fade" id="hapusBrandModal" tabindex="-1" aria-labelledby="hapusBrandModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Hapus Brand Kendaraan</h3>
                <form id="hapusBrand" class="form d-inline-block w-100" method="POST">
                    @csrf
                    <p class="caption-description row-button">Konfirmasi Penghapusan Brand Kendaraan: Apakah Anda yakin
                        ingin
                        menghapus brand kendaraan ini?
                        Tindakan ini tidak dapat diurungkan, dan brand kendaraan akan dihapus secara permanen dari sistem.
                    </p>
                    <div class="button-wrapper d-flex">
                        <button type="submit" class="button-primary">Hapus Brand Kendaraan</button>
                        <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL HAPUS BRAND KENDARAAN --}}

    <script>
        $(document).on('click', '[data-bs-target="#detailBrandModal"]', function() {
            let id = $(this).data('id');
            $.ajax({
                type: 'get',
                url: '/brand-kendaraan/detail/' + id,
                success: function(data) {
                    $('[data-value="nama"]').val(data.nama);
                }
            });
        });

        $(document).on('click', '[data-bs-target="#editBrandModal"]', function() {
            let id = $(this).data('id');
            $('#editBrand').attr('action', '/brand-kendaraan/edit/' + id);
            $.ajax({
                type: 'get',
                url: '/brand-kendaraan/detail/' + id,
                success: function(data) {
                    $('[data-value="nama"]').val(data.nama);
                }
            });
        });

        $(document).on('click', '[data-bs-target="#hapusBrandModal"]', function() {
            let id = $(this).data('id');
            $('#hapusBrand').attr('action', '/brand-kendaraan/hapus/' + id);
        });
    </script>
@endsection
