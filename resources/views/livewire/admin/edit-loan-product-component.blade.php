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
                            <h4 class="card-title">Update Loan</h4>
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent="updateProduct" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-12 mb-3">
                                        <label class="form-label">Name</label>
                                        <input  type="text" class="form-control" wire:model="name" placeholder="loan name">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label class="form-label">Loan limit</label>
                                        <input type="number" class="form-control" placeholder="999,999" wire:model="limit">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label class="form-label">Interest rate %</label>
                                        <input type="number" wire:model="interest_rate" class="form-control" placeholder="15" >
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label class="form-label">Interest rate type</label>
                                        <select class="form-select" wire:model="interest_type">
                                            <option value="fixed">fixed</option>
                                            <option value="variable">variable</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-12 mb-3">
                                        <button type="submit" class="btn btn-primary" >Update</button>
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
