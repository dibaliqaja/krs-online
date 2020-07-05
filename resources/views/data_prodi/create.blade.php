@extends('layouts.home')
@section('title_page','Tambah Program Studi')
@section('content')

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

    <form action="{{ route('program-studi.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Kode Prodi</label>
            <input type="text" class="form-control" name="kode_prodi" value="{{ old('kode_prodi') }}">
        </div>
        <div class="form-group">
            <label for="">Nama Prodi</label>
            <input type="text" class="form-control" name="nama_prodi" value="{{ old('nama_prodi') }}">
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Tambah</button>
            <a href="{{ route('program-studi.index') }}" class="btn btn-danger">Kembali</a>
        </div>
    </form>

@endsection
