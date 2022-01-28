<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserManagementComponent extends Component
{

    public $sorting;
    public $pagesize;
    public $display;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 10;
        $this->display = 1;
    }

    use WithPagination;
    public function render()
    {
        $users =  User::orderBy('created_at','DESC')->paginate($this->pagesize);
        return view('livewire.admin.user-management-component',['users'=>$users])->layout('layouts.dashboard');
    }
}
