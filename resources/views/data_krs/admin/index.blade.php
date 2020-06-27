@extends('layouts.home')
@section('title_page','Kartu Rencana Studi (ADMIN)')
@section('content')

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        @foreach ($errors->all() as $error)
            {{ $error }} <br>
        @endforeach
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    {{-- <div class="d-flex justify-content-between">
        <form action="{{ route('admin.krs') }}">
            <div class="input-group">
                <input type="text" name="keyword" class="form-control" placeholder="Search" value="{{ Request::get('keyword') }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <br> --}}
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin.krs') }}">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Search" value="{{ Request::get('keyword') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <a href="{{ route('admin.krs') }}" class="nav-link {{ Request::get('status') == NULL && Request::path() == 'kartu-rencana-studi/admin' ? 'active' : '' }}">All</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.krs', ['status' => 'PENGAJUAN']) }}" class="nav-link {{ Request::get('status') == 'PENGAJUAN' ? 'active' : '' }}">Pengajuan</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.krs', ['status' => 'DITERIMA']) }}" class="nav-link {{ Request::get('status') == 'DITERIMA' ? 'active' : '' }}">Diterima</a>
                </li>
            </ul>
        </div>
    </div>
    <br>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    {{-- <th>No</th> --}}
                    <th>NPM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Kode Matkul</th>
                    <th>Nama Matkul</th>
                    <th>Status</th>
                    <th width="10%">Pilih</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($krs as $result)
                    <tr>
                        {{-- <td>{{ $result + $krs->firstitem() }}</td> --}}
                        <td>{{ $result->npm }}</td>
                        <td>{{ $result->name }}</td>
                        <td>{{ $result->kode_matkul }}</td>
                        <td>{{ $result->nama_matkul }}</td>
                        <td>
                            @if ($result->status == "PENGAJUAN")
                                <span class="badge badge-warning">{{ $result->status }}</span>
                            @elseif ($result->status == "DITERIMA")
                                <span class="badge badge-success">{{ $result->status }}</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('admin.krs.update', $result->id) }}" method="post">
                                @csrf
                                @if ($result->status == "PENGAJUAN")
                                    <button class="btn btn-sm btn-info" type="submit">ACC</button>
                                @else
                                    <button class="btn btn-sm btn-danger" type="submit">BATAL</button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>Tidak ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        </form>
    </div>
    {{ $krs->links() }}

@endsection
