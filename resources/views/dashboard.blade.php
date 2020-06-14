@extends('layouts.home')
@section('title_page','Dashboard')

@section('content')

    <div class="row">
        {{-- @if (Auth::user()) --}}
            <div class="col-12 mb-4">
                <div class="hero bg-primary text-white">
                    <div class="hero-inner">
                        <h2>Welcome Back, {{-- Auth::user()->name --}} Admin</h2>
                        <p class="lead">This website is a place to manage provinces, cities, areas and more.</p>
                    </div>
                </div>
            </div>
        {{-- @endif --}}
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fas fa-file-signature"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Dosen</h4>
                    </div>
                    <div class="card-body">
                        {{-- {{ DB::table('provinces')->count() }} --}}20
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fas fa-file-signature"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Mahasiswa</h4>
                    </div>
                    <div class="card-body">
                        {{-- {{ DB::table('cities')->count() }} --}}30
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fas fa-file-signature"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Program Studi</h4>
                    </div>
                    <div class="card-body">
                        {{-- {{ DB::table('areas')->count() }} --}}33
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
