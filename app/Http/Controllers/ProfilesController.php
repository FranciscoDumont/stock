<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        $follows =  (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postCount = Cache::remember(
            'count.posts.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                $user->posts->count();
            });

        $followersCount = Cache::remember(
            'count.followers.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                $user->profile->followers->count();
            });

        $followingCount = Cache::remember(
            'count.following.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                $user->following->count();
            });


        return view('profiles.index', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user->profile);

        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => 'image',
        ]);

        unset($data['name']);

        if ($request->image){
            $imagenVieja = "/public/" . $user->profile->image;
            Storage::delete($imagenVieja);

            $imagePath = $request->image->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit('1000', '1000');
            $image->save();

            $data = array_merge($data, ['image' => $imagePath]);
        }

        auth()->user()->profile->update($data);

        return redirect("/profile/{$user->username}");
    }
}
