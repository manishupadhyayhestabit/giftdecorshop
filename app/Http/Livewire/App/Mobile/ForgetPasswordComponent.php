<?php

namespace App\Http\Livewire\App\Mobile;

use Livewire\Component;

class ForgetPasswordComponent extends Component
{
    public function render()
    {
        return view('livewire.app.mobile.forget-password-component')->layout('layouts.mobile');
    }
}
