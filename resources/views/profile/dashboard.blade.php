@extends('layouts.home')
@section('title_page','Dashboard')

@section('content')

    <div class="row">
        @if (Auth::user())
            <div class="col-12 mb-4">
                <div class="hero bg-primary text-white">
                    <div class="hero-inner">
                        <h2>Welcome Back, {{ Auth::user()->name }}</h2>
                        <p class="lead">This website is a for managing Campus Academic Information Systems.</p>
                    </div>
                </div>
            </div>
        @endif
    </div>

@endsection
