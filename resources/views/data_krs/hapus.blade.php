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

    <div class="row">
        <div class="col-md-2 m-1">
            <form action="{{ route('krs.hapus') }}">
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
        <div class="col-md-2 m-2">
            <input type="submit" value="Pilih" class="btn btn-primary">
            </form>
        </div>
    </div>
    <br>

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr align="center">
                    <th width="5%">No</th>
                    <th>Kode Matkul</th>
                    <th>Nama Matkul</th>
                    <th>Semester</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($krs as $result => $hasil)
                    <tr align="center">
                        <td>{{ $result + $krs->firstitem() }}</td>
                        <td>{{ $hasil->mata_kuliah->kode_matkul }}</td>
                        <td>{{ $hasil->mata_kuliah->nama_matkul }}</td>
                        <td>{{ $hasil->mata_kuliah->semester }}</td>
                        <td>
                            @if ($hasil->status == "PENGAJUAN")
                                <span class="badge badge-warning">{{ $hasil->status }}</span>
                            @elseif ($hasil->status == "TERIMA")
                                <span class="badge badge-success">{{ $hasil->status }}</span>
                            @endif
                        </td>
                        <td>
                                <a href="" class="btn btn-sm btn-danger m-1" onclick="deleteData({{ $hasil->id }})" data-toggle="modal" data-target="#hapusKRSModal"><i class="fas fa-trash"></i></a>
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
        var url = '{{ route("mahasiswa.krs.destroy", ":id") }}';
        url = url.replace(':id', id);
        $("#deleteForm").attr('action', url);
    }

    function formSubmit() {
        $("#deleteForm").submit();
    }
    </script>
@endsection
