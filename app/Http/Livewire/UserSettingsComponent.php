<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserSettingsComponent extends Component
{
    public function render()
    {
        return view('livewire.user-settings-component')->layout('layouts.dashboard');
    }
}
