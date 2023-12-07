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
                <form class="form-search d-inline-block" method="POST" action="{{ route('sopir.search') }}">
                    @csrf
                    <div class="wrapper-search">
                        <input type="text" class="input-search" placeholder=" " name="search">
                        <label class="d-flex align-items-center">
                            <img src="{{ asset('assets/img/button/search.svg') }}" alt="Searcing Icon"
                                class="img-fluid search-icon">
                            <p>Cari sopir..</p>
                        </label>
                    </div>
                </form>
                <a href="{{ route('sopir.create') }}" class="button-primary d-none d-md-flex align-items-center">
                    <img src="{{ asset('assets/img/button/add.svg') }}" alt="Button Tambah Icon"
                        class="img-fluid button-icon">
                    Tambah
                </a>
            </div>
        </div>
        <div class="row table-default">
            <div class="col-12 table-row table-header">
                <div class="row table-data gap-4">
                    <div class="col data-header">Nama</div>
                    <div class="col d-none d-lg-inline-block data-header">Nomor Telepon</div>
                    <div class="col d-none d-lg-inline-block data-header">Alamat</div>
                    <div class="col d-none d-lg-inline-block data-header">Kelengkapan</div>
                    <div class="col-3 col-xl-2 data-header"></div>
                </div>
            </div>
            @if ($sopirs->count() == 0)
                <div class="col-12 table-row table-border">
                    <div class="row table-data gap-4 align-items-center">
                        <div class="col data-value data-length">Tidak Ada Data Sopir!</div>
                    </div>
                </div>
            @else
                @foreach ($sopirs as $sopir)
                    <div class="col-12 table-row table-border">
                        <div class="row table-data gap-4 align-items-center">
                            <div class="col data-value data-length">{{ $sopir->nama }}</div>
                            <div class="col data-value data-length data-length-none">{{ $sopir->nomor_telepon ?: '-' }}
                            </div>
                            <div class="col data-value data-length data-length-none">{{ $sopir->alamat }}</div>
                            @if (
                                $sopir->kelengkapan_ktp == 'lengkap' &&
                                    $sopir->data_ktp == 'benar' &&
                                    $sopir->data_sim == 'benar' &&
                                    $sopir->data_nomor_telepon == 'benar' &&
                                    $sopir->kelengkapan_sim == 'lengkap' &&
                                    $sopir->kelengkapan_nomor_telepon == 'lengkap')
                                <div class="col data-value data-length data-length-none status-true">Lengkap</div>
                            @else
                                <div class="col data-value data-length data-length-none status-false">Belum Lengkap</div>
                            @endif
                            <div class="col-3 col-xl-2 data-value d-flex justify-content-end">
                                <div class="wrapper-action d-flex">
                                    <a href="{{ route('sopir.detail', $sopir->id) }}"
                                        class="button-action button-detail d-flex justify-content-center align-items-center">
                                        <div class="detail-icon"></div>
                                    </a>
                                    <a href="{{ route('sopir.edit', $sopir->id) }}"
                                        class="button-action button-edit d-none d-md-flex justify-content-center align-items-center">
                                        <div class="edit-icon"></div>
                                    </a>
                                    <button type="button"
                                        class="button-action button-delete d-none d-md-flex justify-content-center align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#hapusSopirModal"
                                        data-id="{{ $sopir->id }}">
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
            {{ $sopirs->links() }}
        </div>
    </div>

    {{-- MODAL HAPUS SOPIR --}}
    <div class="modal modal-delete fade" id="hapusSopirModal" tabindex="-1" aria-labelledby="hapusSopirModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Hapus Sopir</h3>
                <form id="hapusSopir" class="form d-inline-block w-100" method="POST">
                    @csrf
                    <p class="caption-description row-button">Konfirmasi Penghapusan Sopir: Apakah Anda yakin ingin
                        menghapus sopir ini?
                        Tindakan ini tidak dapat diurungkan, dan sopir akan dihapus secara permanen dari sistem.
                    </p>
                    <div class="button-wrapper d-flex">
                        <button type="submit" class="button-primary">Hapus Sopir</button>
                        <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL HAPUS SOPIR --}}

    <script>
        $(document).on('click', '[data-bs-target="#hapusSopirModal"]', function() {
            let id = $(this).data('id');
            $('#hapusSopir').attr('action', '/sopir/hapus/' + id);
        });
    </script>
@endsection
