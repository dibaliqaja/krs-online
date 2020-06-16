@extends('layouts.home')
@section('title_page','Show Dosen')
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
    <form>
        <div class="form-group">
            <a href="{{ route('dosen.index') }}" class="btn btn-danger float-right">Kembali</a>
            <label for="">Profil Image</label><br>
            @if ($dosen->avatar === null)
                <img alt="Profil Image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" width="150px" class="rounded">
            @else
                <img alt="Profil Image" src="{{ asset($dosen->avatar) }}" width="150px" class="rounded">
            @endif
        </div>
        <div class="form-group">
            <label for="">NIDN</label>
            <input type="text" class="form-control" name="npm" value="{{ $dosen->nidn }}" readonly>
        </div>
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" name="nama" value="{{ $dosen->nama }}" readonly>
        </div>
        <div class="form-group">
            <label for="">Jenis Kelamin</label>
            <input type="text" class="form-control" name="nama" value="{{ $dosen->jenis_kelamin }}" readonly>
        </div>
        <div class="form-group">
            <label for="">Tempat Lahir</label>
            <input type="text" class="form-control" name="tempat_lahir" value="{{ $dosen->tempat_lahir }}" readonly>
        </div>
        <div class="form-group">
            <label for="">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir" value="{{ $dosen->tgl_lahir }}" readonly>
        </div>
        <div class="form-group">
            <label for="">Agama</label>
            <input type="text" class="form-control" name="agama" value="{{ $dosen->agama }}" readonly>
        </div>
        <div class="form-group">
            <label for="">Alamat</label>
            <textarea name="alamat" class="form-control" cols="30" rows="10" readonly>{{ $dosen->alamat }}</textarea>
        </div>
        <div class="form-group">
            <label for="">No. Handphone</label>
            <input type="text" class="form-control" name="no_hp" value="{{ $dosen->no_hp }}" readonly>
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $dosen->email }}" readonly>
        </div>
    </form>

@endsection
