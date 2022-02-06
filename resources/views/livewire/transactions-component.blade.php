@push('styles')
    <style>
        .sort-select {
            border-radius: 5px;
            height: 45px;
            border: 1px solid #e5e5e5;
            padding: 0px 22px;
            font-size: 14px;
            color: #070707;
        }
    </style>
@endpush
<div class="container">
    <div class="page-title">
        <div class="row align-items-center justify-content-between">
            <div class="col-xl-4">
                <div class="page-title-content">
                    <h3>Transactions</h3>
                    <p class="mb-2">Welcome Intez Transactions page</p>
                </div>
            </div>
            <div class="col-auto">
                <div class="breadcrumbs"><a href="#">Home </a><span><i
                            class="ri-arrow-right-s-line"></i></span><a href="#">Transactions</a></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-sm-6">
            <div class="stat-widget d-flex align-items-center bg-white">
                <div class="widget-icon me-3 bg-primary"><span><i class="ri-file-copy-2-line"></i></span></div>
                <div class="widget-content">
                    <h3>{{$transactionrecords['all']}}</h3>
                    <p>Total Transactions</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="stat-widget d-flex align-items-center bg-white">
                <div class="widget-icon me-3 bg-success"><span><i class="ri-file-list-3-line"></i></span></div>
                <div class="widget-content">
                    <h3>{{$transactionrecords['paid']}}</h3>
                    <p>Paid Transactions</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="stat-widget d-flex align-items-center bg-white">
                <div class="widget-icon me-3 bg-warning"><span><i class="ri-file-paper-line"></i></span></div>
                <div class="widget-content">
                    <h3>{{$transactionrecords['unpaid']}}</h3>
                    <p>Unpaid Transactions</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="stat-widget d-flex align-items-center bg-white">
                <div class="widget-icon me-3 bg-danger"><span><i class="ri-file-paper-2-line"></i></span></div>
                <div class="widget-content">
                    <h3>{{$transactionrecords['canceled']}}</h3>
                    <p>Canceled Transactions</p>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header flex-row">
                    <h4 class="card-title">Invoice </h4>
                    <a class="" ><span></span> </a>
                    <div>
                        <div class="sort-item orderby ">
                            <select name="orderby" class="sort-select" wire:model="sorting">
                                <option class="form-select" value="default" selected="selected">Default sorting</option>
                                <option value="date">Newness: old to new</option>
                                <option value="amount">Sort by price: low to high</option>
                                <option value="status">Sort by price: high to low</option>
                            </select>

                            <select name="post-per-page" class="sort-select" wire:model="pagesize">
                                <option value="5" selected="selected">5 per page</option>
                                <option value="10">10 per page</option>
                                <option value="15">15 per page</option>
                                <option value="20">20 per page</option>
                                <option value="25">25 per page</option>
                                <option value="30">All</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="invoice-table">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>
                                        <div class="form-check"><input class="form-check-input"
                                                                       type="checkbox" id="flexCheckDefault" value="">
                                        </div>
                                    </th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Source</th>
                                    <th>Purpose</th>
                                    <th>Status</th>
                                    <th>Received</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>
                                            <div class="form-check"><input class="form-check-input"
                                                                           type="checkbox" id="flexCheckDefault"
                                                                           value=""></div>
                                        </td>
                                        <td>{{$transaction->type}}</td>
                                        <td>{{$transaction->amount}}</td>
                                        <td>{{$transaction->source}}</td>
                                        <td>{{$transaction->purpose}}</td>
                                        @if($transaction->status == '0')
                                            <td><span class="badge px-3 py-2 bg-warning">Pending</span></td>
                                        @elseif($transaction->status == '1')
                                            <td><span class="badge px-3 py-2 bg-success">Paid</span></td>
                                        @elseif($transaction->status == '2')
                                            <td><span class="badge px-3 py-2 bg-danger">failed</span></td>
                                        @elseif($transaction->status == '3')
                                            <td><span class="badge px-3 py-2 bg-danger">cancelled</span></td>
                                        @elseif($transaction->status == '4')
                                            <td><span class="badge px-3 py-2 bg-danger">reversed</span></td>
                                        @elseif($transaction->status == '5')
                                            <td><span class="badge px-3 py-2 bg-danger">rejected</span></td>
                                        @endif
                                        <td>{{$transaction->transacted_at}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $transactions->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
