@extends('template.main')

@section('content')
    <div class="content">
        @if (auth()->user()->role === 'owner' || auth()->user()->role === 'admin')
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-success alert-dashboard mb-4" role="alert">
                        <a href="{{ route('pengembalian') }}" class="link-alert d-inline-block">Lihat Kendaraan Disewa</a>
                    </div>
                </div>
            </div>
        @endif
        <div class="row mb-4">
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="card-default d-flex align-items-start justify-content-between">
                    <div class="card-caption">
                        <p class="caption-name">Kendaraan Terdaftar</p>
                        <h4 class="caption-value">{{ $kendaraan->count() }}</h4>
                    </div>
                    <div class="wrapper-icon d-flex justify-content-center align-items-center">
                        <img src="{{ asset('assets/img/dashboard/stok.svg') }}" class="img-fluid dashboard-img"
                            alt="Stok Kendaraan Icon" width="18">
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="card-default d-flex align-items-start justify-content-between">
                    <div class="card-caption">
                        <p class="caption-name">Pelanggan Terdaftar</p>
                        <h4 class="caption-value">{{ $pelanggan->count() }}</h4>
                    </div>
                    <div class="wrapper-icon d-flex justify-content-center align-items-center">
                        <img src="{{ asset('assets/img/dashboard/pelanggan.svg') }}" class="img-fluid dashboard-img"
                            alt="Pelanggan Icon" width="18">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-default d-flex align-items-start justify-content-between">
                    <div class="card-caption">
                        <p class="caption-name">Sopir Terdaftar</p>
                        <h4 class="caption-value">{{ $sopir->count() }}</h4>
                    </div>
                    <div class="wrapper-icon d-flex justify-content-center align-items-center">
                        <img src="{{ asset('assets/img/dashboard/pelanggan.svg') }}" class="img-fluid dashboard-img"
                            alt="Sopir Icon" width="18">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 d-flex flex-column flex-md-row flex-lg-column mb-4 mb-lg-0">
                <div
                    class="card-default card-other w-100 d-flex flex-column align-items-start justify-content-between mb-4 mb-4 me-md-4 me-lg-0">
                    <div class="wrapper d-flex justify-content-between w-100">
                        <div class="wrapper-icon d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/img/dashboard/kendaraan.svg') }}" class="img-fluid dashboard-img"
                                alt="Kendaraan Icon" width="18">
                        </div>
                        @if (auth()->user()->role === 'owner' || auth()->user()->role === 'admin')
                            <a href="{{ route('pemesanan') }}" class="link-dashboard">Lihat Kendaraan</a>
                        @endif
                    </div>
                    <div class="card-caption">
                        <p class="caption-name">Kendaraan Dibooking</p>
                        <h4 class="caption-value">{{ $kendaraanBooking->count() }} <span>Kendaraan</span></h4>
                    </div>
                </div>
                <div
                    class="card-default card-other w-100 d-flex flex-column align-items-start justify-content-between mb-4 mb-4 me-md-4 me-lg-0">
                    <div class="wrapper d-flex justify-content-between w-100">
                        <div class="wrapper-icon d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/img/dashboard/kendaraan.svg') }}" class="img-fluid dashboard-img"
                                alt="Kendaraan Icon" width="18">
                        </div>
                        @if (auth()->user()->role === 'owner' || auth()->user()->role === 'admin')
                            <a href="{{ route('pengembalian') }}" class="link-dashboard">Lihat Kendaraan</a>
                        @endif
                    </div>
                    <div class="card-caption">
                        <p class="caption-name">Kendaraan Dipesan</p>
                        <h4 class="caption-value">{{ $kendaraanPesan->count() }} <span>Kendaraan</span></h4>
                    </div>
                </div>
                <div class="card-default card-other w-100 d-flex flex-column align-items-start justify-content-between">
                    <div class="wrapper d-flex justify-content-between w-100">
                        <div class="wrapper-icon d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/img/dashboard/servis.svg') }}" class="img-fluid dashboard-img"
                                alt="Servis Icon" width="18">
                        </div>
                        @if (auth()->user()->role === 'owner' || auth()->user()->role === 'admin')
                            <a href="{{ route('servis') }}" class="link-dashboard">Lihat Kendaraan</a>
                        @endif
                    </div>
                    <div class="card-caption">
                        <p class="caption-name">Kendaraan Diservis</p>
                        <h4 class="caption-value">{{ $kendaraanServis->count() }} <span>Kendaraan</span></h4>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg">
                <div class="card-default" style="padding: 26px !important;">
                    <div class="header-card d-flex justify-content-between align-items-center">
                        <h6 class="subtitle">Grafik Penyewaan Kendaraan</h6>
                        <div class="wrapper position-relative d-none d-md-inline-block">
                            <button type="button"
                                class="button-other button-reverse button-small d-flex align-items-center">
                                <p>Tahun ini</p>
                                <img src="{{ asset('assets/img/button/arrow-down.svg') }}" alt="Arrow Icon"
                                    class="img-fluid button-icon">
                            </button>
                            <div class="modal-other d-flex flex-column">
                                <button type="button" class="button-tahun modal-link active">Tahun
                                    Ini</button>
                                <button type="button" class="button-bulan modal-link">Bulan
                                    Ini</button>
                            </div>
                        </div>
                    </div>
                    <canvas id="chartVehicleYear" class="chart w-100" style="max-height: 400px;"></canvas>
                    <canvas id="chartVehicleMonth" class="chart w-100 disabled" style="max-height: 400px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <p id="labelJan" class="d-none">{{ $kendaraanPerBulan[1] }}</p>
    <p id="labelFeb" class="d-none">{{ $kendaraanPerBulan[2] }}</p>
    <p id="labelMar" class="d-none">{{ $kendaraanPerBulan[3] }}</p>
    <p id="labelApr" class="d-none">{{ $kendaraanPerBulan[4] }}</p>
    <p id="labelMei" class="d-none">{{ $kendaraanPerBulan[5] }}</p>
    <p id="labelJun" class="d-none">{{ $kendaraanPerBulan[6] }}</p>
    <p id="labelJul" class="d-none">{{ $kendaraanPerBulan[7] }}</p>
    <p id="labelAgu" class="d-none">{{ $kendaraanPerBulan[8] }}</p>
    <p id="labelSep" class="d-none">{{ $kendaraanPerBulan[9] }}</p>
    <p id="labelOkt" class="d-none">{{ $kendaraanPerBulan[10] }}</p>
    <p id="labelNov" class="d-none">{{ $kendaraanPerBulan[11] }}</p>
    <p id="labelDes" class="d-none">{{ $kendaraanPerBulan[12] }}</p>

    <p id="labelMingguPertama" class="d-none">{{ $kendaraanPerMinggu[0] }}</p>
    <p id="labelMingguKedua" class="d-none">{{ $kendaraanPerMinggu[1] }}</p>
    <p id="labelMingguKetiga" class="d-none">{{ $kendaraanPerMinggu[2] }}</p>
    <p id="labelMingguKeempat" class="d-none">{{ $kendaraanPerMinggu[3] }}</p>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const labelJan = document.getElementById('labelJan').textContent;
        const labelFeb = document.getElementById('labelFeb').textContent;
        const labelMar = document.getElementById('labelMar').textContent;
        const labelApr = document.getElementById('labelApr').textContent;
        const labelMei = document.getElementById('labelMei').textContent;
        const labelJun = document.getElementById('labelJun').textContent;
        const labelJul = document.getElementById('labelJul').textContent;
        const labelAgu = document.getElementById('labelAgu').textContent;
        const labelSep = document.getElementById('labelSep').textContent;
        const labelOkt = document.getElementById('labelOkt').textContent;
        const labelNov = document.getElementById('labelNov').textContent;
        const labelDes = document.getElementById('labelDes').textContent;

        const labelMingguPertama = document.getElementById('labelMingguPertama').textContent;
        const labelMingguKedua = document.getElementById('labelMingguKedua').textContent;
        const labelMingguKetiga = document.getElementById('labelMingguKetiga').textContent;
        const labelMingguKeempat = document.getElementById('labelMingguKeempat').textContent;

        const buttonOther = document.querySelector('.button-other');
        const modalOther = document.querySelector('.modal-other');
        const buttonYear = document.querySelector('.button-tahun');
        const buttonMonth = document.querySelector('.button-bulan');
        const ctxYear = document.getElementById('chartVehicleYear');
        const ctxMonth = document.getElementById('chartVehicleMonth');

        buttonOther.addEventListener('click', function() {
            modalOther.classList.toggle('active');
        });

        buttonMonth.addEventListener('click', function() {
            buttonOther.children[0].innerHTML = this.innerHTML;
            buttonYear.classList.remove('active');
            ctxYear.classList.add('disabled');
            buttonMonth.classList.add('active');
            ctxMonth.classList.remove('disabled');
        });

        buttonYear.addEventListener('click', function() {
            buttonOther.children[0].innerHTML = this.innerHTML;
            buttonMonth.classList.remove('active');
            ctxMonth.classList.add('disabled');
            buttonYear.classList.add('active');
            ctxYear.classList.remove('disabled');
        });

        Chart.defaults.color = '#939393';
        Chart.defaults.font.size = 12;
        Chart.defaults.font.weight = 600;

        new Chart(ctxYear, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    data: [labelJan, labelFeb, labelMar, labelApr, labelMei, labelJun, labelJul, labelAgu,
                        labelSep, labelOkt, labelNov, labelDes
                    ],
                    borderWidth: 0,
                    backgroundColor: [
                        'rgba(226, 92, 39)',
                        'rgba(255, 122, 69)',
                        'rgba(226, 92, 39)',
                        'rgba(255, 122, 69)',
                        'rgba(226, 92, 39)',
                        'rgba(255, 122, 69)',
                        'rgba(226, 92, 39)',
                        'rgba(255, 122, 69)',
                        'rgba(226, 92, 39)',
                        'rgba(255, 122, 69)',
                        'rgba(226, 92, 39)',
                        'rgba(255, 122, 69)',
                    ],
                    showLine: false,
                    borderRadius: 9999,
                    borderSkipped: false,
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                scales: {
                    x: {
                        grid: {
                            display: false,
                        },
                    },
                    y: {
                        beginAtZero: true,
                        min: 0,
                        max: 200,
                        ticks: {
                            stepSize: 50,
                        },
                    },
                },
                animation: false,
                showLine: false,
            }
        });

        new Chart(ctxMonth, {
            type: 'bar',
            data: {
                labels: ['Minggu Pertama', 'Minggu Kedua', 'Minggu Ketiga', 'Minggu Keempat'],
                datasets: [{
                    data: [labelMingguPertama, labelMingguKedua, labelMingguKetiga, labelMingguKeempat],
                    borderWidth: 0,
                    backgroundColor: [
                        'rgba(226, 92, 39)',
                        'rgba(255, 122, 69)',
                        'rgba(226, 92, 39)',
                        'rgba(255, 122, 69)',
                    ],
                    showLine: false,
                    borderRadius: 9999,
                    borderSkipped: false,
                    barPercentage: 0.4,
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                scales: {
                    x: {
                        grid: {
                            display: false,
                        },
                    },
                    y: {
                        beginAtZero: true,
                        min: 0,
                        max: 200,
                        ticks: {
                            stepSize: 50,
                        },
                    },
                },
                animation: false,
                showLine: false,
            }
        });
    </script>
@endsection
