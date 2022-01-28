<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="page-title">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-4">
                        <div class="page-title-content">
                            <h3>Admin</h3>
                            <p class="mb-2">Welcome to Intez Admin page</p>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="breadcrumbs"><a href="#">Settings </a><span><i
                                    class="ri-arrow-right-s-line"></i></span><a href="#">Profile</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-12 col-xl-12">
            <div class="settings-menu">
                <a href="settings-profile.html">Admin Home</a>
                <a href="{{route('admin-loanproduct')}}">Loan Product</a>
                <a href="settings-security.html">Loan Approval</a>
                <a href="settings-payment-method.html">User Management</a>
                <a href="settings-api.html">Secretary Approval</a>
                <a href="settings-fees.html">Finances</a>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Loans</h4>
                            <div>
                            </div>
                        </div>
                        <div class="card-header">
                                <a href="{{route('new-loan-product')}}" class="btn" style="background-color:transparent"><span class="fs-3" style="color:#1652F0"><i class="ri-add-circle-fill"></i></span></a>
                            <div>
                                <select name="orderby" class="form-select" wire:model="sorting">
                                    <option class="form-select" value="date" selected="selected">Default Sorting</option>
                                    <option value="date1">Newness: Old to New</option>
                                    <option value="limit">Limit: High to Low</option>
                                    <option value="limit2">Limit: Low to High</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="payments-content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check"><input class="form-check-input" type="checkbox" id="flexCheckDefault" value=""></div>
                                            </th>
                                            <th>Loan</th>
                                            <th>Loan ID</th>
                                            <th>Limit</th>
                                            <th>Interest rate</th>
                                            <th>Interest type</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($loans as $loan)
                                            <tr>
                                            <td>
                                                <div class="form-check"><input class="form-check-input" type="checkbox" id="flexCheckDefault" value=""></div>
                                            </td>
                                            <td>{{$loan->name}}</td>
                                            <td>{{$loan->loan_id}}</td>
                                            <td>{{$loan->limit}}</td>
                                            <td>{{$loan->interest_rate}}</td>
                                            <td>{{$loan->interest_type}}</td>
                                            <td>
                                                <a href="" class="btn" style="background-color:transparent"><span class="fs-4 fst-normal" style="color:#1652F0"><i class="ri-edit-line"></i></span></a>
                                                <a class="btn" style="background-color:transparent"><span class="fs-4 fst-normal" style="color:#FF0000FF"><i class="ri-delete-bin-6-line"></i></span></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
