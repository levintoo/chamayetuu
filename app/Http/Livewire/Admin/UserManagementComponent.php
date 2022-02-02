<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class UserManagementComponent extends Component
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
            $users =  User::where('email',$this->filter)->orderBy('created_at','DESC')->paginate($this->pagesize);
        }else{
            $users =  User::orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        return view('livewire.admin.user-management-component',['users'=>$users])->layout('layouts.dashboard');
    }

    public function promoteUser(Request $request)
    {
        $user = User::select('user_id','utype','name')->where('user_id', $request->user_id)->first();
        if($user->utype == 'USR'){
            User::where('user_id',$user->user_id)->update([
                'utype' => 'SEC',
            ]);
            session()->flash('message',$user->name.' is now and a secretary' );
        }elseif ($user->utype == 'SEC'){
            User::where('user_id',$user->user_id)->update([
                'utype' => 'ADM',
            ]);
            session()->flash('message',$user->name.' is now and an admin' );

        }else{
            session()->flash('message',$user->name.' is already an admin' );
        }
        return redirect()->back();
    }

    public function demoteUser(Request $request)
    {
        $user = User::select('user_id','utype','name')->where('user_id', $request->user_id)->first();
        if($user->utype == 'ADM'){
            User::where('user_id',$user->user_id)->update([
                'utype' => 'SEC',
            ]);
            session()->flash('message',$user->name.' is now a secretary' );
        }elseif ($user->utype == 'SEC'){
            User::where('user_id',$user->user_id)->update([
                'utype' => 'USR',
            ]);
            session()->flash('message',$user->name.' is now standard user' );

        }else{
            session()->flash('message',$user->name.' is a standard user' );
        }
        return redirect()->back();
    }
}
