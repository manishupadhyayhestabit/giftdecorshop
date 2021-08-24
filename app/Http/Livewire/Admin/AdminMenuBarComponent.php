<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminMenuBarComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-menu-bar-component')->layout('layouts.admin');
    }
}
