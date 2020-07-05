@extends('layouts.home')
@section('title_page','Data Mahasiswa')
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

    <div>
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">Tambah Data</a><br><br>
    </div>
    <div class="row">
        <div class="col-md-4 mb-2">
            <form action="{{ route('mahasiswa.index') }}" class="flex-sm">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Cari berdasarkan Nama" value="{{ Request::get('keyword') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
        </div>
        <div class="col-md-6 mb-2">
                <select name="angkatan" id="angkatan" class="form-control">
                    <option value="">Angkatan</option>
                    @foreach ($angkatan as $item)
                        <option {{ Request::get('angkatan') == $item->id ? "selected" : "" }} value="{{ $item->id }}">{{ $item->angkatan }} - {{ $item->program_studi->nama_prodi }}</option>
                    @endforeach
                </select>
        </div>
        <div class="col-md-1">
                <div class="mt-1">
                    <input type="submit" value="Filter" class="btn btn-primary">
                </div>
            </form>
        </div>
        <div class="col-md-1">
            <div class="mt-1">
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-info">Reset</a>
            </div>
        </div>
    </div>
    <br>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="10%">No</th>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Program Studi</th>
                    <th>Angkatan</th>
                    <th width="15%">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mahasiswa as $result => $hasil)
                    <tr>
                        <td>{{ $result + $mahasiswa->firstitem() }}</td>
                        <td>{{ $hasil->npm }}</td>
                        <td>{{ $hasil->user->name }}</td>
                        <td>{{ $hasil->angkatan->program_studi->nama_prodi }}</td>
                        <td>{{ $hasil->angkatan->angkatan }}</td>
                        <td>
                            <a href="{{ route('mahasiswa.show', $hasil->id) }}" type="button" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('mahasiswa.edit', $hasil->id) }}" type="button" class="btn btn-sm btn-info"><i class="fas fa-pen"></i></a>
                            <a href="" class="btn btn-sm btn-danger" onclick="deleteData({{ $hasil->id }})" data-toggle="modal" data-target="#hapusMahasiswaModal"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Tidak ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $mahasiswa->links() }}

@endsection

@section('modal')

    <!-- Modal Delete -->
    <div class="modal fade" id="hapusMahasiswaModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="" id="deleteForm" method="post">
                @csrf
                @method('delete')
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="vcenter">Hapus Mahasiswa</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger" onclick="formSubmit()">Hapus</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('script')
    <script>
    function deleteData(id) {
        var id = id;
        var url = '{{ route("mahasiswa.destroy", ":id") }}';
        url = url.replace(':id', id);
        $("#deleteForm").attr('action', url);
    }

    function formSubmit() {
        $("#deleteForm").submit();
    }
    </script>
@endsection
