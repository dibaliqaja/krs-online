@extends('layouts.home')
@section('title_page','Home')

@section('content')

    <div class="row">
        @if (auth()->user()->role == 'mahasiswa')
            <div class="card">
                <div class="card-header">
                    <h3>Selamat Datang {{ Auth::user()->name }}</h3>
                </div>
                <div class="card-body">
                    <b>Selamat Datang</b>
                    <p>Di Sistem Akademik Kampus Universitas PGRI Ronggolawe. Sistem ini terus dikembangkan sesuai dengan informasi yang terupdate, oleh karena itu saran dan kritikan sangat diperlukan untuk perbaikan dimasa yang akan datang. Semoga dengan kehadiran sistem ini menjadikan Universitas PGRI Ronggolawe akuntabel dalam pengelolaan akademik mahasiswa. Tak lupa ucapan terima kasih kepada PENGEMBANG | Web Design and Development Services.
                        Mengganti Password
                        Kepada seluruh Mahasiswa agar segera ganti Password-nya demi keamanan
                        Logout
                        Demi keamanan data di Sistem Akademik Kampus Universitas PGRI Ronggolawe, jangan lupa Logout sebelum meninggalkan komputer yang Anda gunakan
                    </p>
                    <b>Mengganti Password</b>
                    <p>Kepada seluruh Mahasiswa agar segera ganti Password-nya demi keamanan</p>
                    <b>Logout</b>
                    <p>Demi keamanan data di Sistem Akademik Kampus Universitas PGRI Ronggolawe, jangan lupa Logout sebelum meninggalkan komputer yang Anda gunakan</p>
                </div>
                <div class="card-footer">
                    <p>Salam <br>Rektor,</p><br><br><br><br><br>
                    <p>Prof. Dr. SUPIANA DIAN NURTJAHYANI, M.Kes. <br>
                        NIDN.0021056801
                    </p>
                </div>
            </div>
        @elseif (auth()->user()->role == 'admin')
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
