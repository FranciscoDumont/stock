<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateProduct extends Component
{
    public $open = false;

    public $availableProducts, $merge = false;

    public $name;
    public $imageURL;

    public $expiration, $stock = 1; // Stock

    public $product;
    public $stockExists = false;

    protected $rules = [
      'name' => 'required',
    ];

    public function mount(){
        $this->availableProducts = Product::groupBy('name')->pluck('name')->toArray();
    }

    public function updatedName(){
        $this->product = Product::where('name', $this->name)->first();

        if($this->product){
            $this->imageURL = $this->product->image;
            $this->stockExists = Auth::user()->hasProduct($this->product);
        } else {
            $this->stockExists = false;
        }
    }

    public function render()
    {
        return view('livewire.create-product');
    }

    public function save()
    {
        $this->validate();

        // Si no existia el producto, lo crea
        if (!$this->product){
            $product = new Product();
            $product->name = ucwords($this->name);
            $product->image = $this->imageURL;
            $product->save();
            $this->product = $product;
        }

        // Si estaba la opcion de merge solo se suma el stock
        if ($this->merge){
            $stock = Auth::user()->stock()->where('product_id', $this->product->id)->first();
            $stock->stock += $this->stock;
        } else {
            $stock = new Stock();
            $stock->product()->associate($this->product);
            $stock->user()->associate(auth()->user());
            $stock->stock = $this->stock;
        }
        $stock->expiration = $this->expiration;
        $stock->save();

        $this->reset(['merge', 'name', 'expiration', 'stock', 'product', 'stockExists']);

        $this->emitTo('home', 'render');
        $this->emit('alert', 'Se cargó el producto 🍾🎊🥂');
    }

    public function close()
    {
        $this->reset(['open', 'merge', 'name', 'expiration', 'stock', 'product', 'stockExists']);
    }
}
