<?php

namespace App\Http\Livewire\App;

use Livewire\Component;
use Jenssegers\Agent\Agent;

class SearchComponent extends Component
{
    public function render()
    {
        $agent = new Agent();
        if ($agent->isDesktop()) {
            return view('livewire.app.search-component');
        }
        return view('livewire.app.mobile.search-component')->layout('layouts.mobile');
    }
}
