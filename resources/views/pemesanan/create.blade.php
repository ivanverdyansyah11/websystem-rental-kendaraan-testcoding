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
                <h5 class="subtitle">Booking Kendaraan</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form d-inline-block w-100" action="{{ route('booking.create.action') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="input-group">
                                <p for="waktu_sewa_hari">Total Harian</p>
                                <input type="number" id="waktu_sewa_hari" class="input" autocomplete="off"
                                    value="{{ old('total_harian') ?: '0' }}" name="total_harian" required>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="input-group">
                                <p for="waktu_sewa_minggu">Total Mingguan</p>
                                <input type="number" id="waktu_sewa_minggu" class="input" autocomplete="off"
                                    value="{{ old('total_mingguan') ?: '0' }}" name="total_mingguan" required>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="input-group">
                                <p for="waktu_sewa_bulan">Total Bulanan</p>
                                <input type="number" id="waktu_sewa_bulan" class="input" autocomplete="off"
                                    value="{{ old('total_bulanan') ?: '0' }}" name="total_bulanan" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="input-group">
                                <p for="tanggal_mulai">Tanggal Diambil</p>
                                <input type="date" id="tanggal_mulai" class="input" autocomplete="off"
                                    name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required>
                                @error('tanggal_mulai')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="input-group">
                                <p for="tanggal_akhir">Tanggal Kembali</p>
                                <input type="date" id="tanggal_akhir" class="input" autocomplete="off"
                                    name="tanggal_akhir" value="{{ old('tanggal_akhir') }}" required readonly>
                                @error('tanggal_akhir')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="input-group">
                                <p for="pelanggans_id">Pelanggan</p>
                                <select id="pelanggans_id" class="input" name="pelanggans_id" required>
                                    <option value="">Pilih tanggal diambil dahulu</option>
                                    {{-- @foreach ($pelanggans as $pelanggan)
                                        <option value="{{ $pelanggan->id }}"
                                            {{ old('pelanggans_id') == $pelanggan->id ? 'selected' : '' }}>
                                            {{ $pelanggan->nama }}</option>
                                    @endforeach --}}
                                </select>
                                @error('pelanggans_id')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="input-group">
                                <p for="sopirs_id">Sopir</p>
                                <select id="sopirs_id" class="input" name="sopirs_id">
                                    @if ($sopirs->count() == 0)
                                        <option value="">Tidak ada sopir ready</option>
                                    @else
                                        <option value="">Pilih tanggal diambil dahulu</option>
                                        {{-- @foreach ($sopirs as $sopir)
                                            <option value="{{ $sopir->id }}"
                                                {{ old('sopirs_id') == $sopir->id ? 'selected' : '' }}>
                                                {{ $sopir->nama }}</option>
                                        @endforeach --}}
                                    @endif
                                </select>
                                @error('sopirs_id')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="input-group">
                                <p for="jenis_kendaraan">Jenis Kendaraan</p>
                                <select id="jenis_kendaraan" class="input">
                                    <option value="0">Pilih tanggal diambil dahulu</option>
                                    {{-- @foreach ($jenises as $jenis)
                                        <option value="{{ $jenis->id }}">{{ $jenis->nama }}
                                        </option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="input-group">
                                <p for="brand_kendaraan">Brand Kendaraan</p>
                                <select id="brand_kendaraan" class="input">
                                    <option value="0">Pilih tanggal diambil dahulu</option>
                                    {{-- @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->nama }}
                                        </option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="input-group">
                                <p for="seri_kendaraans_id">Nomor Seri</p>
                                <select id="seri_kendaraans_id" class="input" name="seri_kendaraans_id"
                                    data-target="#seri_kendaraans_id">
                                    <option value="0">Pilih tanggal diambil dahulu</option>
                                    {{-- @foreach ($series as $seri)
                                        <option value="{{ $seri->id }}"
                                            {{ old('seri_kendaraans_id') == $seri->id ? 'selected' : '' }}>
                                            {{ $seri->nomor_seri }}</option>
                                    @endforeach --}}
                                </select>
                                @error('seri_kendaraans_id')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-group">
                                <p for="kendaraans_id">Kendaraan</p>
                                <select id="kendaraans_id" class="input" name="kendaraans_id" required>
                                    <option value="">Pilih tanggal diambil dahulu</option>
                                    {{-- @foreach ($kendaraans as $kendaraan)
                                        <option value="{{ $kendaraan->id }}">{{ $kendaraan->nomor_plat }}</option>
                                    @endforeach --}}
                                </select>
                                @error('kendaraans_id')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-wrapper d-flex">
                                <button type="submit" class="button-primary">Booking Kendaraan</button>
                                <a href="{{ route('pemesanan') }}" class="button-reverse">Batal
                                    Booking</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <script>
        $("#pelanggans_id").select2({
            theme: "bootstrap-5",
        });

        $("#sopirs_id").select2({
            theme: "bootstrap-5",
        });

        $("#jenis_kendaraan").select2({
            theme: "bootstrap-5",
        });

        $("#brand_kendaraan").select2({
            theme: "bootstrap-5",
        });

        $("#seri_kendaraans_id").select2({
            theme: "bootstrap-5",
        });

        $("#kendaraans_id").select2({
            theme: "bootstrap-5",
        });

        $("#jenis_kendaraan").change(function() {
            let idJenis = $(this).val();
            let idBrand = $("#brand_kendaraan").val();
            $('#seri_kendaraans_id option').remove();
            $.ajax({
                type: 'get',
                url: '/kendaraan/getSeriKendaraan/' + idJenis + '/' + idBrand,
                success: function(data) {
                    if (data.length == 0) {
                        $('#seri_kendaraans_id').append(
                            `<option value="0">Data nomor seri tidak ditemukan!</option>`
                        );
                    } else {
                        $('#seri_kendaraans_id').append(
                            `<option value="0">Pilih nomor seri!</option>`
                        );
                        data.forEach(nomorSeri => {
                            $('#seri_kendaraans_id').append(
                                `<option value="${nomorSeri.id}">${nomorSeri.nomor_seri}</option>`
                            );
                        });
                    }
                }
            });
        });

        $("#brand_kendaraan").change(function() {
            let idBrand = $(this).val();
            let idJenis = $("#jenis_kendaraan").val();
            $('#seri_kendaraans_id option').remove();
            $.ajax({
                type: 'get',
                url: '/kendaraan/getSeriKendaraan/' + idJenis + '/' + idBrand,
                success: function(data) {
                    if (data.length == 0) {
                        $('#seri_kendaraans_id').append(
                            `<option value="0">Data nomor seri tidak ditemukan!</option>`
                        );
                    } else {
                        $('#seri_kendaraans_id').append(
                            `<option value="0">Pilih nomor seri!</option>`
                        );
                        data.forEach(nomorSeri => {
                            $('#seri_kendaraans_id').append(
                                `<option value="${nomorSeri.id}">${nomorSeri.nomor_seri}</option>`
                            );
                        });
                    }
                }
            });
        });

        $("#seri_kendaraans_id").change(function() {
            let idSeri = $(this).val();
            let tanggal_mulai = $("#tanggal_mulai").val();
            let tanggal_akhir = $("#tanggal_akhir").val();
            $('#kendaraans_id option').remove();
            $.ajax({
                type: 'get',
                url: '/booking/check-seri/' + idSeri + '/' + tanggal_mulai + '/' + tanggal_akhir,
                success: function(data) {
                    if (data.length == 0) {
                        $('#kendaraans_id').append(
                            `<option value="">Data kendaraan tidak ditemukan!</option>`
                        );
                    } else {
                        $('#kendaraans_id').append(
                            `<option value="">Pilih kendaraan!</option>`
                        );
                        data.forEach(kendaraan => {
                            $('#kendaraans_id').append(
                                `<option value="${kendaraan.id}">${kendaraan.nomor_plat}</option>`
                            );
                        });
                    }
                }
            });
        });

        $("#pelanggans_id").change(function() {
            let pelanggans_id = $(this).val();
            let tanggal_mulai = $("#tanggal_mulai").val();
            let tanggal_akhir = $("#tanggal_akhir").val();
            $('#kendaraans_id option').remove();
            $('#seri_kendaraans_id option').remove();
            $('#jenis_kendaraan option').remove();
            $('#brand_kendaraan option').remove();

            $('#seri_kendaraans_id').append(
                `<option value="0">Pilih jenis & brand kendaraan dahulu!</option>`
            );

            $.ajax({
                type: 'get',
                url: '/booking/check-pelanggan/' + pelanggans_id + '/' + tanggal_mulai + '/' +
                    tanggal_akhir,
                success: function(data) {
                    if (data.length == 0) {
                        $('#kendaraans_id').append(
                            `<option value="">Data kendaraan tidak ditemukan!</option>`
                        );
                    } else {
                        $('#kendaraans_id').append(
                            `<option value="">Pilih kendaraan!</option>`
                        );
                        data.forEach(kendaraan => {
                            $('#kendaraans_id').append(
                                `<option value="${kendaraan.id}">${kendaraan.nomor_plat}</option>`
                            );
                        });
                    }
                }
            });

            $.ajax({
                type: 'get',
                url: '/booking/get-jenis',
                success: function(data) {
                    $('#jenis_kendaraan').append(
                        `<option value="0">Pilih jenis kendaraan!</option>`
                    );
                    data.forEach(jenis => {
                        $('#jenis_kendaraan').append(
                            `<option value="${jenis.id}">${jenis.nama}</option>`
                        );
                    });
                }
            });

            $.ajax({
                type: 'get',
                url: '/booking/get-brand',
                success: function(data) {
                    $('#brand_kendaraan').append(
                        `<option value="0">Pilih brand kendaraan!</option>`
                    );
                    data.forEach(brand => {
                        $('#brand_kendaraan').append(
                            `<option value="${brand.id}">${brand.nama}</option>`
                        );
                    });
                }
            });
        });

        const inputTanggalDiambil = document.querySelector('#tanggal_mulai');
        const inputTanggalKembali = document.querySelector('#tanggal_akhir');

        let waktuSewaHarian = document.querySelector('#waktu_sewa_hari');
        let waktuSewaMingguan = document.querySelector('#waktu_sewa_minggu');
        let waktuSewaBulanan = document.querySelector('#waktu_sewa_bulan');

        inputTanggalDiambil.addEventListener('change', function() {
            let jumlahHari;
            let jumlahBulan;
            let tanggalAkhir;
            let totalTarifSewa;

            let tanggalMulai = moment(inputTanggalDiambil.value);
            jumlahHari = parseInt(waktuSewaHarian.value) + parseInt(waktuSewaMingguan.value) * 7;
            jumlahBulan = parseInt(waktuSewaBulanan.value);
            tanggalAkhir = tanggalMulai.add(jumlahHari, 'days').add(jumlahBulan, 'months');

            let tahun = tanggalAkhir.format('YYYY');
            let bulan = tanggalAkhir.format('MM');
            let tanggal = tanggalAkhir.format('DD');

            inputTanggalKembali.value = `${tahun}-${bulan}-${tanggal}`;
            let tanggalMulaiSewa = moment(inputTanggalDiambil.value);
            let tanggalKembaliSewa = moment(inputTanggalKembali.value);
            let totalWaktuSewa = tanggalKembaliSewa.diff(tanggalMulaiSewa, 'days');
        });

        waktuSewaHarian.addEventListener('change', function() {
            let tanggalDiambilValue = document.querySelector('#tanggal_mulai').value;
            let jumlahHari;
            let jumlahBulan;
            let tanggalAkhir;

            if (waktuSewaHarian.value == '') {
                waktuSewaHarian.value = '0';
            }

            let tanggalMulai = moment(tanggalDiambilValue);
            if (waktuSewaMingguan.value && waktuSewaBulanan.value) {
                jumlahHari = parseInt(waktuSewaHarian.value) + parseInt(waktuSewaMingguan.value) * 7;
                jumlahBulan = parseInt(waktuSewaBulanan.value);
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days').add(jumlahBulan, 'months');

            } else if (waktuSewaMingguan.value) {
                jumlahHari = parseInt(waktuSewaHarian.value) + parseInt(waktuSewaMingguan.value) * 7;
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days');

            } else if (waktuSewaBulanan.value) {
                jumlahHari = parseInt(waktuSewaHarian.value);
                jumlahBulan = parseInt(waktuSewaBulanan.value);
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days').add(jumlahBulan, 'months');

            } else {
                jumlahHari = parseInt(waktuSewaHarian.value);
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days');
            }

            let tahun = tanggalAkhir.format('YYYY');
            let bulan = tanggalAkhir.format('MM');
            let tanggal = tanggalAkhir.format('DD');

            inputTanggalKembali.value = `${tahun}-${bulan}-${tanggal}`;

            let tanggalMulaiSewa = moment(tanggalDiambilValue);
            let tanggalKembaliSewa = moment(inputTanggalKembali.value);
            let totalWaktuSewa = tanggalKembaliSewa.diff(tanggalMulaiSewa, 'days');
        });

        waktuSewaMingguan.addEventListener('change', function() {
            let tanggalDiambilValue = document.querySelector('#tanggal_mulai').value;
            let jumlahHari;
            let jumlahBulan;
            let tanggalAkhir;

            if (waktuSewaMingguan.value == '') {
                waktuSewaMingguan.value = '0';
            }

            tanggalMulai = moment(tanggalDiambilValue);
            if (waktuSewaHarian.value && waktuSewaBulanan.value) {
                jumlahHari = parseInt(waktuSewaHarian.value) + parseInt(waktuSewaMingguan.value) * 7;
                jumlahBulan = parseInt(waktuSewaBulanan.value);
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days').add(jumlahBulan, 'months');

            } else if (waktuSewaHarian.value) {
                jumlahHari = parseInt(waktuSewaMingguan.value) * 7 + parseInt(waktuSewaHarian.value);
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days');

            } else if (waktuSewaBulanan.value) {
                jumlahHari = parseInt(waktuSewaMingguan.value) * 7;
                jumlahBulan = parseInt(waktuSewaBulanan.value);
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days').add(jumlahBulan, 'months');

            } else {
                jumlahHari = parseInt(waktuSewaMingguan.value) * 7;
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days');
            }

            let tahun = tanggalAkhir.format('YYYY');
            let bulan = tanggalAkhir.format('MM');
            let tanggal = tanggalAkhir.format('DD');

            inputTanggalKembali.value = `${tahun}-${bulan}-${tanggal}`;

            let tanggalMulaiSewa = moment(tanggalDiambilValue);
            let tanggalKembaliSewa = moment(inputTanggalKembali.value);
            let totalWaktuSewa = tanggalKembaliSewa.diff(tanggalMulaiSewa, 'days');
        });

        waktuSewaBulanan.addEventListener('change', function() {
            let tanggalDiambilValue = document.querySelector('#tanggal_mulai').value;
            let jumlahHari;
            let jumlahBulan;
            let tanggalAkhir;

            if (waktuSewaBulanan.value == '') {
                waktuSewaBulanan.value = '0';
            }

            tanggalMulai = moment(tanggalDiambilValue);
            if (waktuSewaHarian.value && waktuSewaMingguan.value) {
                jumlahHari = parseInt(waktuSewaMingguan.value) * 7 + parseInt(waktuSewaHarian.value);
                jumlahBulan = parseInt(waktuSewaBulanan.value);
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days').add(jumlahBulan, 'months');

            } else if (waktuSewaMingguan.value) {
                jumlahHari = parseInt(waktuSewaMingguan.value) * 7;
                jumlahBulan = parseInt(waktuSewaBulanan.value);
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days').add(jumlahBulan, 'months');

            } else if (waktuSewaHarian.value) {
                jumlahHari = parseInt(waktuSewaHarian.value);
                jumlahBulan = parseInt(waktuSewaBulanan.value);
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days').add(jumlahBulan, 'months');

            } else {
                jumlahBulan = parseInt(waktuSewaBulanan.value);
                tanggalAkhir = tanggalMulai.add(jumlahBulan, 'months');

            }

            let tahun = tanggalAkhir.format('YYYY');
            let bulan = tanggalAkhir.format('MM');
            let tanggal = tanggalAkhir.format('DD');

            inputTanggalKembali.value = `${tahun}-${bulan}-${tanggal}`;

            let tanggalMulaiSewa = moment(tanggalDiambilValue);
            let tanggalKembaliSewa = moment(inputTanggalKembali.value);
            let totalWaktuSewa = tanggalKembaliSewa.diff(tanggalMulaiSewa, 'days');
        });

        $("#tanggal_mulai").change(function() {
            let tanggal_mulai = $(this).val();
            let tanggal_akhir = $("#tanggal_akhir").val();
            $('#pelanggans_id option').remove();
            $('#sopirs_id option').remove();
            $('#kendaraans_id option').remove();
            $('#seri_kendaraans_id option').remove();
            $('#jenis_kendaraan option').remove();
            $('#brand_kendaraan option').remove();

            $('#seri_kendaraans_id').append(
                `<option value="0">Pilih jenis & brand kendaraan dahulu!</option>`
            );

            $('#jenis_kendaraan').append(
                `<option value="0">Pilih pelanggan dahulu!</option>`
            );

            $('#brand_kendaraan').append(
                `<option value="0">Pilih pelanggan dahulu!</option>`
            );

            $.ajax({
                type: 'get',
                url: '/booking/get-pelanggan',
                success: function(data) {
                    if (data.length == 0) {
                        $('#pelanggans_id').append(
                            `<option value="">Data pelanggan tidak ditemukan!</option>`
                        );
                    } else {
                        $('#pelanggans_id').append(
                            `<option value="">Pilih pelanggan!</option>`
                        );
                        data.forEach(pelanggan => {
                            $('#pelanggans_id').append(
                                `<option value="${pelanggan.id}">${pelanggan.nama}</option>`
                            );
                        });
                    }
                }
            });

            $.ajax({
                type: 'get',
                url: '/booking/check-kendaraan/' + tanggal_mulai + '/' + tanggal_akhir,
                success: function(data) {
                    if (data.length == 0) {
                        $('#kendaraans_id').append(
                            `<option value="">Data kendaraan tidak ditemukan!</option>`
                        );
                    } else {
                        $('#kendaraans_id').append(
                            `<option value="">Pilih kendaraan!</option>`
                        );
                        data.forEach(kendaraan => {
                            $('#kendaraans_id').append(
                                `<option value="${kendaraan.id}">${kendaraan.nomor_plat}</option>`
                            );
                        });
                    }
                }
            });

            $.ajax({
                type: 'get',
                url: '/booking/check-sopir/' + tanggal_mulai + '/' + tanggal_akhir,
                success: function(data) {
                    if (data.length == 0) {
                        $('#sopirs_id').append(
                            `<option value="">Data sopir tidak ditemukan!</option>`
                        );
                    } else {
                        $('#sopirs_id').append(
                            `<option value="">Pilih sopir!</option>`
                        );
                        data.forEach(sopir => {
                            $('#sopirs_id').append(
                                `<option value="${sopir.id}">${sopir.nama}</option>`
                            );
                        });
                    }
                }
            });
        });
    </script>
@endsection
