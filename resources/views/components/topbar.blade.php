<div class="topbar d-flex justify-content-between align-items-center">
    <h3 class="title">Halaman {{ $title }}</h3>
    <div class="wrapper-position position-relative d-none d-lg-inline-block">
        <div class="topbar-profile d-flex align-items-center position-relative">
            <div class="wrapper-profile d-flex align-items-center">
                <img src="{{ asset('assets/img/pengguna/profile-admin.png') }}" class="img-fluid pengguna-image"
                    alt="Pengguna Profile" draggable="false">
                <div class="profile-user">
                    <h6 class="user-name">{{ auth()->user()->nama_lengkap }}</h6>
                    <p class="user-role">{{ auth()->user()->role }}</p>
                </div>
            </div>
            <div class="arrow-border d-flex align-items-center justify-content-center">
                <div class="arrow-topbar-icon"></div>
            </div>
        </div>
        <div class="popup-topbar position-absolute d-flex flex-column">
            <div class="modal-topbar">
                <a href="{{ route('pengguna') }}"
                    class="wrapper d-flex align-items-center mb-2 {{ Request::is('pengguna*') ? 'active' : '' }}">
                    <div class="wrapper-topbar">
                        <div class="pengguna-topbar"></div>
                    </div>
                    <p>Pengguna</p>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="wrapper d-flex align-items-center">
                        <div class="wrapper-topbar">
                            <div class="logout-topbar"></div>
                        </div>
                        <p>Logout</p>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="topbar-hamburger d-lg-none">
        <div class="hamburger-icon"></div>
    </div>
</div>

<script>
    const arrowBorder = document.querySelector('.arrow-border');
    const popupTopbar = document.querySelector('.popup-topbar');

    arrowBorder.addEventListener('click', function() {
        popupTopbar.classList.toggle('active');
    });
</script>
