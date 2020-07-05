@extends('layouts.home')
@section('title_page','Edit Mahasiswa')
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

    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="">NPM</label>
            <input type="text" class="form-control" name="npm" value="{{ $mahasiswa->npm }}">
        </div>
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" name="name" value="{{ $mahasiswa->user->name }}">
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control select2" name="jenis_kelamin">
                <option value="Laki-Laki" {{ "Laki-Laki" == $mahasiswa->jenis_kelamin ? 'selected' : '' }}>Laki-Laki</option>
                <option value="Perempuan" {{ "Perempuan" == $mahasiswa->jenis_kelamin ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Tempat Lahir</label>
            <input type="text" class="form-control" name="tempat_lahir" value="{{ $mahasiswa->tempat_lahir }}">
        </div>
        <div class="form-group">
            <label for="">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir" value="{{ $mahasiswa->tgl_lahir }}">
        </div>
        <div class="form-group">
            <label for="">Agama</label>
            <input type="text" class="form-control" name="agama" value="{{ $mahasiswa->agama }}">
        </div>
        <div class="form-group">
            <label for="">Alamat</label>
            <textarea name="alamat" class="form-control" cols="30" rows="10">{{ $mahasiswa->alamat }}</textarea>
        </div>
        <div class="form-group">
            <label for="">No. Handphone</label>
            <input type="text" class="form-control" name="no_hp" value="{{ $mahasiswa->no_hp }}">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $mahasiswa->user->email }}">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group">
            <label for="">Password Confirmation</label>
            <input type="password" class="form-control" name="password_confirmation">
        </div>
        <div class="form-group">
            <label for="">Angkatan</label>
            <select class="form-control select2" name="angkatan_id">
                @foreach ($angkatan as $result)
                    <option value="{{ $result->id }}" {{ $result->id == $mahasiswa->angkatan_id ? 'selected' : '' }}>{{ $result->angkatan }} - {{ $result->program_studi->nama_prodi }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Profil Image</label>
            <input type="file" class="form-control-file" name="avatar">
            <span class="text-small text-danger font-italic">Max image upload is 1024 kilobytes</span>
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Update</button>
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-danger">Kembali</a>
        </div>
    </form>

@endsection
