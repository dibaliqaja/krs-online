@extends('layouts.home')
@section('title_page','Kartu Rencana Studi')
@section('content')

    @if (Session::has('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
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
    <div class="row">
        <div class="col-md-2 m-1">
            <form action="{{ route('mahasiswa.krs') }}">
                <select name="semester" id="semester" class="form-control">
                    <option value="">Semester</option>
                    <option {{ Request::get('semester') == "1" ? "selected" : "" }} value="1">1</option>
                    <option {{ Request::get('semester') == "2" ? "selected" : "" }} value="2">2</option>
                    <option {{ Request::get('semester') == "3" ? "selected" : "" }} value="3">3</option>
                    <option {{ Request::get('semester') == "4" ? "selected" : "" }} value="4">4</option>
                    <option {{ Request::get('semester') == "5" ? "selected" : "" }} value="5">5</option>
                    <option {{ Request::get('semester') == "6" ? "selected" : "" }} value="6">6</option>
                    <option {{ Request::get('semester') == "7" ? "selected" : "" }} value="7">7</option>
                    <option {{ Request::get('semester') == "8" ? "selected" : "" }} value="8">8</option>
                </select>
        </div>
        <div class="col-md-1 m-2">
            <input type="submit" value="Pilih" class="btn btn-primary">
            </form>
        </div>
        <div class="col-md-3 m-2">
            <input class="form-control" value="Kelas {{ Auth::user()->mahasiswa->angkatan->angkatan }}" disabled>
        </div>

        <div class="col-md-5 m-3 float-right">
            <form action="{{ route('mahasiswa.krs.store') }}" method="POST">
                @csrf
                <button class="btn btn-primary float-right" type="submit">Ambil KRS</button>
        </div>
    </div>
    <br>

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr align="middle">
                    <th width="3%">No</th>
                    <th width="10%">Kode Matkul</th>
                    <th width="25%">Nama Matkul</th>
                    <th width="3%">SKS</th>
                    <th width="5%">Semester</th>
                    <th width="2%">Pilih</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($matkul as $result => $hasil)
                    <tr>
                        <td align="center">{{ ++$result }}</td>
                        <td>{{ $hasil->kode_matkul }}</td>
                        <td>{{ $hasil->nama_matkul }}</td>
                        <td align="middle">{{ $hasil->sks }}</td>
                        <td align="middle">{{ $hasil->semester }}</td>
                        <td align="middle">
                            @if (App\KartuRencanaStudi::where('mahasiswa_id', Auth::user()->mahasiswa->id)->where('mata_kuliah_id', $hasil->id)->exists())
                                <input type="checkbox" name="matkul[]" value="{{ $hasil->id }}" disabled>
                            @else
                                <input type="checkbox" name="matkul[]" value="{{ $hasil->id }}">
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Tidak ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        </form>
    </div>

@endsection
