<?php

namespace App\Http\Controllers;

use App\Angkatan;
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data_angkatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'angkatan' => 'required|min:4|unique:angkatans,angkatan'
        ]);

        Angkatan::create($request->all());

        return redirect()->route('angkatan.index')->with('success', 'Angkatan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Angkatan  $angkatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Angkatan $angkatan)
    {
        return view('data_angkatan.edit', compact('angkatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'angkatan' => 'required|min:4|unique:angkatans,angkatan'
        ]);

        $angkatan = Angkatan::findOrFail($id);
        $angkatan->update($request->all());

        return redirect()->route('angkatan.index')->with('success', 'Angkatan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $angkatan = Angkatan::findOrFail($id);
        $angkatan->delete();

        return redirect()->route('angkatan.index')->with('success', 'Angkatan berhasil dihapus.');
    }
}
