<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class TopbarComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.topbar-component')->layout('layouts.admin');
    }
}
