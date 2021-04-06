<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Stock;
use Livewire\Component;

class CreateProduct extends Component
{
    public $open = false;

    public $availableProducts;
    public $name;
    public $imageURL;
    public $expiration;
    protected $rules = [
      'name' => 'required',
    ];

    public function mount(){
        $this->availableProducts = Product::groupBy('name')->pluck('name')->toArray();
    }

    public function render()
    {
        return view('livewire.create-product');
    }

    public function save()
    {

        $this->validate();

        $product = new Product();
        $product->name = ucwords($this->name);
        $product->image = $this->imageURL;
        $product->save();

        $stock = new Stock();
        $stock->product()->associate($product);
        $stock->user()->associate(auth()->user());
        $stock->stock = $this->stock;
        $stock->expiration = $this->expiration;
        $stock->save();
    }
}
