<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a class="nav-link" href="{{ url('/dashboard') }}"><i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="dropdown">
                <a class="nav-link has-dropdown"><i class="fas fa-database"></i><span>Data Master</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ url('/angkatan') }}">Angkatan</a></li>
                    <li><a class="nav-link" href="{{ url('/semester') }}">Semester</a></li>
                    <li><a class="nav-link" href="{{ url('/program-studi') }}">Program Studi</a></li>
                    <li><a class="nav-link" href="{{ url('/mata-kuliah') }}">Mata Kuliah</a></li>
                </ul>
            </li>
            <li>
                <a class="nav-link" href="{{ url('/dosen') }}"><i class="fas fa-user"></i>
                    <span>Dosen</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ url('/mahasiswa') }}"><i class="fas fa-user"></i>
                    <span>Mahasiswa</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ url('/kartu-rencana-studi') }}"><i class="fas fa-id-card"></i>
                    <span>Kartu Rencana Studi</span>
                </a>
            </li>
        </ul>

    </aside>
</div>