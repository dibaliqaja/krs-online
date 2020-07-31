<?php

namespace App\Http\Controllers;

use App\Angkatan;
use App\Dosen;
use App\ProgramStudi;
use App\TahunAjaran;
use Illuminate\Http\Request;

class AngkatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Request
     */
    public function index(Request $request)
    {
        $angkatan = Angkatan::latest()->paginate(10);
        $filterKeyword  = $request->get('keyword');
        if ($filterKeyword) {
            $angkatan = Angkatan::where('angkatan', 'LIKE', "%$filterKeyword%")->paginate(10);
        }

        return view('data_angkatan.index', compact('angkatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $prodi = ProgramStudi::all();
        $dosen = Dosen::all();
        $ta = TahunAjaran::all();
        return view('data_angkatan.create', compact('prodi', 'dosen', 'ta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_angkatan' => 'required|min:4|unique:angkatans,kode_angkatan',
            'angkatan' => 'required',
            'program_studi_id' => 'required',
            'dosen_id' => 'required',
            'tahun_ajaran_id' => 'required'
        ]);

        Angkatan::create($request->all());

        return redirect()->route('angkatan.index')->with('success', 'Angkatan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Angkatan  $angkatan
     */
    public function edit($id)
    {
        $prodi = ProgramStudi::all();
        $dosen = Dosen::all();
        $ta = TahunAjaran::all();
        $angkatan = Angkatan::with('program_studi', 'dosen', 'tahun_ajaran')->findOrFail($id);
        return view('data_angkatan.edit', compact('prodi', 'dosen', 'angkatan', 'ta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_angkatan' => 'required|min:4|unique:angkatans,kode_angkatan,' . $id,
            'angkatan' => 'required',
            'program_studi_id' => 'required',
            'dosen_id' => 'required',
            'tahun_ajaran_id' => 'required'
        ]);

        $angkatan = Angkatan::findOrFail($id);
        $angkatan->update($request->all());

        return redirect()->route('angkatan.index')->with('success', 'Angkatan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        Angkatan::findOrFail($id)->delete();

        return redirect()->route('angkatan.index')->with('success', 'Angkatan berhasil dihapus.');
    }
}
