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
                <form class="form-search d-inline-block" method="POST" action="{{ route('pengguna.search') }}">
                    @csrf
                    <div class="wrapper-search">
                        <input type="text" class="input-search" placeholder=" " name="search">
                        <label class="d-flex align-items-center">
                            <img src="{{ asset('assets/img/button/search.svg') }}" alt="Searcing Icon"
                                class="img-fluid search-icon">
                            <p>Cari pengguna..</p>
                        </label>
                    </div>
                </form>
                @if (auth()->user()->role == 'admin')
                    <button type="button" class="button-primary d-none d-md-flex align-items-center" data-bs-toggle="modal"
                        data-bs-target="#tambahPenggunaModal">
                        <img src="{{ asset('assets/img/button/add.svg') }}" alt="Button Tambah Icon"
                            class="img-fluid button-icon">
                        Tambah
                    </button>
                @endif
            </div>
        </div>
        <div class="row table-default">
            <div class="col-12 table-row table-header">
                <div class="row table-data gap-4">
                    <div class="col data-header">Nama Lengkap</div>
                    <div class="col d-none d-lg-inline-block data-header">Email</div>
                    <div class="col d-none d-lg-inline-block data-header">Role</div>
                    @if (auth()->user()->role == 'admin')
                        <div class="col-3 col-xl-2 data-header"></div>
                    @endif
                </div>
            </div>
            @if ($penggunas->count() == 0)
                <div class="col-12 table-row table-border">
                    <div class="row table-data gap-4 align-items-center">
                        <div class="col data-value data-length"></div>
                    </div>
                </div>
            @else
                @foreach ($penggunas as $pengguna)
                    <div class="col-12 table-row table-border">
                        <div class="row table-data gap-4 align-items-center">
                            <div class="col data-value data-length">{{ $pengguna->nama_lengkap }}</div>
                            <div class="col data-value data-length data-length-none">{{ $pengguna->email }}</div>
                            <div class="col data-value data-length data-length-none text-capitalize">
                                {{ $pengguna->role }}</div>
                            @if (auth()->user()->role == 'admin')
                                <div class="col-3 col-xl-2 data-value d-flex justify-content-end">
                                    <div class="wrapper-action d-flex">
                                        <button type="button"
                                            class="button-action button-detail d-flex justify-content-center align-items-center"
                                            data-bs-toggle="modal" data-bs-target="#detailPenggunaModal"
                                            data-id="{{ $pengguna->id }}">
                                            <div class="detail-icon"></div>
                                        </button>
                                        <button type="button"
                                            class="button-action button-edit d-none d-md-flex justify-content-center align-items-center"
                                            data-bs-toggle="modal" data-bs-target="#editPenggunaModal"
                                            data-id="{{ $pengguna->id }}">
                                            <div class="edit-icon"></div>
                                        </button>
                                        <button type="button"
                                            class="button-action button-delete d-none d-md-flex justify-content-center align-items-center"
                                            data-bs-toggle="modal" data-bs-target="#hapusPenggunaModal"
                                            data-id="{{ $pengguna->id }}">
                                            <div class="delete-icon"></div>
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-end mt-4">
                {{ $penggunas->links() }}
            </div>
        </div>
    </div>

    {{-- MODAL TAMBAH PENGGUNA --}}
    <div class="modal fade" id="tambahPenggunaModal" tabindex="-1" aria-labelledby="tambahPenggunaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Tambah Pengguna Baru</h3>
                <form class="form d-inline-block w-100" method="POST" action="{{ route('pengguna.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" id="nama" name="nama_lengkap" class="input" required
                                    autocomplete="off" value="{{ old('nama_lengkap') }}">
                                @error('nama_lengkap')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="input" required
                                    autocomplete="off" value="{{ old('email') }}">
                                @error('email')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="input" required
                                    autocomplete="off" value="{{ old('password') }}">
                                @error('password')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-wrapper d-flex">
                                <button type="submit" class="button-primary">Tambah Pengguna</button>
                                <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal
                                    Tambah</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL TAMBAH PENGGUNA --}}

    {{-- MODAL DETAIL PENGGUNA --}}
    <div class="modal fade" id="detailPenggunaModal" tabindex="-1" aria-labelledby="detailPenggunaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Detail Pengguna</h3>
                <form class="form d-inline-block w-100">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" id="nama" class="input" disabled data-value="nama_lengkap">
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="input" disabled data-value="email">
                            </div>
                        </div>
                        <div class="col-12 row-button">
                            <div class="input-wrapper">
                                <label for="role">Role</label>
                                <input type="text" id="role" class="input" disabled data-value="role">
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
    {{-- END MODAL DETAIL PENGGUNA --}}

    {{-- MODAL EDIT PENGGUNA --}}
    <div class="modal fade" id="editPenggunaModal" tabindex="-1" aria-labelledby="editPenggunaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Edit Pengguna</h3>
                <form class="form d-inline-block w-100" id="editPengguna" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" id="nama" class="input" required autocomplete="off"
                                    data-value="nama_lengkap" name="nama_lengkap">
                                @error('nama_lengkap')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="input" required autocomplete="off"
                                    data-value="email" name="email">
                                @error('email')
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
    {{-- END MODAL EDIT PENGGUNA --}}

    {{-- MODAL HAPUS PENGGUNA --}}
    <div class="modal modal-delete fade" id="hapusPenggunaModal" tabindex="-1"
        aria-labelledby="hapusPenggunaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Hapus Pengguna</h3>
                <form class="form d-inline-block w-100" method="POST" id="hapusPengguna">
                    @csrf
                    <p class="caption-description row-button">Konfirmasi Penghapusan Pengguna: Apakah Anda yakin ingin
                        menghapus pengguna ini?
                        Tindakan ini tidak dapat diurungkan, dan pengguna akan dihapus secara permanen dari sistem.
                    </p>
                    <div class="button-wrapper d-flex">
                        <button type="submit" class="button-primary">Hapus Pengguna</button>
                        <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL HAPUS PENGGUNA --}}

    <script>
        $(document).on('click', '[data-bs-target="#detailPenggunaModal"]', function() {
            let id = $(this).data('id');
            $.ajax({
                type: 'get',
                url: '/pengguna/detail/' + id,
                success: function(data) {
                    $('[data-value="nama_lengkap"]').val(data.nama_lengkap);
                    $('[data-value="email"]').val(data.email);
                    $('[data-value="role"]').val(data.role);
                }
            });
        });

        $(document).on('click', '[data-bs-target="#editPenggunaModal"]', function() {
            let id = $(this).data('id');
            $('[data-value="role"] option').remove();
            $('#editPengguna').attr('action', '/pengguna/edit/' + id);
            $.ajax({
                type: 'get',
                url: '/pengguna/detail/' + id,
                success: function(data) {
                    $('[data-value="nama_lengkap"]').val(data.nama_lengkap);
                    $('[data-value="email"]').val(data.email);
                }
            });
        });

        $(document).on('click', '[data-bs-target="#hapusPenggunaModal"]', function() {
            let id = $(this).data('id');
            $('#hapusPengguna').attr('action', '/pengguna/hapus/' + id);
        });
    </script>
@endsection
