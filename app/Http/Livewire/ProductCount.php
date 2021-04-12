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
        $this->emit('alert', [
            'icon' => 'success',
            'iconHtml' => '+',
            'title' => "Se agregó 1 {$this->stock->product->name}",
            'text' => '',
            'background' => '#e6ffe6',
            'html' => "<img class='h-10 w-10 object-cover rounded-full' src='{$this->stock->product->imageURL()}'>",
        ]);
    }

    public function substract()
    {
        $this->stock->stock -= 1;
        $this->stock->save();
        $this->emit('alert', [
            'icon' => 'error',
            'iconHtml' => '-',
            'title' => "Se restó 1 {$this->stock->product->name}",
            'text' => '',
            'background' => '#FEF2F2',
            'html' => "<img class='h-10 w-10 object-cover rounded-full' src='{$this->stock->product->imageURL()}'>",
        ]);
    }
}
