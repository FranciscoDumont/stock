<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductEdit extends Component
{
    public $open = false;
    public $stock;

    public function render()
    {
        return view('livewire.product-edit');
    }

    public function abrir()
    {
        $this->open = true;
    }

    public function close()
    {
        $this->reset(['open']);
    }
}
