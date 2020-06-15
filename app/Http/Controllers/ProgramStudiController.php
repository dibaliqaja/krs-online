<?php

namespace App\Http\Controllers;

use App\ProgramStudi;
use Illuminate\Http\Request;

class ProgramStudiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Request
     */
    public function index(Request $request)
    {
        $program_studi = ProgramStudi::latest()->paginate(10);
        $filterKeyword  = $request->get('keyword');
        if ($filterKeyword) {
            $program_studi = ProgramStudi::where('nama_prodi', 'LIKE', "%$filterKeyword%")->paginate(10);
        }

        return view('data_prodi.index', compact('program_studi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('data_prodi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_prodi' => 'required|min:2|unique:program_studis,kode_prodi',
            'nama_prodi' => 'required|min:5'
        ]);

        ProgramStudi::create($request->all());

        return redirect()->route('program-studi.index')->with('success', 'Program Studi berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProgramStudi  $program_studi
     */
    public function edit(ProgramStudi $program_studi)
    {
        return view('data_prodi.edit', compact('program_studi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_prodi' => 'required|min:2|unique:program_studis,kode_prodi,' . $id,
            'nama_prodi' => 'required|min:5'
        ]);

        $program_studi = ProgramStudi::findOrFail($id);
        $program_studi->update($request->all());

        return redirect()->route('program-studi.index')->with('success', 'Program Studi berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        ProgramStudi::findOrFail($id)->delete();

        return redirect()->route('program-studi.index')->with('success', 'Program Studi berhasil dihapus.');
    }
}
