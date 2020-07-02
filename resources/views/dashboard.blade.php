@extends('layouts.home')
@section('title_page','Dashboard')

@section('content')

    <div class="row">
        @if (Auth::user())
            <div class="col-12 mb-4">
                <div class="hero bg-primary text-white">
                    <div class="hero-inner">
                        <h2>Selamat Datang, {{ Auth::user()->name }}</h2>
                        <p>
                            Di Sistem Kartu Rencana Studi Online.
                            Sistem ini terus dikembangkan sesuai dengan informasi yang terupdate,
                            oleh karena itu saran dan kritikan sangat diperlukan untuk perbaikan.
                            Semoga dengan kehadiran sistem ini menjadikan akuntabel dalam pengelolaan kartu rencana studi mahasiswa.
                        </p>
                    </div>
                </div>
            </div>
        @endif
        @if (auth()->user()->role == 'admin')
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fas fa-building"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Program Studi</h4>
                    </div>
                    <div class="card-body">
                        {{ DB::table('program_studis')->count() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Mahasiswa</h4>
                    </div>
                    <div class="card-body">
                        {{ DB::table('mahasiswas')->count() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Dosen</h4>
                    </div>
                    <div class="card-body">
                        {{ DB::table('dosens')->count() }}
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

@endsection
