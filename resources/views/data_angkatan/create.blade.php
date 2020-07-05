@extends('layouts.home')
@section('title_page','Tambah Angkatan')
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

    <form action="{{ route('angkatan.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Kode Angkatan</label>
            <input type="text" class="form-control" name="kode_angkatan" value="{{ old('kode_angkatan') }}">
        </div>
        <div class="form-group">
            <label for="">Angkatan</label>
            <input type="text" class="form-control" name="angkatan" value="{{ old('angkatan') }}">
        </div>
        <div class="form-group">
            <label for="">Program Studi</label>
            <select class="form-control select2" name="program_studi_id">
                @foreach ($prodi as $result)
                    <option value="{{ $result->id }}">{{ $result->nama_prodi }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Pembimbing Akademik</label>
            <select class="form-control select2" name="dosen_id">
                @foreach ($dosen as $result)
                    <option value="{{ $result->id }}">{{ $result->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Tambah</button>
            <a href="{{ route('angkatan.index') }}" class="btn btn-danger">Kembali</a>
        </div>
    </form>

@endsection
