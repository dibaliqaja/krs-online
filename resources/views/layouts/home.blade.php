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

    <script>
        function myFunction() {
            var x = document.getElementById("mychatbox2");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
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
                <label class="custom-control custom-switch">
                    <input type="checkbox" class="custom-switch-input" id="darkSwitch">
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description" id="mode"></span>
                </label>
                <script src="{{ asset('assets/js/dark-mode-switch.js') }}"></script>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                            class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Messages
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-message">
                                <a href="javascript:void(0)" onclick="myFunction()" class="dropdown-item dropdown-item">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle">
                                        <div class="is-online"></div>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Hasan Basri</b>
                                        <p>Cuma ngetest aja</p>
                                        <div class="time">10 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="javascript:void(0)" onclick="myFunction()" class="dropdown-item dropdown-item">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle">
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Rizal Fakhri</b>
                                        <p>Nyoba aja</p>
                                        <div class="time">12 Hours Ago</div>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-footer text-center">
                                {{-- <a href="#">View All <i class="fas fa-chevron-right"></i></a> --}}
                            </div>
                        </div>
                    </li>
                    @if (Auth::user())
                    @if (auth()->user()->role == 'mahasiswa')
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                            class="nav-link notification-toggle nav-link-lg {{ auth()->user()->unreadNotifications->count() == 0 ? '' : 'beep' }}"><i class="far fa-bell"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Notifications
                                <div class="float-right">
                                    <a href="{{ route('mark.as.read') }}">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-icons">
                                @foreach (auth()->user()->unreadNotifications as $notification)
                                    <div class="dropdown-item dropdown-item-unread">
                                        <div class="dropdown-item-icon bg-success text-white">
                                            <i class="fas fa-check"></i>
                                        </div>
                                        <div class="dropdown-item-desc">
                                            <p class="font-weight-600">{{ $notification->data['data'] }}</p>
                                            <div class="time">{{ $notification->created_at->diffForHumans() }}</div>
                                        </div>
                                    </div>
                                @endforeach
                                @foreach (auth()->user()->readNotifications as $notification)
                                    <div class="dropdown-item">
                                        <div class="dropdown-item-icon bg-success text-white">
                                            <i class="fas fa-check"></i>
                                        </div>
                                        <div class="dropdown-item-desc">
                                            <p class="font-weight-600">{{ $notification->data['data'] }}</p>
                                            <div class="time">{{ $notification->created_at->diffForHumans() }}</div>
                                            <a href="{{ route('delete.notif', ['id' => $notification->id]) }}" ><i class="fa fa-trash fa-xs float-right"></i></a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="dropdown-footer text-center">
                                {{-- <a href="#">View All <i class="fas fa-chevron-right"></i></a> --}}
                            </div>
                        </div>
                    </li>
                    @endif
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
                                <a href="{{ route('profile.mahasiswa.password') }}" class="dropdown-item has-icon">
                                    <i class="fas fa-cog"></i> Edit Password
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

                <div class="col-12 col-sm-6 col-lg-4 float-right">
                    <div class="card chat-box card-success fixed-bottom" id="mychatbox2" style="
                    width:300px;
                    position:fixed;
                    right:50px;
                    margin-left: 75%;
                    margin-bottom: 3px;
                    display: none;">
                        <div class="card-header">
                            <h4><i class="fas fa-circle text-success mr-2" title="Online" data-toggle="tooltip"></i> Chat dengan Hasan</h4>
                        </div>
                        <div class="card-body chat-content">
                        </div>
                        <div class="card-footer chat-form">
                            <form id="chat-form2">
                                <input type="text" class="form-control" placeholder="Type a message">
                                <button class="btn btn-primary">
                                    <i class="far fa-paper-plane"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Main Content -->

            @include('layouts.footer')

