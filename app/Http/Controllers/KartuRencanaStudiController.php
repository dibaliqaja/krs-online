<?php

namespace App\Http\Controllers;

use App\KartuRencanaStudi;
use App\MataKuliah;
use Illuminate\Http\Request;
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
        $matkul = MataKuliah::latest()->paginate(10);
        $filterKeyword  = $request->get('keyword');
        if ($filterKeyword) {
            $matkul = MataKuliah::where('nama_matkul', 'LIKE', "%$filterKeyword%")->paginate(10);
        }

        return view('data_krs.index', compact('matkul'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Request
     */
    public function indexAdmin(Request $request)
    {
        $status = $request->get('status');
        $keyword = $request->get('keyword') ? $request->get('keyword') : '';

        if ($status) {
            $krs = DB::table('kartu_rencana_studis')
                    ->select('kartu_rencana_studis.id as id', 'mahasiswas.npm as npm', 'mahasiswas.name as name', 'mata_kuliahs.kode_matkul as kode_matkul', 'mata_kuliahs.nama_matkul as nama_matkul', 'status')
                    ->leftJoin('mahasiswas', 'mahasiswas.id', '=', 'kartu_rencana_studis.mahasiswa_id')
                    ->leftJoin('mata_kuliahs', 'mata_kuliahs.id', '=', 'kartu_rencana_studis.mata_kuliah_id')
                    ->where('name', "LIKE", "%$keyword%")->where('status', $status)->paginate(10);
        } else {
            $krs = DB::table('kartu_rencana_studis')
                    ->select('kartu_rencana_studis.id as id', 'mahasiswas.npm as npm', 'mahasiswas.name as name', 'mata_kuliahs.kode_matkul as kode_matkul', 'mata_kuliahs.nama_matkul as nama_matkul', 'status')
                    ->leftJoin('mahasiswas', 'mahasiswas.id', '=', 'kartu_rencana_studis.mahasiswa_id')
                    ->leftJoin('mata_kuliahs', 'mata_kuliahs.id', '=', 'kartu_rencana_studis.mata_kuliah_id')
                    ->where('name', "LIKE", "%$keyword%")->paginate(10);
        }

        return view('data_krs.admin.index', compact('krs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $services = $request->input('matkul');
        foreach($services as $service){
            KartuRencanaStudi::create([
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => $service,
                'status' => 'pengajuan'
            ]);
        }

        return "Berhasil";
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
    public function update(Request $request, $id)
    {
        $krs = KartuRencanaStudi::findOrFail($id);
        if ($krs->status == "PENGAJUAN") {
            $krs->status = "DITERIMA";
        } else {
            $krs->status = "PENGAJUAN";
        }
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
        //
    }
}
