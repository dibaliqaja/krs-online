@extends('layouts.home')
@section('title_page','Data Dosen')
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

    <div class="row">
        <div class="col-md-7">
            <a href="{{ route('dosen.create') }}" class="btn btn-primary">Tambah Data</a><br><br>
        </div>
        <div class="col-md-5">
            <form action="{{ route('dosen.index') }}" class="flex-sm">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Cari berdasarkan Nama" value="{{ Request::get('keyword') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr align="center">
                    <th width="5%">No</th>
                    <th>NIDN</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Program Studi</th>
                    <th width="20%">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dosen as $result => $hasil)
                    <tr>
                        <td>{{ $result + $dosen->firstitem() }}</td>
                        <td>{{ $hasil->nidn }}</td>
                        <td>{{ $hasil->nama }}</td>
                        <td>{{ $hasil->email }}</td>
                        <td>{{ $hasil->program_studi->nama_prodi }}</td>
                        <td align="center">
                            <a href="{{ route('dosen.show', $hasil->id) }}" type="button" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('dosen.edit', $hasil->id) }}" type="button" class="btn btn-sm btn-info"><i class="fas fa-pen"></i></a>
                            <a href="" class="btn btn-sm btn-danger" onclick="deleteData({{ $hasil->id }})" data-toggle="modal" data-target="#hapusDosenModal"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Tidak ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $dosen->links() }}

@endsection

@section('modal')

    <!-- Modal Delete -->
    <div class="modal fade" id="hapusDosenModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="" id="deleteForm" method="post">
                @csrf
                @method('delete')
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="vcenter">Hapus Dosen</h4>
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
        var url = '{{ route("dosen.destroy", ":id") }}';
        url = url.replace(':id', id);
        $("#deleteForm").attr('action', url);
    }

    function formSubmit() {
        $("#deleteForm").submit();
    }
    </script>
@endsection
