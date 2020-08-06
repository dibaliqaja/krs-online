<?php

namespace App\Http\Controllers;

use App\Angkatan;
use App\KartuRencanaStudi;
use App\MataKuliah;
use App\TahunAjaran;
use Barryvdh\DomPDF\Facade as PDF;
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
                ->get();

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

    public function indexMahasiswaHapus(Request $request)
    {
        $user = Auth::user()->mahasiswa->angkatan->program_studi->id;
        $semester = $request->get('semester');
        $krs = KartuRencanaStudi::leftJoin('mata_kuliahs', 'mata_kuliahs.id', '=', 'kartu_rencana_studis.mata_kuliah_id')
                    ->where('mahasiswa_id', $user)
                    ->where('semester', $semester)
                    ->paginate(10);

        return view('data_krs.hapus', compact('krs'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Request
     */
    public function indexAdmin(Request $request)
    {
        $keyword = $request->get('keyword') ? $request->get('keyword') : '';
        $angkatan_m = $request->get('angkatan');
        $status = $request->get('status');

        // $krs = KartuRencanaStudi::with('mata_kuliah', 'mahasiswa')
        //     ->leftJoin('mahasiswas', 'mahasiswas.id', '=', 'kartu_rencana_studis.mahasiswa_id')
        //     ->leftJoin('angkatans', 'angkatans.id', '=', 'kartu_rencana_studis.mahasiswa_id')
        //     ->where('mahasiswas.npm', "LIKE", "%$keyword%")
        //     ->where('mahasiswas.angkatan_id', $angkatan_m)
        //     ->whereHas('angkatan', function ($query) {
        //         return $query->where('tahun_ajaran_id', 1);
        //     })
        //     ->where('status', $status)
        //     ->paginate(10);

        $angkatan = Angkatan::all();
        $ta = TahunAjaran::all();
        // $tahun_ajaran = $request->get('tahun_ajaran');

        // if ($keyword || $angkatan_m || $status) {
        //     $krs = DB::table('kartu_rencana_studis')
        //         ->select(
        //             'kartu_rencana_studis.id as id',
        //             'mahasiswas.npm as npm',
        //             'mahasiswas.name as name',
        //             'mata_kuliahs.kode_matkul as kode_matkul',
        //             'mata_kuliahs.nama_matkul as nama_matkul',
        //             'kartu_rencana_studis.status as status',
        //             'mahasiswas.angkatan_id as angkatan_id',
        //             'angkatans.tahun_ajaran_id as tahun_ajaran')
        //         ->leftJoin('mahasiswas', 'mahasiswas.id', '=', 'kartu_rencana_studis.mahasiswa_id')
        //         ->leftJoin('mata_kuliahs', 'mata_kuliahs.id', '=', 'kartu_rencana_studis.mata_kuliah_id')
        //         ->where('mahasiswas.npm', "LIKE", "%$keyword%")
        //         ->where('mahasiswas.angkatan_id', $angkatan_m)
        //         ->where('status', $status)
        //         ->paginate(10);
        // }

        $krs = DB::table('kartu_rencana_studis')
            ->select(
                'kartu_rencana_studis.id as id',
                'mahasiswas.npm as npm',
                'mahasiswas.name as name',
                'mata_kuliahs.kode_matkul as kode_matkul',
                'mata_kuliahs.nama_matkul as nama_matkul',
                'kartu_rencana_studis.status as status',
                'angkatans.angkatan as angkatan',
                'program_studis.nama_prodi as nama_prodi',
                'tahun_ajarans.tahun_ajaran as tahun_ajaran')
            ->leftJoin('mahasiswas', 'mahasiswas.id', '=', 'kartu_rencana_studis.mahasiswa_id')
            ->leftJoin('angkatans', 'angkatans.id', '=', 'kartu_rencana_studis.mahasiswa_id')
            ->leftJoin('program_studis', 'program_studis.id', '=', 'kartu_rencana_studis.mahasiswa_id')
            ->crossJoin('tahun_ajarans', 'tahun_ajarans.id', '=', 'kartu_rencana_studis.mahasiswa_id')
            ->leftJoin('mata_kuliahs', 'mata_kuliahs.id', '=', 'kartu_rencana_studis.mata_kuliah_id')
            ->where('mahasiswas.npm', "LIKE", "%$keyword%")
            ->paginate(10);

        return view('data_krs.admin.index', compact('krs', 'angkatan', 'ta'));
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

        if ($services == NULL) {
            return redirect()->route('mahasiswa.krs')->with('success', 'Anda belum memilih mata kuliah.');
        } else {
            foreach ($services as $service) {
                KartuRencanaStudi::create([
                    'mahasiswa_id' => $user,
                    'mata_kuliah_id' => $service,
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

        $krsa = DB::table('kartu_rencana_studis')
            ->where('kartu_rencana_studis.id', $krs->id)
            ->leftJoin('mahasiswas', 'mahasiswas.id', '=', 'kartu_rencana_studis.mahasiswa_id')
            ->leftJoin('mata_kuliahs', 'mata_kuliahs.id', '=', 'kartu_rencana_studis.mata_kuliah_id')
            ->first();

        $user = \App\User::findOrFail($krsa->user_id);
        $details = [
            'body' => "Matkul $krsa->nama_matkul telah diterima oleh Admin",
        ];
        $user->notify(new \App\Notifications\KRSTerima($details));

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

    public function destroyM($id)
    {
        $krs = KartuRencanaStudi::findOrFail($id);
        $krs->delete();

        return redirect()->route('mahasiswa.krs.hasil')->with('success', 'Data berhasil dihapus.');
    }

    public function print()
    {
        $pdf = PDF::loadView('data_krs.print');
        $pdf->setPaper('A4', 'portrait');
        $pdf->setOptions([
                    'isHtml5ParserEnabled' => true,
                    'isRemoteEnabled' => true,
                    'dpi' => 300]);
        return $pdf->stream('a.pdf');
    }
}
