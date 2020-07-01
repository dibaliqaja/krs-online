<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileAdminController extends Controller
{
    public function edit(Request $request)
    {
        return view('profile.admin.edit', [
            'user' => $request->user()
        ]);
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $this->validate($request, [
            'username' => 'required|unique:users,username,' . $user->id,
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
            'avatar' => 'image|max:1024',
        ]);

        if ($request->has('avatar')) {
            $avatar = $request->avatar;
            $new_avatar = time().'.'.$avatar->getClientOriginalExtension();
            $avatar->move('public/uploads/admin/', $new_avatar);

            $user_data = [
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'avatar'   => 'public/uploads/admin/'.$new_avatar,
            ];
        } else {
            $user_data = [
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];
        }

        $newUser = User::findOrFail($user->id);
        $newUser->update($user_data);

        return redirect()->back()->with('success','Profile berhasil diupdate.');
    }
}
