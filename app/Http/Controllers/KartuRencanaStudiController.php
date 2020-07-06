<?php

namespace App\Http\Controllers;

use App\Angkatan;
use App\KartuRencanaStudi;
use App\MataKuliah;
use App\ProgramStudi;
use App\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KartuRencanaStudiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Request
     */
    public function indexMahasiswa(Request $request)
    {
        $prodi = Auth::user()->mahasiswa->angkatan->program_studi->id;
        $tahun_ajaran = TahunAjaran::all();

        $matkul = MataKuliah::with('program_studi')
                ->where('program_studi_id', $prodi)
                ->orderBy('semester', 'asc')
                ->paginate();

        return view('data_krs.index', compact('matkul', 'tahun_ajaran'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Request
     */
    public function indexMahasiswaHasil(Request $request)
    {
        $user = Auth::user()->mahasiswa->angkatan->program_studi->id;
        $semester = $request->get('semester');
        $krs = KartuRencanaStudi::leftJoin('mata_kuliahs', 'mata_kuliahs.id', '=', 'kartu_rencana_studis.mata_kuliah_id')
                    ->where('mahasiswa_id', $user)
                    ->where('semester', $semester)
                    ->paginate(10);

        return view('data_krs.hasil', compact('krs'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Request
     */
    public function indexAdmin(Request $request)
    {
        $angkatan = Angkatan::all();
        $status = $request->get('status');
        $angkatan_m = $request->get('angkatan');
        $keyword = $request->get('keyword') ? $request->get('keyword') : '';

        $krs = DB::table('kartu_rencana_studis')
            ->select('kartu_rencana_studis.id as id', 'mahasiswas.npm as npm', 'mahasiswas.name as name', 'mata_kuliahs.kode_matkul as kode_matkul', 'mata_kuliahs.nama_matkul as nama_matkul', 'kartu_rencana_studis.status as status', 'mahasiswas.angkatan_id as angkatan', 'mata_kuliahs.semester as semester')
            ->leftJoin('mahasiswas', 'mahasiswas.id', '=', 'kartu_rencana_studis.mahasiswa_id')
            ->leftJoin('mata_kuliahs', 'mata_kuliahs.id', '=', 'kartu_rencana_studis.mata_kuliah_id')
            ->where('mahasiswas.npm', "LIKE", "%$keyword%")
            ->paginate(10);

        if ($keyword || $angkatan_m || $status) {
            $krs = DB::table('kartu_rencana_studis')
                ->select('kartu_rencana_studis.id as id', 'mahasiswas.npm as npm', 'mahasiswas.name as name', 'mata_kuliahs.kode_matkul as kode_matkul', 'mata_kuliahs.nama_matkul as nama_matkul', 'kartu_rencana_studis.status as status', 'mahasiswas.angkatan_id as angkatan_id', 'mata_kuliahs.semester as semester')
                ->leftJoin('mahasiswas', 'mahasiswas.id', '=', 'kartu_rencana_studis.mahasiswa_id')
                ->leftJoin('mata_kuliahs', 'mata_kuliahs.id', '=', 'kartu_rencana_studis.mata_kuliah_id')
                ->where('mahasiswas.npm', "LIKE", "%$keyword%")
                ->where('mahasiswas.angkatan_id', $angkatan_m)
                ->where('status', $status)
                ->paginate(10);
        }

        return view('data_krs.admin.index', compact('krs', 'angkatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user()->mahasiswa->id;

        $services = $request->input('matkul');
        $ta = $request->input('tahun_ajaran');

        if ($services == NULL) {
            return redirect()->route('mahasiswa.krs')->with('success', 'Anda belum memilih mata kuliah.');
        } else if ($ta == '') {
            return redirect()->route('mahasiswa.krs')->with('success', 'Anda belum memilih tahun ajaran.');
        } else {
            foreach ($services as $service) {
                KartuRencanaStudi::create([
                    'mahasiswa_id' => $user,
                    'mata_kuliah_id' => $service,
                    'tahun_ajaran_id' => $ta,
                    'status' => 'PENGAJUAN'
                ]);
            }
        }

        return redirect()->route('mahasiswa.krs.hasil')->with('success', 'Data Berhasil Disimpan, Status KRS "Pengajuan"');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $krs = KartuRencanaStudi::findOrFail($id);
        $krs->status = "TERIMA";
        $krs->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $krs = KartuRencanaStudi::findOrFail($id);
        $krs->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
