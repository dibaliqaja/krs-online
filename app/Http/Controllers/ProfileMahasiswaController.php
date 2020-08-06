<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileMahasiswaController extends Controller
{
    public function edit(Request $request)
    {
        return view('profile.mahasiswa.edit', [
            'mahasiswa' => $request->user()->mahasiswa,
            'user' => $request->user()
        ]);
    }

    public function update(Request $request)
    {
        $mahasiswa = $request->user()->mahasiswa;
        $user = $request->user();

        $this->validate($request, [
            'npm' => 'required|unique:mahasiswas,npm,' . $mahasiswa->id,
            'name' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'agama' => 'required',
            'alamat' => 'required|min:5',
            'no_hp' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'avatar' => 'image|max:1024',
        ]);

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
                'avatar'      => 'public/uploads/mahasiswa/'.$new_avatar,
            ];

            $user_data = [
                'username' => $request->npm,
                'name' => $request->name,
                'email' => $request->email,
                // 'password' => Hash::make($request->password)
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
            ];

            $user_data = [
                'username' => $request->npm,
                'name' => $request->name,
                'email' => $request->email,
                // 'password' => Hash::make($request->password),
            ];
        }

        $newMahasiswa = Mahasiswa::findOrFail($mahasiswa->id);
        $newUser = User::findOrFail($user->id);

        $newMahasiswa->update($mahasiswa_data);
        $newUser->update($user_data);

        return redirect()->back()->with('success','Profile berhasil diupdate.');
    }

    public function changePassword(Request $request)
    {
        return view('profile.mahasiswa.password', [
            'user' => $request->user()
        ]);
    }

    public function updatePassword(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'current_password'      => 'required',
            'password'              => 'required',
            'password_confirmation' => 'required|same:password'
        ]);

        $plainPassword = $request->get('current_password');

        if (Hash::check($plainPassword, $user->password) == true) {
            $user->password = bcrypt(request('password'));
            $user->save();

            return redirect()->back()->with('success','Password berhasil diupdate.');
        }

        return redirect()->back()->with('error','Password Lama Salah.');

    }
}
