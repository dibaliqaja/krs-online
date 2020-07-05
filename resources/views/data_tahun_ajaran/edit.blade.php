@extends('layouts.home')
@section('title_page','Edit Tahun Ajaran')
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

    <form action="{{ route('tahun-ajaran.update', $tahun_ajaran->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="">Tahun Ajaran</label>
            <input type="text" class="form-control" name="tahun_ajaran" value="{{ old('tahun_ajaran', $tahun_ajaran->tahun_ajaran) }}">
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Update</button>
            <a href="{{ route('tahun-ajaran.index') }}" class="btn btn-danger">Kembali</a>
        </div>
    </form>

@endsection
