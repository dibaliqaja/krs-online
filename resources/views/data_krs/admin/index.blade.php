@extends('layouts.home')
@section('title_page','Data KRS Mahasiswa')
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
        <div class="col-md-3">
            <form action="{{ route('admin.krs') }}">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" placeholder="NPM Search" value="{{ Request::get('keyword') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-3">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <a href="{{ route('admin.krs') }}" class="nav-link {{ Request::get('status') == NULL && Request::path() == 'kartu-rencana-studi/admin' ? 'active' : '' }}">All</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.krs', ['status' => 'PENGAJUAN']) }}" class="nav-link {{ Request::get('status') == 'PENGAJUAN' ? 'active' : '' }}">Pengajuan</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.krs', ['status' => 'DITERIMA']) }}" class="nav-link {{ Request::get('status') == 'DITERIMA' ? 'active' : '' }}">Diterima</a>
                </li>
            </ul>
        </div><br><br><br>
        <div class="col-md-7">
            <form action="{{ route('admin.krs') }}">
                    <select name="prodi" id="prodi" class="form-control">
                        <option value="">Program Studi</option>
                        @foreach ($program_studi as $item)
                            <option {{ Request::get('prodi') == $item->id ? "selected" : "" }} value="{{ $item->id }}">{{ $item->nama_prodi }}</option>
                        @endforeach
                    </select>
                    <br>
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
                <br>
                    <input type="submit" value="Filter" class="btn btn-primary">
            </form>
        </div>
    </div>
    <br>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NPM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Kode Matkul</th>
                    <th>Nama Matkul</th>
                    <th>Status</th>
                    <th width="13%">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($krs as $result => $hasil)
                    <tr>
                        <td>{{ $result + $krs->firstitem() }}</td>
                        <td>{{ $hasil->npm }}</td>
                        <td>{{ $hasil->name }}</td>
                        <td>{{ $hasil->kode_matkul }}</td>
                        <td>{{ $hasil->nama_matkul }}</td>
                        <td>
                            @if ($hasil->status == "PENGAJUAN")
                                <span class="badge badge-warning">{{ $hasil->status }}</span>
                            @elseif ($hasil->status == "DITERIMA")
                                <span class="badge badge-success">{{ $hasil->status }}</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('admin.krs.update', $hasil->id) }}" method="post">
                                @csrf
                                @if ($hasil->status == "PENGAJUAN")
                                    <button class="btn btn-sm btn-info" type="submit"><i class="fas fa-check"></i></button>
                                    <a href="" class="btn btn-sm btn-danger" onclick="deleteData({{ $hasil->id }})" data-toggle="modal" data-target="#hapusKRSModal"><i class="fas fa-trash"></i></a>
                                @else
                                    <button class="btn btn-sm btn-info" type="submit"><i class="fas fa-window-close"></i></button>
                                    <a href="" class="btn btn-sm btn-danger" onclick="deleteData({{ $hasil->id }})" data-toggle="modal" data-target="#hapusKRSModal"><i class="fas fa-trash"></i></a>
                                @endif
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>Tidak ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        </form>
    </div>
    {{ $krs->links() }}

@endsection

@section('modal')

    <!-- Modal Delete -->
    <div class="modal fade" id="hapusKRSModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="" id="deleteForm" method="post">
                @csrf
                @method('delete')
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="vcenter">Hapus Data</h4>
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
        var url = '{{ route("admin.krs.destroy", ":id") }}';
        url = url.replace(':id', id);
        $("#deleteForm").attr('action', url);
    }

    function formSubmit() {
        $("#deleteForm").submit();
    }
    </script>
@endsection
