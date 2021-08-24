<?php

namespace App\Http\Livewire\App;

use Jenssegers\Agent\Agent;
use Livewire\Component;

class MobileMenuComponent extends Component
{
    public function render()
    {
        $agent = new Agent();
        return view('livewire.app.mobile-menu-component', ['agent' => $agent]);
    }
}
