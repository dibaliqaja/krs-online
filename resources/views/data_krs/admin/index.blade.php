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
        <div class="col-md-4 mb-2">
            <form action="{{ route('admin.krs') }}">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Cari berdasarkan NPM" value="{{ Request::get('keyword') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-2">
            <select name="angkatan" id="angkatan" class="form-control select2">
                <option value="">Angkatan</option>
                @foreach ($angkatan as $item)
                    <option {{ Request::get('angkatan') == $item->id ? "selected" : "" }} value="{{ $item->id }}">{{ $item->angkatan }} - {{ $item->program_studi->nama_prodi }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4 mb-2">
            <select name="tahun_ajaran" id="tahun_ajaran" class="form-control select2">
                <option value="">Tahun Ajaran</option>
                @foreach ($ta as $item)
                    <option {{ Request::get('tahun_ajaran') == $item->id ? "selected" : "" }} value="{{ $item->id }}">{{ $item->tahun_ajaran }}</option>
                @endforeach
            </select>
        </div>
        <div class="col md-2">
                <select name="status" id="status" class="form-control select2">
                    <option value="">Status</option>
                    <option {{ Request::get('status') == "PENGAJUAN" ? "selected" : "" }} value="PENGAJUAN">PENGAJUAN</option>
                    <option {{ Request::get('status') == "TERIMA" ? "selected" : "" }} value="TERIMA">TERIMA</option>
                </select>
        </div>
        <div class="col-md-1">
                <div class="mt-1">
                    <input type="submit" value="Filter" class="btn btn-primary">
                </div>
            </form>
        </div>
        </form>
        <div class="col-md-1">
            <div class="mt-1">
                <a href="{{ route('admin.krs') }}" class="btn btn-info">Reset</a>
            </div>
        </div>
    </div>
    <br>

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr align="center">
                    <th width="5%">No</th>
                    <th width="10%">NPM</th>
                    <th width="13%">Nama Mahasiswa</th>
                    <th width="7%">Kode Matkul</th>
                    <th width="13%">Nama Matkul</th>
                    <th width="7%">Angkatan</th>
                    <th width="5%">Program Studi</th>
                    <th width="10%">Tahun Ajaran</th>
                    <th width="10%">Status</th>
                    <th width="20%">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($krs as $result => $hasil)
                    <tr align="center">
                        <td>{{ $result + $krs->firstitem() }}</td>
                        <td>{{ $hasil->npm }}</td>
                        <td>{{ $hasil->name }}</td>
                        <td>{{ $hasil->kode_matkul }}</td>
                        <td>{{ $hasil->nama_matkul }}</td>
                        <td>{{ $hasil->angkatan }}</td>
                        <td>{{ $hasil->nama_prodi }}</td>
                        <td>{{ $hasil->tahun_ajaran }}</td>
                        <td>
                            @if ($hasil->status == "PENGAJUAN")
                                <span class="badge badge-warning">{{ $hasil->status }}</span>
                            @elseif ($hasil->status == "TERIMA")
                                <span class="badge badge-success">{{ $hasil->status }}</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('admin.krs.update', $hasil->id) }}" method="post">
                                @csrf
                                @if ($hasil->status == "PENGAJUAN")
                                    <button class="btn btn-sm btn-info m-1" type="submit"><i class="fas fa-check"></i></button>
                                    <a href="" class="btn btn-sm btn-danger m-1" onclick="deleteData({{ $hasil->id }})" data-toggle="modal" data-target="#hapusKRSModal"><i class="fas fa-trash"></i></a>
                                @else
                                    <a href="" class="btn btn-sm btn-danger m-1" onclick="deleteData({{ $hasil->id }})" data-toggle="modal" data-target="#hapusKRSModal"><i class="fas fa-trash"></i></a>
                                @endif
                            </form>
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
