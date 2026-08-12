<?php

namespace App\Http\Livewire\Admin;
use App\Models\LoanProduct;
use Livewire\Component;

class EditLoanProductComponent extends Component
{
    public $name;
    public $loan_id;
    public $limit;
    public $interest_rate;
    public $interest_type;

    public function mount($loan_id)
    {
        $loan = LoanProduct::where('loan_id',$loan_id)->first();
        $this->loan_id = $loan_id;
        $this->name = $loan->name;
        $this->limit = $loan->limit;
        $this->interest_rate = $loan->interest_rate;
        $this->interest_type = $loan->interest_type;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required|max:255',
            'limit' => 'required|numeric',
            'interest_rate' => 'required|numeric',
            'interest_type' => 'required|max:255',
        ]);
    }

    public function updateProduct()
    {
        $this->validate([
            'name' => 'required|max:255',
            'limit' => 'required|numeric',
            'interest_rate' => 'required|numeric',
            'interest_type' => 'required|max:255',
        ]);

        $product = LoanProduct::where('loan_id',$this->loan_id)->update([
            'name' => $this->name,
            'limit' => $this->limit,
            'interest_rate' => $this->interest_rate,
            'interest_type' => $this->interest_type,
        ]);

        session()->flash('message',"Updated successfully" );
        return redirect()->route('admin-loanproduct');
      }

    public function render()
    {
        return view('livewire.admin.edit-loan-product-component')->layout('layouts.dashboard');
    }
}
