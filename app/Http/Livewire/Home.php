<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Home extends Component
{

    public function render()
    {
        $stocks = Auth::user()->stock()->orderBy('expiration', 'ASC')->get();

        return view('livewire.home', compact('stocks'));
    }
}
