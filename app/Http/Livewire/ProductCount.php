<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductCount extends Component
{
    public $stock;

    public function render()
    {
        return view('livewire.product-count');
    }

    public function add()
    {
        $this->stock->stock += 1;
        $this->stock->save();
        $this->emit('alert', "Se agregó un {$this->stock->product->name}");
    }

    public function substract()
    {
        $this->stock->stock -= 1;
        $this->stock->save();
        $this->emit('alert', [
            'type' => 'success',
            'title' => "Se restó un {$this->stock->product->name}",
            'text' => '',
        ]);
    }
}
