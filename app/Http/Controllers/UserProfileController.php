<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function edit()
    {
        return view("profile.edit");
    }

    public function update(Request $request)
    {
        $user = User::where('id_user', auth()->user()->id_user)->first();

        $validation = [
            'npm' => ['required', 'string'],
            'username' => ['required', 'string'],
            'nama_lengkap' => ['required', 'string', 'max:40'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
        ];

        $request->validate($validation);

        $user->update([
            'npm' => $request->npm,
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
        ]);

        return redirect()->route("user.profile.edit");
    }
}
