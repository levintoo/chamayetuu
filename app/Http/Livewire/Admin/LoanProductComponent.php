<?php

namespace App\Http\Livewire\Admin;

use App\Helpers\Helper;
use App\Models\LoanProduct;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class LoanProductComponent extends Component
{
    public $sorting;
    public $pagesize;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 10;
    }
    use WithPagination;
    public function render()
    {
        if($this->sorting=='date')
        {
            $loans =  LoanProduct::orderBy('created_at','ASC')->paginate($this->pagesize);
        }
        else if($this->sorting=='date1')
        {
            $loans =  LoanProduct::orderBy('created_at','ASC')->paginate($this->pagesize);
        }
        else if($this->sorting=='limit')
        {
            $loans =  LoanProduct::orderBy('limit','DESC')->paginate($this->pagesize);
        }
        else if($this->sorting=='limit1')
        {
            $loans =  LoanProduct::orderBy('limit','DESC')->paginate($this->pagesize);
        }else{
            $loans =  LoanProduct::orderBy('created_at','DESC')->paginate($this->pagesize);
        }

        return view('livewire.admin.loan-product-component',['loans'=>$loans])->layout('layouts.dashboard');
    }

}
