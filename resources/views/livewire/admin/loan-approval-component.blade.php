<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="page-title">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-4">
                        <div class="page-title-content">
                            <h3>loans</h3>
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
                <a href="{{route('admin-settings')}}">Admin Home</a>
                <a href="{{route('admin-loanproduct')}}">Loan Product</a>
                <a href="{{route('loan.approval')}}">Loan Approval</a>
                <a href="{{route('user.management')}}">User Management</a>
                <a href="{{route('secretary.approval')}}">Secretary Approval</a>
                <a href="settings-fees.html">Finances</a>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">unapproved loans</h4>
                            <div>
                            </div>
                        </div>
                        <div class="card-header">
                            <a href="" class="btn" style="background-color:transparent"><span class="fs-3" style="color:#1652F0"><i class="ri-add-circle-fill"></i></span></a>
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
                                            <th>Name</th>
                                            <th>Sec ID</th>
                                            <th>National ID</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="flexCheckDefault" value=""></div>
                                                </td>
                                                <td>Name</td>
                                                <td>boom</td>
                                                <td>bow</td>
                                                <td>
                                                    <a href="" class="btn" style="background-color:transparent"><span class="fs-4 fst-normal" style="color:#1652F0"><i class="ri-edit-line"></i></span></a>
                                                    <a class="btn" style="background-color:transparent"><span class="fs-4 fst-normal" style="color:#FF0000FF"><i class="ri-delete-bin-6-line"></i></span></a>
                                                </td>
                                                </td>
                                            </tr>
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
