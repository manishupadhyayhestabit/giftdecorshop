<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class MenusComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.menus-component')->layout('layouts.admin');
    }
}
