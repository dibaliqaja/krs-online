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
            <input type="text" class="form-control" name="npm" placeholder="0000000000" value="{{ $mahasiswa->npm }}">
        </div>
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" name="nama" placeholder="Adi Gumilang" value="{{ $mahasiswa->nama }}">
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control select2" name="jenis_kelamin">
                <option value="Laki-Laki" {{ $mahasiswa->jenis_kelamin ? 'selected' : '' }}>Laki-Laki</option>
                <option value="Perempuan" {{ $mahasiswa->jenis_kelamin ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Tempat Lahir</label>
            <input type="text" class="form-control" name="tempat_lahir" placeholder="Tuban" value="{{ $mahasiswa->tempat_lahir }}">
        </div>
        <div class="form-group">
            <label for="">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir" value="{{ $mahasiswa->tgl_lahir }}">
        </div>
        <div class="form-group">
            <label for="">Agama</label>
            <input type="text" class="form-control" name="agama" placeholder="Islam" value="{{ $mahasiswa->agama }}">
        </div>
        <div class="form-group">
            <label for="">Alamat</label>
            <textarea name="alamat" class="form-control" cols="30" rows="10">{{ $mahasiswa->alamat }}</textarea>
        </div>
        <div class="form-group">
            <label for="">No. Handphone</label>
            <input type="text" class="form-control" name="no_hp" placeholder="089000000000" value="{{ $mahasiswa->no_hp }}">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" placeholder="089000000000" value="{{ $mahasiswa->email }}">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" placeholder="********">
        </div>
        <div class="form-group">
            <label for="">Password Confirmation</label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="********">
        </div>
        <div class="form-group">
            <label for="">Program Studi</label>
            <select class="form-control select2" name="program_studis_id">
                @foreach ($prodi as $result)
                    <option value="{{ $result->id }}" {{ $result->id == $mahasiswa->program_studis_id ? 'selected' : '' }}>{{ $result->nama_prodi }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Semester</label>
            <select class="form-control select2" name="semesters_id">
                @foreach ($semester as $result)
                    <option value="{{ $result->id }}" {{ $result->id == $mahasiswa->semesters_id ? 'selected' : '' }}>{{ $result->semester }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Angkatan</label>
            <select class="form-control select2" name="angkatans_id">
                @foreach ($angkatan as $result)
                    <option value="{{ $result->id }}" {{ $result->id == $mahasiswa->angkatans_id ? 'selected' : '' }}>{{ $result->angkatan }}</option>
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
