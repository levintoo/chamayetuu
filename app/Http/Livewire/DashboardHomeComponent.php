<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DashboardHomeComponent extends Component
{
    public function render()
    {
        return view('livewire.dashboard-home-component')->layout('layouts.guest');
    }
}
