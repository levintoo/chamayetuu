<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;

class BlogComponent extends Component
{
    public function render()
    {
        return view('livewire.home.blog-component')->layout('layouts.base');
    }
}
