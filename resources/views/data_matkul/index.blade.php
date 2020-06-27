@extends('layouts.home')
@section('title_page','Data Mata Kuliah')
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

    <div class="d-flex justify-content-between">
        <div>
            <a href="{{ route('mata-kuliah.create') }}" class="btn btn-primary">Tambah Data</a>
        </div>
        <form action="{{ route('mata-kuliah.index') }}">
            <div class="input-group">
                <input type="text" name="keyword" class="form-control" placeholder="Search" value="{{ Request::get('keyword') }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <br>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="3%">No</th>
                    <th width="10%">Kode Matkul</th>
                    <th>Nama Matkul</th>
                    <th width="3%">SKS</th>
                    <th width="7%">Semester</th>
                    <th>Pengajar</th>
                    <th>Program Studi</th>
                    <th width="15%">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($matkul as $result => $hasil)
                    <tr>
                        <td>{{ $result + $matkul->firstitem() }}</td>
                        <td>{{ $hasil->kode_matkul }}</td>
                        <td>{{ $hasil->nama_matkul }}</td>
                        <td>{{ $hasil->sks }}</td>
                        <td>{{ $hasil->semester }}</td>
                        <td>{{ $hasil->dosen->nama }}</td>
                        <td>{{ $hasil->program_studi->nama_prodi }}</td>
                        <td>
                            <a href="{{ route('mata-kuliah.edit', $hasil->id) }}" type="button" class="btn btn-sm btn-info"><i class="fas fa-pen"></i></a>
                            <a href="" class="btn btn-sm btn-danger" onclick="deleteData({{ $hasil->id }})" data-toggle="modal" data-target="#hapusMatkulModal"><i class="fas fa-trash"></i></a>
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
    {{ $matkul->links() }}

@endsection

@section('modal')

    <!-- Modal Delete -->
    <div class="modal fade" id="hapusMatkulModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="" id="deleteForm" method="post">
                @csrf
                @method('delete')
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="vcenter">Hapus Mata Kuliah</h4>
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
        var url = '{{ route("mata-kuliah.destroy", ":id") }}';
        url = url.replace(':id', id);
        $("#deleteForm").attr('action', url);
    }

    function formSubmit() {
        $("#deleteForm").submit();
    }
    </script>
@endsection
