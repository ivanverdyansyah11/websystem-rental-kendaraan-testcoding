<div class="sidebar">
    <div class="sidebar-scroll d-flex flex-column justify-content-between">
        <div class="d-flex flex-column align-items-center w-100">
            <a href="">
                <img src="{{ asset('assets/img/brand/brand-logo.svg') }}" class="img-fluid brand-logo" alt="Brand Logo"
                    draggable="false">
            </a>
            <div class="link-wrapper d-flex flex-column w-100">
                <a href="{{ route('dashboard') }}"
                    class="menu-link d-flex flex-column {{ Request::is('dashboard*') ? 'active' : '' }}">
                    <div class="link-item d-flex align-items-center">
                        <div class="icon-sidebar-wrapper">
                            <div class="sidebar-icon dashboard-icon"></div>
                        </div>
                        <p>Dashboard</p>
                    </div>
                </a>
                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('pelanggan') }}"
                        class="menu-link d-flex flex-column {{ Request::is('pelanggan*') ? 'active' : '' }}">
                        <div class="link-item d-flex align-items-center">
                            <div class="icon-sidebar-wrapper">
                                <div class="sidebar-icon pelanggan-icon"></div>
                            </div>
                            <p>Pelanggan</p>
                        </div>
                    </a>
                    <a href="{{ route('sopir') }}"
                        class="menu-link d-flex flex-column {{ Request::is('sopir*') ? 'active' : '' }}">
                        <div class="link-item d-flex align-items-center">
                            <div class="icon-sidebar-wrapper">
                                <div class="sidebar-icon sopir-icon"></div>
                            </div>
                            <p>Sopir</p>
                        </div>
                    </a>
                    <a href="{{ route('kendaraan') }}"
                        class="menu-link d-flex flex-column {{ Request::is('kendaraan*') || Request::is('jenis-kendaraan*') || Request::is('brand-kendaraan*') || Request::is('seri-kendaraan*') || Request::is('kilometer-kendaraan*') ? 'active' : '' }}">
                        <div class="link-item d-flex align-items-center">
                            <div class="icon-sidebar-wrapper">
                                <div class="sidebar-icon kendaraan-icon"></div>
                            </div>
                            <p>Kendaraan</p>
                        </div>
                    </a>
                    <div
                        class="menu-link d-flex flex-column {{ Request::is('kendaraan*') || Request::is('jenis-kendaraan*') || Request::is('brand-kendaraan*') || Request::is('seri-kendaraan*') || Request::is('kilometer-kendaraan*') ? 'active' : 'd-none' }}">
                        <a href="{{ route('jenisKendaraan') }}"
                            class="link-child {{ Request::is('jenis-kendaraan*') ? 'active' : '' }}">Jenis</a>
                        <a href="{{ route('brandKendaraan') }}"
                            class="link-child {{ Request::is('brand-kendaraan*') ? 'active' : '' }}">Brand</a>
                        <a href="{{ route('seriKendaraan') }}"
                            class="link-child {{ Request::is('seri-kendaraan*') ? 'active' : '' }}">Seri</a>
                        <a href="{{ route('kilometerKendaraan') }}"
                            class="link-child {{ Request::is('kilometer-kendaraan*') ? 'active' : '' }}">Kilometer</a>
                    </div>
                @endif
                <a href="{{ route('pemesanan') }}"
                    class="menu-link d-flex flex-column {{ Request::is('pemesanan*') || Request::is('booking*') ? 'active' : '' }}">
                    <div class="link-item d-flex align-items-center">
                        <div class="icon-sidebar-wrapper">
                            <div class="sidebar-icon pemesanan-icon"></div>
                        </div>
                        <p>Pemesanan</p>
                    </div>
                </a>
                <a href="{{ route('pengembalian') }}"
                    class="menu-link d-flex flex-column {{ Request::is('pengembalian*') || Request::is('penambahan-sewa*') ? 'active' : '' }}">
                    <div class="link-item d-flex align-items-center">
                        <div class="icon-sidebar-wrapper">
                            <div class="sidebar-icon pengembalian-icon"></div>
                        </div>
                        <p>Pengembalian</p>
                    </div>
                </a>
                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('servis') }}"
                        class="menu-link d-flex flex-column {{ Request::is('servis*') || Request::is('kategori-servis*') ? 'active' : '' }}">
                        <div class="link-item d-flex align-items-center">
                            <div class="icon-sidebar-wrapper">
                                <div class="sidebar-icon servis-icon"></div>
                            </div>
                            <p>Servis</p>
                        </div>
                    </a>
                    <a href="{{ route('pajak') }}"
                        class="menu-link d-flex flex-column {{ Request::is('pajak*') ? 'active' : '' }}">
                        <div class="link-item d-flex align-items-center">
                            <div class="icon-sidebar-wrapper">
                                <div class="sidebar-icon pajak-icon"></div>
                            </div>
                            <p>Pajak</p>
                        </div>
                    </a>
                @endif
                <a href="{{ route('laporan') }}"
                    class="menu-link d-flex flex-column {{ Request::is('laporan*') ? 'active' : '' }}">
                    <div class="link-item d-flex align-items-center">
                        <div class="icon-sidebar-wrapper">
                            <div class="sidebar-icon laporan-icon"></div>
                        </div>
                        <p>Laporan</p>
                    </div>
                </a>
                <a href="{{ route('pengguna') }}"
                    class="menu-link d-inline-block d-lg-none flex-column {{ Request::is('pengguna*') ? 'active' : '' }}">
                    <div class="link-item d-flex align-items-center">
                        <div class="icon-sidebar-wrapper">
                            <div class="sidebar-icon pengguna-icon"></div>
                        </div>
                        <p>Pengguna</p>
                    </div>
                </a>
                <form class="w-100" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="menu-link w-100 d-inline-block d-lg-none flex-column {{ Request::is('logout*') ? 'active' : '' }}">
                        <div class="link-item d-flex align-items-center">
                            <div class="icon-sidebar-wrapper">
                                <div class="sidebar-icon logout-icon"></div>
                            </div>
                            <p>Logout</p>
                        </div>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="hamburger d-flex d-lg-none justify-content-center align-items-center">
    <img src="{{ asset('assets/img/button/hamburger.svg') }}" alt="Hamburger Icon" class="img-fluid hamburger-icon">
</div>

<script>
    const sidebar = document.querySelector('.sidebar');
    const hamburger = document.querySelector('.hamburger');

    hamburger.addEventListener('click', function() {
        sidebar.classList.toggle('active');
    });
</script>
