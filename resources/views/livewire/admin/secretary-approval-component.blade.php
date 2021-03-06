<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="page-title">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-4">
                        <div class="page-title-content">
                            <h3>Secretaries</h3>
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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">sec</h4>
                            <div>
                            </div>
                        </div>
                        <div class="card-header">
						 <a href="{{route('register.admin')}}" class="btn" style="background-color:transparent"><span class="fs-3" style="color:#1652F0" data-bs-toggle="tooltip" data-bs-placement="top" title="Add admin"><i class="ri-add-circle-fill"></i></span></a>
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
                                            <th>User ID</th>
                                            <th>Role</th>
                                            <th>National ID</th>
                                            <th>Email</th>
                                            <th>Utype</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>
                                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="flexCheckDefault" value=""></div>
                                                </td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->user_id}}</td>
                                                <td>{{$user->utype}}</td>
                                                <td>{{$user->national_id}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->utype}}</td>
                                                <td>
                                                    <form id="reset-form.{{$user->user_id}}" method="POST" action="{{ route('admin.password.email') }}">
                                                        @csrf
                                                        <input type="hidden" class="form-control" name="email" value="{{$user->email}}" >
                                                    </form>
                                                    <form id="promote-form.{{$user->user_id}}" method="POST" action="{{ route('user.promote') }}">
                                                        @csrf
                                                        <input type="hidden" class="form-control" name="user_id" value="{{$user->user_id}}" >
                                                    </form>
                                                    <form id="demote-form.{{$user->user_id}}" method="POST" action="{{ route('user.demote') }}">
                                                        @csrf
                                                        <input type="hidden" class="form-control" name="user_id" value="{{$user->user_id}}" >
                                                    </form>
                                                    <button type="submit" form="reset-form.{{$user->user_id}}" class="btn" style="background-color:transparent" data-bs-toggle="tooltip" data-bs-placement="top" title="Request reset password"><span class="fs-4 fst-normal" style="color:#1652F0"><i class="ri-lock-unlock-line"></i></span></button>
                                                    <button type="submit" form="promote-form.{{$user->user_id}}" class="btn" style="background-color:transparent" data-bs-toggle="tooltip" data-bs-placement="top" title="Promote user"><span class="fs-4 fst-normal" style="color:green"><i class="ri-arrow-up-s-fill"></i></span></button>
                                                    <button type="submit" form="demote-form.{{$user->user_id}}" class="btn" style="background-color:transparent" data-bs-toggle="tooltip" data-bs-placement="top" title="Demote secretary"><span class="fs-4 fst-normal" style="color:red"><i class="ri-arrow-down-s-fill"></i></span></button>
                                                    <a class="btn" style="background-color:transparent" data-bs-toggle="tooltip" data-bs-placement="top" title="Terminate user"><span class="fs-4 fst-normal" style="color:#FF0000FF"><i class="ri-delete-bin-6-line"></i></span></a>
                                                </td>
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
