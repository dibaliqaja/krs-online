<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Request
     */
    public function index(Request $request)
    {
        $matkul = MataKuliah::latest()->paginate(10);
        $filterKeyword  = $request->get('keyword');
        if ($filterKeyword) {
            $matkul = MataKuliah::where('nama_matkul', 'LIKE', "%$filterKeyword%")->paginate(10);
        }

        return view('data_matkul.index', compact('matkul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dosen = Dosen::all();
        return view('data_matkul.create', compact('dosen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_matkul' => 'required|unique:mata_kuliahs,kode_matkul',
            'nama_matkul' => 'required',
            'sks' => 'required',
            'dosens_id' => 'required'
        ]);

        MataKuliah::create([
            'kode_matkul' => $request->kode_matkul,
            'nama_matkul' => $request->nama_matkul,
            'sks' => $request->sks,
            'dosens_id' => $request->dosens_id
        ]);

        return redirect()->route('mata-kuliah.index')->with('success','Mata Kuliah berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $dosen = Dosen::all();
        $matkul = MataKuliah::findOrFail($id);
        return view('data_matkul.edit', compact('dosen', 'matkul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_matkul' => 'required|unique:mata_kuliahs,kode_matkul,' . $id,
            'nama_matkul' => 'required',
            'sks' => 'required',
            'dosens_id' => 'required'
        ]);

        $matkul = MataKuliah::findOrFail($id);
        $matkul->update([
            'kode_matkul' => $request->kode_matkul,
            'nama_matkul' => $request->nama_matkul,
            'sks' => $request->sks,
            'dosens_id' => $request->dosens_id
        ]);

        return redirect()->route('mata-kuliah.index')->with('success','Mata Kuliah berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        MataKuliah::findOrFail($id)->delete();

        return redirect()->route('mata-kuliah.index')->with('success', 'Mata Kuliah berhasil dihapus.');
    }
}
