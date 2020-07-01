<?php

namespace App\Http\Controllers;

use App\Angkatan;
use App\Mahasiswa;
use App\ProgramStudi;
use App\Semester;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Request
     */
    public function index(Request $request)
    {
        $mahasiswa = Mahasiswa::latest()->paginate(10);
        $filterKeyword  = $request->get('keyword');
        if ($filterKeyword) {
            $mahasiswa = Mahasiswa::where('nama', 'LIKE', "%$filterKeyword%")->paginate(10);
        }

        return view('data_mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodi = ProgramStudi::all();
        $semester = Semester::all();
        $angkatan = Angkatan::all();
        return view('data_mahasiswa.create', compact('prodi', 'semester', 'angkatan'));
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
            'npm' => 'required|unique:mahasiswas,npm',
            'name' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'agama' => 'required',
            'alamat' => 'required|min:5',
            'no_hp' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
            'avatar' => 'image|max:1024',
            'program_studis_id' => 'required',
            'semesters_id' => 'required',
            'angkatans_id' => 'required'
        ]);

        $user = User::create([
            'username' => $request->npm,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'mahasiswa'
        ]);

        if ($request->has('avatar')) {
            $avatar = $request->avatar;
            $new_avatar = time().'.'.$avatar->getClientOriginalExtension();

            Mahasiswa::create([
                'npm' => $request->npm,
                'name' => $request->name,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'agama' => $request->agama,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'program_studi_id' => $request->program_studis_id,
                'semester_id' => $request->semesters_id,
                'angkatan_id' => $request->angkatans_id,
                'avatar'      => 'public/uploads/mahasiswa/'.$new_avatar,
                'user_id' => $user->id
            ]);

            $avatar->move('public/uploads/mahasiswa/', $new_avatar);
        } else {
            Mahasiswa::create([
                'npm' => $request->npm,
                'name' => $request->name,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'agama' => $request->agama,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'program_studi_id' => $request->program_studis_id,
                'semester_id' => $request->semesters_id,
                'angkatan_id' => $request->angkatans_id,
                'user_id' => $user->id
            ]);
        }

        return redirect()->route('mahasiswa.index')->with('success','Mahasiswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::with('program_studi', 'semester', 'angkatan')->findOrFail($id);
        return view('data_mahasiswa.show', compact('mahasiswa'));
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
        $semester = Semester::all();
        $angkatan = Angkatan::all();
        $mahasiswa = Mahasiswa::with('program_studi', 'semester', 'angkatan')->findOrFail($id);
        return view('data_mahasiswa.edit', compact('prodi', 'semester', 'angkatan', 'mahasiswa'));
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
        $this->validate($request, [
            'npm' => 'required|unique:mahasiswas,npm,' . $id,
            'name' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'agama' => 'required',
            'alamat' => 'required|min:5',
            'no_hp' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
            'avatar' => 'image|max:1024',
            'program_studis_id' => 'required',
            'semesters_id' => 'required',
            'angkatans_id' => 'required'
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $user = User::findOrFail($mahasiswa->user->id);

        if ($request->has('avatar')) {
            $avatar = $request->avatar;
            $new_avatar = time().'.'.$avatar->getClientOriginalExtension();
            $avatar->move('public/uploads/mahasiswa/', $new_avatar);

            $mahasiswa_data = [
                'npm' => $request->npm,
                'name' => $request->name,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'agama' => $request->agama,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'program_studi_id' => $request->program_studis_id,
                'semester_id' => $request->semesters_id,
                'angkatan_id' => $request->angkatans_id,
                'avatar'      => 'public/uploads/mahasiswa/'.$new_avatar,
            ];

            $user_data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];
        } else {
            $mahasiswa_data = [
                'npm' => $request->npm,
                'name' => $request->name,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'agama' => $request->agama,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'program_studi_id' => $request->program_studis_id,
                'semester_id' => $request->semesters_id,
                'angkatan_id' => $request->angkatans_id,
            ];

            $user_data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];
        }

        $mahasiswa->update($mahasiswa_data);
        $user->update($user_data);

        return redirect()->route('mahasiswa.index')->with('success','Mahasiswa berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::with('user')->findOrFail($id);
        $mahasiswa->user->delete();
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
