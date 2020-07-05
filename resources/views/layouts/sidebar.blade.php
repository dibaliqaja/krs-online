<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">KRS ONLINE</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">KRS</a>
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
                        <li><a class="nav-link" href="{{ url('/angkatan') }}">Angkatan</a></li>
                        <li><a class="nav-link" href="{{ url('/tahun-ajaran') }}">Tahun Ajaran</a></li>
                        <li><a class="nav-link" href="{{ url('/mata-kuliah') }}">Mata Kuliah</a></li>
                    </ul>
                </li>
                {{-- <li>
                    <a class="nav-link" href="{{ url('/dosen') }}"><i class="fas fa-chalkboard-teacher"></i>
                        <span>Dosen</span>
                    </a>
                </li> --}}
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
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a class="nav-link has-dropdown"><i class="fas fa-id-card"></i><span>Kartu Rencana Studi</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('mahasiswa.krs') }}">Ambil KRS</a></li>
                        <li><a class="nav-link" href="{{ route('mahasiswa.krs.hasil') }}">Cetak KRS</a></li>
                        <li><a class="nav-link" href="#">Hapus KRS</a></li>
                    </ul>
                </li>
            @endif
        </ul>

    </aside>
</div>
