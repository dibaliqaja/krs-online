@extends('layouts.home')
@section('title_page','Show Mahasiswa')
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
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-danger float-right">Kembali</a>
            <label for="">Profil Image</label><br>
            @if ($mahasiswa->avatar === null)
                <img alt="Profil Image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" width="150px" class="rounded">
            @else
                <img alt="Profil Image" src="{{ asset($mahasiswa->avatar) }}" width="150px" class="rounded">
            @endif
        </div>
        <div class="form-group">
            <label for="">NPM</label>
            <input type="text" class="form-control" name="npm" value="{{ $mahasiswa->npm }}" readonly>
        </div>
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" name="nama" value="{{ $mahasiswa->user->name }}" readonly>
        </div>
        <div class="form-group">
            <label for="">Jenis Kelamin</label>
            <input type="text" class="form-control" name="nama" value="{{ $mahasiswa->jenis_kelamin }}" readonly>
        </div>
        <div class="form-group">
            <label for="">Tempat Lahir</label>
            <input type="text" class="form-control" name="tempat_lahir" value="{{ $mahasiswa->tempat_lahir }}" readonly>
        </div>
        <div class="form-group">
            <label for="">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir" value="{{ $mahasiswa->tgl_lahir }}" readonly>
        </div>
        <div class="form-group">
            <label for="">Agama</label>
            <input type="text" class="form-control" name="agama" value="{{ $mahasiswa->agama }}" readonly>
        </div>
        <div class="form-group">
            <label for="">Alamat</label>
            <textarea name="alamat" class="form-control" cols="30" rows="10" readonly>{{ $mahasiswa->alamat }}</textarea>
        </div>
        <div class="form-group">
            <label for="">No. Handphone</label>
            <input type="text" class="form-control" name="no_hp" value="{{ $mahasiswa->no_hp }}" readonly>
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $mahasiswa->user->email }}" readonly>
        </div>
        <div class="form-group">
            <label for="">Program Studi</label>
            <input type="email" class="form-control" name="email" value="{{ $mahasiswa->program_studi->nama_prodi }}" readonly>
        </div>
        <div class="form-group">
            <label for="">Semester</label>
            <input type="email" class="form-control" name="email" value="{{ $mahasiswa->semester->semester }}" readonly>
        </div>
        <div class="form-group">
            <label for="">Angkatan</label>
            <input type="email" class="form-control" name="email" value="{{ $mahasiswa->angkatan->angkatan }}" readonly>
        </div>
    </form>

@endsection
