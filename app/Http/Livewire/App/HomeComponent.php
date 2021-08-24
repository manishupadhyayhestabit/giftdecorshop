<?php

namespace App\Http\Livewire\App;

use Livewire\Component;
use Jenssegers\Agent\Agent;

class HomeComponent extends Component
{
    public function render()
    {
        $agent = new Agent();
        if ($agent->isDesktop()) {
            return view('livewire.app.home-component');
        }
        return view('livewire.app.mobile.home-component')->layout('layouts.mobile');
    }
}
