@extends('layouts.home')
@section('title_page','Edit Dosen')
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

    <form action="{{ route('dosen.update', $dosen->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="">NIDN</label>
            <input type="text" class="form-control" name="nidn" value="{{ old('nidn', $dosen->nidn) }}">
        </div>
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" name="nama" value="{{ old('nama', $dosen->nama) }}">
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control select2" name="jenis_kelamin">
                <option value="Laki-Laki" {{ "Laki-Laki" == $dosen->jenis_kelamin ? 'selected' : '' }}>Laki-Laki</option>
                <option value="Perempuan" {{ "Perempuan" == $dosen->jenis_kelamin ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Tempat Lahir</label>
            <input type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir', $dosen->tempat_lahir) }}">
        </div>
        <div class="form-group">
            <label for="">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir" value="{{ old('tgl_lahir', $dosen->tgl_lahir) }}">
        </div>
        <div class="form-group">
            <label for="">Agama</label>
            <input type="text" class="form-control" name="agama" value="{{ old('agama', $dosen->agama) }}">
        </div>
        <div class="form-group">
            <label for="">Alamat</label>
            <textarea name="alamat" class="form-control" cols="30" rows="10">{{ old('alamat', $dosen->alamat) }}</textarea>
        </div>
        <div class="form-group">
            <label for="">No. Handphone</label>
            <input type="text" class="form-control" name="no_hp" value="{{ old('no_hp', $dosen->no_hp) }}">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email', $dosen->email) }}">
        </div>
        <div class="form-group">
            <label for="">Program Studi</label>
            <select class="form-control select2" name="program_studi_id">
                @foreach ($prodi as $result)
                    <option value="{{ $result->id }}" {{ $result->id == $dosen->program_studi_id ? 'selected' : '' }}>{{ $result->nama_prodi }}</option>
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
            <a href="{{ route('dosen.index') }}" class="btn btn-danger">Kembali</a>
        </div>
    </form>

@endsection
