@extends('layouts.home')
@section('title_page','Edit Angkatan')
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

    <form action="{{ route('angkatan.update', $angkatan->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="">Angkatan</label>
            <input type="text" class="form-control" name="angkatan" value="{{ $angkatan->angkatan }}">
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Update</button>
            <a href="{{ route('angkatan.index') }}" class="btn btn-danger">Kembali</a>
        </div>
    </form>

@endsection
