<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Home extends Component
{

    public $search;

    public function render()
    {
        $stocks = Auth::user()
            ->stock()
            ->whereHas('product', function (Builder $query) {
                $query->where('name', 'like', "%{$this->search}%");
            })
            ->orWhere('expiration', 'like', "%{$this->search}%")
            ->orderBy('expiration', 'ASC')->get();

        return view('livewire.home', compact('stocks'));
    }
}
