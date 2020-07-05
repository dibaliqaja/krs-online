@extends('layouts.home')
@section('title_page','Kartu Rencana Studi')
@section('content')

    @if (Session::has('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
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

    <div class="row">
        <div class="col-md-2 mt-1">
        <form action="{{ route('mahasiswa.krs.store') }}" method="POST">
            @csrf
            <button class="btn btn-primary" type="submit">Ambil KRS</button>
        </div>
    </div>
    <br>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="7%">No</th>
                    <th width="15%">Kode Matkul</th>
                    <th width="25%">Nama Matkul</th>
                    <th width="7%">SKS</th>
                    <th width="7%">Semester</th>
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
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Tidak ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        </form>
    </div>

@endsection
