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

    <div>
        <a href="{{ route('mata-kuliah.create') }}" class="btn btn-primary">Tambah Data</a><br><br>
    </div>
    <div class="row">
        <div class="col-md-5 mb-2">
            <form action="{{ route('mata-kuliah.index') }}" class="flex-sm">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Cari berdasarkan Nama Matkul" value="{{ Request::get('keyword') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
        </div>
        <div class="col-md-3 mb-2">
            <select name="prodi" id="prodi" class="form-control">
                <option value="">Program Studi</option>
                @foreach ($program_studi as $item)
                    <option {{ Request::get('prodi') == $item->id ? "selected" : "" }} value="{{ $item->id }}">{{ $item->nama_prodi }}</option>
                @endforeach
            </select>
        </div>
        <div class="col md-2 mb-2">
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
        <div class="col-md-1">
            <div class="mt-1">
                <input type="submit" value="Filter" class="btn btn-primary">
            </div>
            </form>
        </div>
        <div class="col-md-1">
            <div class="mt-1">
                <a href="{{ route('mata-kuliah.index') }}" class="btn btn-info">Reset</a>
            </div>
        </div>
    </div>
    <br>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="3%">No</th>
                    <th width="10%">Kode Matkul</th>
                    <th width="15%">Nama Matkul</th>
                    <th width="3%">SKS</th>
                    <th width="5%">Semester</th>
                    <th>Pengajar</th>
                    <th>Program Studi</th>
                    <th width="13%">Action</th>
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
