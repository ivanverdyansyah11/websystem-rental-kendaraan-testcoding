<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Indo Rental Kendaraan | Halaman {{ $title }}</title>

    {{-- STYLE CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    {{-- END STYLE CSS --}}
</head>

<body>

    <div class="container-fluid p-0 login">
        <div class="row justify-content-center justify-content-lg-end">
            <div class="col banner-register d-none d-lg-inline-block"></div>
            <div class="col-md-12 col-lg-5 wrapper-style">
                <div class="row justify-content-center" style="height: 100vh;">
                    <div class="col-8 d-flex align-items-center">
                        <div class="content-login">
                            @if (session()->has('success'))
                                <div class="alert alert-success w-100 mb-4" role="alert">
                                    {{ session('success') }}
                                </div>
                            @elseif(session()->has('failed'))
                                <div class="alert alert-danger w-100 mb-4" role="alert">
                                    {{ session('failed') }}
                                </div>
                            @endif
                            <img src="{{ asset('assets/img/brand/brand-text.svg') }}" alt="Brand Nusa Kendala Logo Teks"
                                class="img-fluid login-brand" draggable="false">
                            <form class="form d-inline-block w-100" method="POST" action="{{ route('login.action') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <div class="input-group">
                                            <input type="text" id="username" placeholder=" " name="username" value="{{ old('username') }}" autocomplete="off" required>
                                            <label for="username" class="d-flex align-items-center">
                                                <img src="{{ asset('assets/img/button/username.svg') }}" alt="Username Icon">
                                                <div class="line"></div>
                                                <span>Masukkan nama pengguna</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="input-group">
                                            <input type="email" id="email" placeholder=" " name="email" value="{{ old('email') }}" autocomplete="off" required>
                                            <label for="email" class="d-flex align-items-center">
                                                <img src="{{ asset('assets/img/button/email.svg') }}" alt="Email Icon">
                                                <div class="line"></div>
                                                <span>Masukkan email</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="input-group">
                                            <input type="password" id="password" placeholder=" " name="password" value="{{ old('password') }}" autocomplete="off" required>
                                            <label for="password" class="d-flex align-items-center">
                                                <img src="{{ asset('assets/img/button/password.svg') }}" alt="Password Icon">
                                                <div class="line"></div>
                                                <span>Masukkan password</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="button-primary d-flex align-items-center">
                                            <span>Buat Akun</span>
                                            <img src="{{ asset('assets/img/button/arrow-light.svg') }}" alt="Arrow Button Light">
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <p class="link-redirect">Sudah memiliki akun? <a href="{{ route('login') }}">Login Akun</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- SCRIPT JS --}}
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    {{-- END SCRIPT JS --}}
</body>

</html>

{{-- @extends('template.main')

@section('content')
    <main class="authentication">
        <div class="container-fluid position-relative" style="height: 100%;">
            <div class="row" style="height: 100%;">
                <div class="col p-0 d-flex align-items-center position-relative wrapper-style">
                    <a class="logo-brand">
                        <img src="{{ asset('assets/images/brand/logo-brand.svg') }}" alt="Logo Brand" class="img-fluid">
                    </a>
                    <div class="content-authentication">
                        <h1 class="title">Login</h1>
                        <form class="form">
                            <div class="row flex-column">
                                <div class="col-lg-9 col-xl-8 col-xxl-7 mb-2">
                                    <div class="input-group">
                                        <input type="email" id="email" placeholder=" " autocomplete="off" required>
                                        <label for="email" class="d-flex align-items-center">
                                            <img src="{{ asset('assets/images/icons/email.svg') }}" alt="Email Icon">
                                            <div class="line"></div>
                                            <span>Enter your email</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-xl-8 col-xxl-7 mb-4">
                                    <div class="input-group">
                                        <input type="password" id="password" placeholder=" " autocomplete="off" required>
                                        <label for="password" class="d-flex align-items-center">
                                            <img src="{{ asset('assets/images/icons/password.svg') }}" alt="Password Icon">
                                            <div class="line"></div>
                                            <span>Enter your password</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="button-primary d-flex align-items-center">
                                        <span>Login account</span>
                                        <img src="{{ asset('assets/images/icons/arrow-light.svg') }}" alt="Arrow Button Light">
                                    </button>
                                </div>
                            </div>
                        </form>
                        <p class="link-redirect">Don't have an account? <a href="{{ route('register.index') }}">Register for Free</a></p>
                    </div>
                </div>
                <div class="col-6 p-0 d-none d-lg-inline-block banner banner-login"></div>
            </div>
        </div>
    </main>
@endsection --}}

{{-- SCRIPT JS --}}
{{-- @push('js')
    <script>
        $(document).ready(function() {
            $(".title").addClass('active-transition');
            $(".form").addClass('active-transition');
            $(".button-primary").addClass('active-transition');
            $(".link-redirect").addClass('active-transition');
            $(".banner").addClass('active-transition');
        });
    </script>
@endpush --}}
{{-- END SCRIPT JS --}}