<?php

namespace App\Http\Livewire\Admin;

use App\Helpers\Helper;
use App\Models\LoanProduct;
use Illuminate\Http\Request;
use Livewire\Component;

class AddLoanProductComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.add-loan-product-component')->layout('layouts.dashboard');
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'loan_limit' => 'required|numeric',
            'interest_rate' => 'required|numeric',
            'interest_type' => 'required|max:255',
        ]);

        $loan_id= Helper::IDGenerator(new LoanProduct(),'loan_id',4,'L');

        $loanproduct = LoanProduct::create([
            'name' => $request->name,
            'loan_id' => $loan_id,
            'limit' => $request->loan_limit,
            'interest_rate' => $request->interest_rate,
            'interest_type' => $request->interest_type,
        ]);

        session()->flash('message',"Added successfully" );
        return redirect()->route('admin-loanproduct');
    }
}
