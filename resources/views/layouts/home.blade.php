<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title_page')</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    @if (Auth::user())
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            @if (auth()->user()->role == 'mahasiswa')
                                @if (Auth::user()->mahasiswa->avatar === null)
                                    <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                                @else
                                    <img alt="image" src="{{ asset(Auth::user()->mahasiswa->avatar) }}" class="rounded-circle mr-1">
                                @endif
                            @elseif (auth()->user()->role == 'admin')
                                @if (Auth::user()->avatar === null)
                                    <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                                @else
                                    <img alt="image" src="{{ asset(Auth::user()->avatar) }}" class="rounded-circle mr-1">
                                @endif
                            @endif
                            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            @if (auth()->user()->role == 'mahasiswa')
                                <a href="{{ route('profile.mahasiswa.edit') }}" class="dropdown-item has-icon">
                                    <i class="far fa-user"></i> Profile
                                </a>
                            @elseif (auth()->user()->role == 'admin')
                                <a href="{{ route('profile.admin.edit') }}" class="dropdown-item has-icon">
                                    <i class="far fa-user"></i> Profile
                                </a>
                            @endif
                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="/logout">
                                {{ __('Logout') }}
                            </a>
                        </div>
                    </li>
                    @else
                        <li class="nav-item"><a href="{{ url('login') }}" class="nav-link">Login</a></li>
                    @endif
                </ul>
            </nav>

            @include('layouts.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('title_page')</h1>
                    </div>

                    <div class="section-body">
                        <div class="card">
                            <div class="p-3">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- End Main Content -->

            @include('layouts.footer')

