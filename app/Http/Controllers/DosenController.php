<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\ProgramStudi;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Request
     */
    public function index(Request $request)
    {
        $dosen = Dosen::latest()->paginate(10);
        $filterKeyword  = $request->get('keyword');
        if ($filterKeyword) {
            $dosen = Dosen::where('nama', 'LIKE', "%$filterKeyword%")->paginate(10);
        }

        return view('data_dosen.index', compact('dosen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $prodi = ProgramStudi::all();
        return view('data_dosen.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nidn' => 'required|unique:dosens,nidn',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'agama' => 'required',
            'alamat' => 'required|min:5',
            'no_hp' => 'required',
            'email' => 'required|email|unique:dosens,email',
            'program_studi_id' => 'required',
            'avatar' => 'image|max:1024'
        ]);

        if ($request->has('avatar')) {
            $avatar = $request->avatar;
            $new_avatar = time().'.'.$avatar->getClientOriginalExtension();

            Dosen::create([
                'nidn' => $request->nidn,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'agama' => $request->agama,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'email' => $request->email,
                'program_studi_id' => $request->program_studi_id,
                'avatar'      => 'public/uploads/dosen/'.$new_avatar
            ]);

            $avatar->move('public/uploads/dosen/', $new_avatar);
        } else {
            Dosen::create([
                'nidn' => $request->nidn,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'agama' => $request->agama,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'email' => $request->email,
                'program_studi_id' => $request->program_studi_id
            ]);
        }

        return redirect()->route('dosen.index')->with('success','Dosen berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('data_dosen.show', compact('dosen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prodi = ProgramStudi::all();
        $dosen = Dosen::with('program_studi')->findOrFail($id);
        return view('data_dosen.edit', compact('dosen', 'prodi'));
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
            'nidn' => 'required|unique:dosens,nidn,' . $id,
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'agama' => 'required',
            'alamat' => 'required|min:5',
            'no_hp' => 'required',
            'email' => 'required|email|unique:dosens,email,' . $id,
            'program_studi_id' => 'required',
            'avatar' => 'image|max:1024'
        ]);

        $dosen = Dosen::findOrFail($id);

        if ($request->has('avatar')) {
            $avatar = $request->avatar;
            $new_avatar = time().'.'.$avatar->getClientOriginalExtension();
            $avatar->move('public/uploads/dosen/', $new_avatar);

            $dosen_data = [
                'nidn' => $request->nidn,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'agama' => $request->agama,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'email' => $request->email,
                'program_studi_id' => $request->program_studi_id,
                'avatar'      => 'public/uploads/dosen/'.$new_avatar,
            ];
        } else {
            $dosen_data = [
                'nidn' => $request->nidn,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'agama' => $request->agama,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'email' => $request->email,
                'program_studi_id' => $request->program_studi_id
            ];
        }

        $dosen->update($dosen_data);

        return redirect()->route('dosen.index')->with('success','Dosen berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        Dosen::findOrFail($id)->delete();

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil dihapus.');
    }
}
