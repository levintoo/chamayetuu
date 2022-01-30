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
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">New Admin</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('add.admin')}}" method="POST">
                                @csrf
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif
                                <div class="row g-3">
                                    <div class="col-12 mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="loan name">
                                        @error('name') <p class="text-danger">{{$message}}</p>@enderror
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="mail@host.com">
                                        @error('email') <p class="text-danger">{{$message}}</p>@enderror
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="phone" placeholder="phone">
                                        @error('phone') <p class="text-danger">{{$message}}</p>@enderror
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label class="form-label">Residence</label>
                                        <input type="text" class="form-control" name="residence" placeholder="residence">
                                        @error('residence') <p class="text-danger">{{$message}}</p>@enderror
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label class="form-label">Dob</label>
                                        <input type="date" class="form-control" name="dob" placeholder="">
                                        @error('dob') <p class="text-danger">{{$message}}</p>@enderror
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label class="form-label">ID no</label>
                                        <input type="number" class="form-control" name="national_id" placeholder="id">
                                        @error('national_id') <p class="text-danger">{{$message}}</p>@enderror
                                    </div>

                                    <div class="col-12 col-12 mb-3">
                                        <button class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
