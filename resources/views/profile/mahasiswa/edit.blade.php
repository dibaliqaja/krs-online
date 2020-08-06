@extends('layouts.home')
@section('title_page','Edit Profil')
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

    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
                <div class="profile-widget-header">
                    @if ($mahasiswa->avatar === null)
                    <img alt="Profil Image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" width="150px"
                        class="rounded ml-3">
                    @else
                    <img alt="Profil Image" src="{{ asset($mahasiswa->avatar) }}" width="150px" class="rounded ml-3">
                    @endif
                </div>
                <div class="profile-widget-description">
                    <div class="profile-widget-name">NIM
                        <div class="text-muted d-inline font-weight-normal">
                            <div class="slash"></div> {{ $mahasiswa->npm }}
                        </div>
                    </div>
                    <div class="profile-widget-name">Nama
                        <div class="text-muted d-inline font-weight-normal">
                            <div class="slash"></div> {{ $mahasiswa->name }}
                        </div>
                    </div>
                    {{-- <div class="profile-widget-name">Fakultas
                        <div class="text-muted d-inline font-weight-normal">
                            <div class="slash"></div> Fakultas Teknik
                        </div>
                    </div> --}}
                    <div class="profile-widget-name">Program Studi
                        <div class="text-muted d-inline font-weight-normal">
                            <div class="slash"></div> {{ $mahasiswa->angkatan->program_studi->nama_prodi }}
                        </div>
                    </div>
                    <div class="profile-widget-name">Angkatan
                        <div class="text-muted d-inline font-weight-normal">
                            <div class="slash"></div> {{ $mahasiswa->angkatan->angkatan }}
                        </div>
                    </div>
                    {{-- <div class="profile-widget-name">Batas Studi
                        <div class="text-muted d-inline font-weight-normal">
                            <div class="slash"></div> Semester Ganjil 2025/2026
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
                <form action="{{ route('profile.mahasiswa.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="card-header">
                        <h4>Data Pribadi</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label for="">NPM</label>
                                <input type="text" class="form-control" name="npm"
                                    value="{{ old('npm', $mahasiswa->npm) }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ old('name', $mahasiswa->name) }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label>Jenis Kelamin</label>
                                <select class="form-control select2" name="jenis_kelamin">
                                    <option value="Laki-Laki"
                                        {{ "Laki-Laki" == $mahasiswa->jenis_kelamin ? 'selected' : '' }}>Laki-Laki
                                    </option>
                                    <option value="Perempuan"
                                        {{ "Perempuan" == $mahasiswa->jenis_kelamin ? 'selected' : '' }}>Perempuan
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label for="">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir"
                                    value="{{ old('tempat_lahir', $mahasiswa->tempat_lahir) }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir"
                                    value="{{ old('tgl_lahir', $mahasiswa->tgl_lahir) }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label for="">Agama</label>
                                <input type="text" class="form-control" name="agama"
                                    value="{{ old('agama', $mahasiswa->agama) }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label for="">Alamat</label>
                                <textarea name="alamat" class="form-control" cols="30"
                                    rows="10">{{ $mahasiswa->alamat }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label for="">No. Handphone</label>
                                <input type="text" class="form-control" name="no_hp"
                                    value="{{ old('no_hp', $mahasiswa->no_hp) }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email"
                                    value="{{ old('email', $user->email) }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label for="">Profil Image</label>
                                <input type="file" class="form-control-file" name="avatar">
                                <span class="text-small text-danger font-italic">Max image upload is 1024
                                    kilobytes</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
