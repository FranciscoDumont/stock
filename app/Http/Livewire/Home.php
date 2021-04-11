<?php

namespace App\Http\Livewire;

use App\Models\Stock;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Home extends Component
{

    public $search;
    public $sort = 'expiration';
    public $direction = 'ASC';

    protected $listeners = ['render'];

    public function render()
    {
        $stocks = Stock::where('user_id', Auth::user()->id)
            ->join('products', 'stocks.product_id', '=', 'products.id')
            ->where('products.name', 'like', "%{$this->search}%")
            ->orWhere('expiration', 'like', "%{$this->search}%")
            ->orderBy($this->sort, $this->direction)
            ->select('stocks.*')
            ->get();

        return view('livewire.home', compact('stocks'));
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            // Toggle direction
            $this->direction = ($this->direction == 'ASC') ? 'DESC' : 'ASC';
        } else {
            // Change sort and reset direction
            $this->sort = $sort;
            $this->direction = 'ASC';
        }
    }
}
