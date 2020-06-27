@extends('layouts.home')
@section('title_page','Kartu Rencana Studi')
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

    <div class="d-flex justify-content-between">
        <form action="{{ route('mahasiswa.krs') }}">
            <div class="input-group">
                <input type="text" name="keyword" class="form-control" placeholder="Search" value="{{ Request::get('keyword') }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
        <form action="{{ route('mahasiswa.krs.store') }}" method="POST">
            @csrf
            <button class="btn btn-primary" type="submit">Ambil KRS</button>
    </div>
    <br>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Matkul</th>
                    <th>Nama Matkul</th>
                    <th>SKS</th>
                    <th width="7%">Semester</th>
                    <th>Program Studi</th>
                    <th width="10%">Pilih</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($matkul as $result => $hasil)
                    <tr>
                        <td>{{ $result + $matkul->firstitem() }}</td>
                        <td>{{ $hasil->kode_matkul }}</td>
                        <td>{{ $hasil->nama_matkul }}</td>
                        <td>{{ $hasil->sks }}</td>
                        <td>{{ $hasil->semester }}</td>
                        <td>{{ $hasil->program_studi->nama_prodi }}</td>
                        <td>
                            <input type="checkbox" name="matkul[]" value="{{ $hasil->id }}">
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
    {{ $matkul->links() }}

@endsection
