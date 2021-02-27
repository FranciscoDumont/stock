<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        return view('profiles.index',[
            // Esto le manda la variable 'user' a la vista
            'user' => $user,
        ]);
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', ['user' => $user]);
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => 'image',
        ]);

        unset($data['name']);

        auth()->user()->profile->update($data);

        return redirect("/profile/{$user->username}");
    }
}
