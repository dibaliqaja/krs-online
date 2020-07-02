@extends('layouts.home')
@section('title_page','Kartu Rencana Studi')
@section('content')

    @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="row">
        <div class="col-md-2 m-1">
            <form action="{{ route('mahasiswa.krs.hasil') }}">
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
        <div class="m-2">
            <input type="submit" value="Filter" class="btn btn-primary">
            </form>
        </div>

        <div class="m-2 pl-5">
            <form action="{{ route('mahasiswa.krs.delete') }}" method="POST">
                @csrf
                <button class="btn btn-primary" type="submit">Hapus KRS</button>
            </form>
        </div>

        <div class="m-2">
            <form action="{{ route('mahasiswa.krs.delete') }}" method="POST">
                @csrf
                <button class="btn btn-primary" type="submit">Cetak KRS</button>
            </form>
        </div>
    </div>
    <br>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Kode Matkul</th>
                    <th>Nama Matkul</th>
                    <th>Semester</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($krs as $result => $hasil)
                    <tr>
                        <td>{{ $result + $krs->firstitem() }}</td>
                        <td>{{ $hasil->mata_kuliah->kode_matkul }}</td>
                        <td>{{ $hasil->mata_kuliah->nama_matkul }}</td>
                        <td>{{ $hasil->mata_kuliah->semester }}</td>
                        <td>
                            @if ($hasil->status == "PENGAJUAN")
                                <span class="badge badge-warning">{{ $hasil->status }}</span>
                            @elseif ($hasil->status == "DITERIMA")
                                <span class="badge badge-success">{{ $hasil->status }}</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Tidak ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        </form>
    </div>
    {{ $krs->links() }}

@endsection
