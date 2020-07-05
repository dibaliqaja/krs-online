@extends('layouts.home')
@section('title_page','Data Tahun Ajaran')
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
        <div class="col-md-8">
            <a href="{{ route('tahun-ajaran.create') }}" class="btn btn-primary">Tambah Data</a><br><br>
        </div>
        <div class="col-md-4">
            <form action="{{ route('tahun-ajaran.index') }}" class="flex-sm">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Cari berdasarkan Tahun Ajaran" value="{{ Request::get('keyword') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="10%">No</th>
                    <th>Tahun Ajaran</th>
                    <th width="15%">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tahun_ajaran as $result => $hasil)
                    <tr>
                        <td>{{ $result + $tahun_ajaran->firstitem() }}</td>
                        <td>{{ $hasil->tahun_ajaran }}</td>
                        <td>
                            <a href="{{ route('tahun-ajaran.edit', $hasil->id) }}" type="button" class="btn btn-sm btn-info"><i class="fas fa-pen"></i></a>
                            <a href="" class="btn btn-sm btn-danger" onclick="deleteData({{ $hasil->id }})" data-toggle="modal" data-target="#hapusTAModal"><i class="fas fa-trash"></i></a>
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
    {{ $tahun_ajaran->links() }}

@endsection

@section('modal')

    <!-- Modal Delete -->
    <div class="modal fade" id="hapusTAModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="" id="deleteForm" method="post">
                @csrf
                @method('delete')
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="vcenter">Hapus Tahun Ajaran</h4>
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
        var url = '{{ route("tahun-ajaran.destroy", ":id") }}';
        url = url.replace(':id', id);
        $("#deleteForm").attr('action', url);
    }

    function formSubmit() {
        $("#deleteForm").submit();
    }
    </script>
@endsection
