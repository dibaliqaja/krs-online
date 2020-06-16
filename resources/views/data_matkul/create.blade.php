@extends('layouts.home')
@section('title_page','Tambah Mata Kuliah')
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

    <form action="{{ route('mata-kuliah.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Kode Matkul</label>
            <input type="text" class="form-control" name="kode_matkul" placeholder="T011" value="{{ old('kode_matkul') }}">
        </div>
        <div class="form-group">
            <label for="">Nama Matkul</label>
            <input type="text" class="form-control" name="nama_matkul" placeholder="Pemrograman 1" value="{{ old('nama_matkul') }}">
        </div>
        <div class="form-group">
            <label for="">SKS</label>
            <input type="number" min="1" class="form-control" name="sks" value="{{ old('sks') }}">
        </div>
        <div class="form-group">
            <label for="">Pengajar</label>
            <select class="form-control select2" name="dosens_id">
                @foreach ($dosen as $result)
                    <option value="{{ $result->id }}">{{ $result->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Tambah</button>
            <a href="{{ route('mata-kuliah.index') }}" class="btn btn-danger">Kembali</a>
        </div>
    </form>

@endsection
