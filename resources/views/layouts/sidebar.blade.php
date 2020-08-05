<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="mahasiswa-home.html">
                <img alt="image" width="40px" src="{{ asset('assets/img/avatar/logo.png') }}"><p>UNIROW</p>
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="mahasiswa-home.html">
                <img alt="image" width="35px" src="{{ asset('assets/img/avatar/logo.png') }}">
            </a>
        </div>
        <ul class="sidebar-menu">
            @if (auth()->user()->role == 'admin')
                <li>
                    <a class="nav-link" href="{{ url('/dashboard-admin') }}"><i class="fas fa-fire"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a class="nav-link has-dropdown"><i class="fas fa-database"></i><span>Data Master</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ url('/program-studi') }}">Program Studi</a></li>
                        <li><a class="nav-link" href="{{ url('/dosen') }}">Dosen</a></li>
                        <li><a class="nav-link" href="{{ url('/tahun-ajaran') }}">Tahun Ajaran</a></li>
                        <li><a class="nav-link" href="{{ url('/angkatan') }}">Angkatan</a></li>
                        <li><a class="nav-link" href="{{ url('/mata-kuliah') }}">Mata Kuliah</a></li>
                    </ul>
                </li>
                <li>
                    <a class="nav-link" href="{{ url('/mahasiswa') }}"><i class="fas fa-user-graduate"></i>
                        <span>Mahasiswa</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a class="nav-link has-dropdown"><i class="fas fa-id-card"></i><span>Kartu Rencana Studi</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('admin.krs') }}">Data KRS Mahasiswa</a></li>
                    </ul>
                </li>
            @endif
            @if (auth()->user()->role == 'mahasiswa')
                <li>
                    <a class="nav-link" href="{{ url('/dashboard-mahasiswa') }}"><i class="fas fa-fire"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                        <span>Kuesioner</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="#">Layanan Dosen</a></li>
                    </ul>
                </li>
                <li><a class="nav-link" href="#"><i class="fas fa-money-bill-wave"></i> <span>Keuangan</span></a></li>
                <li class="menu-header">Akademika</li>
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
                        <span>Jadwal</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="#">Jadwal Kuliah</a></li>
                        <li><a class="nav-link" href="#">Jadwal Ujian Semester</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="nav-link has-dropdown"><i class="fas fa-id-card"></i><span>Kartu Rencana Studi</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('mahasiswa.krs') }}">Ambil KRS</a></li>
                        <li><a class="nav-link" href="{{ route('mahasiswa.krs.hasil') }}">Cetak KRS</a></li>
                        <li><a class="nav-link" href="{{ route('krs.hapus') }}">Hapus KRS</a></li>
                    </ul>
                </li>
                <li><a class="nav-link" href="#"><i class="fas fa-id-card"></i> <span>Kartu Ujian</span></a></li>
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-sticky-note"></i>
                        <span>Presensi</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="#">Lihat Presensi</a></li>
                        <li><a class="nav-link" href="#">Presentase Presensi</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="far fa-file-archive"></i>
                        <span>Mata Kuliah</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="#">Materi Mata Kuliah</a></li>
                        <li><a class="nav-link" href="#">Tugas Mata Kuliah</a></li>
                        <li><a class="nav-link" href="#">UTS UAS Mata Kuliah</a></li>
                    </ul>
                </li>
                <li><a class="nav-link" href="#"><i class="fas fa-stop"></i> <span>Pengajuan Cuti</span></a></li>
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i>
                        <span>Tugas Akhir/Skripsi</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="#">Cari Judul</a></li>
                        <li><a class="nav-link" href="#">Pengajuan Judul</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-clipboard"></i>
                        <span>Nilai</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="#">Kartu Hasil Studi</a></li>
                        <li><a class="nav-link" href="#">Aktivitas Kuliah</a></li>
                        <li><a class="nav-link" href="#">Transkrip Nilai</a></li>
                    </ul>
                </li>
                <li><a class="nav-link" href="#"><i class="fas fa-graduation-cap"></i> <span>Pendaftaran Wisuda</span></a></li>
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-book-open"></i>
                        <span>Perpustakaan</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="#">Cari Pustaka</a></li>
                        <li><a class="nav-link" href="#">History Peminjaman</a></li>
                    </ul>
                </li>
                <li><a class="nav-link" href="#"><i class="fas fa-history"></i> <span>Riwayat Aktifitas</span></a></li>
                <li class="menu-header">Who's Online?</li>
                <li>
                    <a class="nav-link" href="#">
                        <img alt="image" class="rounded-circle" width="20" src="assets/img/avatar/avatar-1.png">
                        <span class="ml-2">Hasan Basri</span><span class="bullet text-success"></span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#">
                        <img alt="image" class="rounded-circle" width="20" src="assets/img/avatar/avatar-1.png">
                        <span class="ml-2">Rizal Fakhri</span><span class="bullet text-success"></span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#">
                        <img alt="image" class="rounded-circle" width="20" src="assets/img/avatar/avatar-1.png">
                        <span class="ml-2">Wildan Asa</span><span class="bullet"></span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#">
                        <img alt="image" class="rounded-circle" width="20" src="assets/img/avatar/avatar-1.png">
                        <span class="ml-2">Bagus Agri</span><span class="bullet"></span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#">
                        <img alt="image" class="rounded-circle" width="20" src="assets/img/avatar/avatar-1.png">
                        <span class="ml-2">Agung Risa</span><span class="bullet text-success"></span>
                    </a>
                </li>
                <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                </div>
            @endif
        </ul>

    </aside>
</div>
