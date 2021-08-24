<?php

namespace App\Http\Livewire\App\Product;

use App\Models\Product;
use Livewire\Component;
use Jenssegers\Agent\Agent;

class Cakes extends Component
{
    public $qty = 1;
    public $salePrice;
    public $regularPrice;
    public $productName;
    public $maximumOrder;
    public $minimumOrder;
    public $totalPrice;
    public $pincode;

    public function mount($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $this->salePrice = $product->sale_price;
        $this->regularPrice = $product->regular_price;
        $this->productName = $product->name;
        $this->maximumOrder = $product->maximum_order;
        $this->minimumOrder = $product->minimum_order;
        $this->totalPrice = $product->sale_price * $this->qty;
    }

    public function increment()
    {
        if ($this->qty <= $this->maximumOrder) {
            $this->qty++;
            $this->totalPrice = $this->salePrice * $this->qty;
        }
    }

    public function decrement()
    {
        if ($this->qty >= $this->minimumOrder) {
            $this->qty--;
            $this->totalPrice = $this->salePrice * $this->qty;
        }
    }

    public function render()
    {

        $agent = new Agent();
        if ($agent->isDesktop()) {
            return view('livewire.app.product.cakes');
        }
        return view('livewire.app.mobile.product.cakes')->layout('layouts.mobile');
    }
}
