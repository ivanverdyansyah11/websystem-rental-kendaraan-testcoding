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
                <form class="form-search d-inline-block" method="POST" action="{{ route('servis.search') }}">
                    @csrf
                    <div class="wrapper-search">
                        <input type="text" class="input-search" placeholder=" " name="search">
                        <label class="d-flex align-items-center">
                            <img src="{{ asset('assets/img/button/search.svg') }}" alt="Searcing Icon"
                                class="img-fluid search-icon">
                            <p>Cari kendaraan..</p>
                        </label>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            @if ($kendaraans->count() == 0)
                <div class="col-12 text-center mt-5">
                    <p style="font-size: 0.913rem;">Tidak Ada Data Kendaraan Diservis!</p>
                </div>
            @else
                @foreach ($kendaraans as $kendaraan)
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card-product">
                            <div class="wrapper-img d-flex justify-content-center align-items-center">
                                <img src="{{ asset('assets/img/kendaraan-images/' . $kendaraan->foto_kendaraan) }}"
                                    alt="Car Thumbnail Image" class="img-fluid product-img">
                            </div>
                            <div class="product-content">
                                <div class="wrapper d-flex align-items-center justify-content-between">
                                    <p class="product-name">
                                        {{ $kendaraan->brand_kendaraan->nama . ', ' . $kendaraan->nomor_plat }}</p>
                                    <h6 class="product-price mb-0">Rp. {{ $kendaraan->tarif_sewa_hari }}</h6>
                                </div>
                                <div class="wrapper-other d-flex align-items-center justify-content-between mt-1">
                                    <div class="wrapper-tahun d-flex align-items-center">
                                        <img src="{{ asset('assets/img/button/kendaraan.svg') }}" alt="Kendaraan Icon"
                                            class="img-fluid kendaraan-icon">
                                        <p class="product-year">{{ $kendaraan->jenis_kendaraan->nama }}</p>
                                    </div>
                                    <h6 class="product-year mb-0">{{ $kendaraan->seri_kendaraan->nomor_seri }}</h6>
                                </div>
                                <div class="wrapper-button d-none d-md-flex">
                                    <a href="{{ route('servis.check', $kendaraan->id) }}"
                                        class="button-primary w-100">Servis
                                        Kendaraan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="col-12 d-flex justify-content-end mt-4">
            {{ $kendaraans->links() }}
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
