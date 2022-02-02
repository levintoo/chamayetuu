<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class SecretaryApprovalComponent extends Component
{

    public $sorting;
    public $filter;
    public $pagesize;
    public $display;

    public function mount()
    {
        $this->sorting = "default";
        $this->filter = "";
        $this->pagesize = 10;
        $this->display = 1;
    }

    use WithPagination;
    public function render()
    {
        if($this->filter != ""){
            $users =  User::where([['email',$this->filter] , ['utype','SEC']])->orderBy('created_at','DESC')->paginate($this->pagesize);
        }else{
            $users =  User::where('utype','SEC')->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        return view('livewire.admin.secretary-approval-component',['users'=>$users])->layout('layouts.dashboard');
    }
}
