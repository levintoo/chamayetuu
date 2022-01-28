<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class SecretaryApprovalComponent extends Component
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
        $secretary =  User::where('utype','SEC')->orderBy('created_at','DESC')->paginate($this->pagesize);
        return view('livewire.admin.secretary-approval-component',['secretary'=>$secretary])->layout('layouts.dashboard');
    }
}
