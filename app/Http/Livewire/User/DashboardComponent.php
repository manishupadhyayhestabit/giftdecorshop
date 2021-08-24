<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;
use Livewire\Component;


class DashboardComponent extends Component
{
    public function render()
    {

        $user = User::find(Auth()->user()->id);
        $agent = new Agent();
        if ($agent->isDesktop()) {
            return view('livewire.user.dashboard-component', ['user' => $user]);
        }
        return view('livewire.app.mobile.dashboard-component', ['user' => $user])->layout('layouts.mobile');
    }
}
