<?php

namespace App\Http\Livewire\App;

use Livewire\Component;
use Jenssegers\Agent\Agent;

class ShopComponent extends Component
{
    public function render()
    {
        $agent = new Agent();
        if ($agent->isDesktop()) {
            return view('livewire.app.shop-component');
        }
        return view('livewire.app.mobile.shop-component')->layout('layouts.mobile');
    }
}
