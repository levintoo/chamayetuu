<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class LoanApprovalComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.loan-approval-component')->layout('layouts.dashboard');
    }
}
