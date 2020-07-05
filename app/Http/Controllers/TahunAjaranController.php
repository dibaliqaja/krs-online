<?php

namespace App\Http\Controllers;

use App\TahunAjaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Request
     */
    public function index(Request $request)
    {
        $tahun_ajaran = TahunAjaran::latest()->paginate(10);
        $filterKeyword  = $request->get('keyword');
        if ($filterKeyword) {
            $tahun_ajaran = TahunAjaran::where('tahun_ajaran', 'LIKE', "%$filterKeyword%")->paginate(10);
        }

        return view('data_tahun_ajaran.index', compact('tahun_ajaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('data_tahun_ajaran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tahun_ajaran' => 'required|min:4|unique:tahun_ajarans,tahun_ajaran'
        ]);

        TahunAjaran::create($request->all());

        return redirect()->route('tahun-ajaran.index')->with('success', 'Tahun ajaran berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TahunAjaran  $tahun_ajaran
     */
    public function edit(TahunAjaran $tahun_ajaran)
    {
        return view('data_tahun_ajaran.edit', compact('tahun_ajaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tahun_ajaran' => 'required|min:4|unique:tahun_ajarans,tahun_ajaran,' . $id
        ]);

        $tahun_ajaran = TahunAjaran::findOrFail($id);
        $tahun_ajaran->update($request->all());

        return redirect()->route('tahun-ajaran.index')->with('success', 'Tahun ajaran berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        TahunAjaran::findOrFail($id)->delete();

        return redirect()->route('tahun-ajaran.index')->with('success', 'Tahun ajaran berhasil dihapus.');
    }
}
