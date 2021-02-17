<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index($username)
    {
        $user = User::firstWhere('username', $username);
        return view('home',[
            // Esto le manda la variable 'user' a la vista
            'user' => $user,
        ]);
    }
}
