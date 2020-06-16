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
            <label for="">Angkatan</label>
            <input type="text" class="form-control" name="angkatan" placeholder="0000 A" value="{{ old('angkatan') }}">
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Tambah</button>
            <a href="{{ route('angkatan.index') }}" class="btn btn-danger">Kembali</a>
        </div>
    </form>

@endsection
