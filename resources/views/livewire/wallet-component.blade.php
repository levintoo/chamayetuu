{{--@push('styles')--}}
{{--<script>--}}

{{--</script>--}}
{{--@endpush--}}
{{--<div class="container">--}}
{{--    <div class="page-title">--}}
{{--        <div class="row align-items-center justify-content-between">--}}
{{--            <div class="col-xl-4">--}}
{{--                <div class="page-title-content">--}}
{{--                    <h3>Wallet</h3>--}}
{{--                    <p class="mb-2">Welcome Intez Wallet page</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-auto">--}}
{{--                <div class="breadcrumbs">--}}
{{--                    <a href="#">--}}
{{--                        Home--}}
{{--                    </a>--}}
{{--                    <span><i class="ri-arrow-right-s-line"></i></span><a href="#">Wallet</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="row">--}}
{{--        <div class="col-xxl-6 col-xl-6 col-lg-6">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">--}}
{{--                    <h4 class="card-title">Balance Details</h4>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-12">--}}
{{--                            <div class="total-balance">--}}
{{--                                <p>Total Balance</p>--}}
{{--                                <h2>KES {{$balance}}</h2>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">--}}
{{--                            <div class="balance-stats active">--}}
{{--                                <p>Last Month</p>--}}
{{--                                <h3>$42,678</h3>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">--}}
{{--                            <div class="balance-stats">--}}
{{--                                <p>Expenses</p>--}}
{{--                                <h3>$1,798</h3>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">--}}
{{--                            <div class="balance-stats">--}}
{{--                                <p>Taxes</p>--}}
{{--                                <h3>$255.25</h3>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">--}}
{{--                            <div class="balance-stats">--}}
{{--                                <p>Debt</p>--}}
{{--                                <h3>$365,478</h3>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xxl-6 col-xl-6 col-lg-6">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">--}}
{{--                    <h4 class="card-title">Loans</h4>--}}
{{--                    <a href="#">See More</a>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="bills-widget">--}}
{{--                        <div class="bills-widget-content d-flex justify-content-between align-items-center active">--}}
{{--                            <div>--}}
{{--                                <p>Netflix</p>--}}
{{--                                <h4>$17.00</h4>--}}
{{--                            </div>--}}
{{--                            <div><a href="#" class="btn btn-primary">Pay Now</a></div>--}}
{{--                        </div>--}}
{{--                        <div class="bills-widget-content d-flex justify-content-between align-items-center">--}}
{{--                            <div>--}}
{{--                                <p class="text-danger">Spotify</p>--}}
{{--                                <h4>$11.00</h4>--}}
{{--                            </div>--}}
{{--                            <div><a href="#" class="btn btn-primary">Pay Now</a></div>--}}
{{--                        </div>--}}
{{--                        <div class="bills-widget-content d-flex justify-content-between align-items-center">--}}
{{--                            <div>--}}
{{--                                <p class="text-danger">Youtube</p>--}}
{{--                                <h4>$11.00</h4>--}}
{{--                            </div>--}}
{{--                            <div><a href="#" class="btn btn-primary">Pay Now</a></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xxl-6 col-xl-6 col-lg-6">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">--}}
{{--                    <h4 class="card-title">Investment</h4>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="chartjs-size-monitor">--}}
{{--                        <div class="chartjs-size-monitor-expand">--}}
{{--                            <div class=""></div>--}}
{{--                        </div>--}}
{{--                        <div class="chartjs-size-monitor-shrink">--}}
{{--                            <div class=""></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <canvas id="transaction-graph"></canvas>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class=" col-xxl-6 col-xl-6 col-lg-6">--}}
{{--            <div class="row">--}}
{{--                <div class="col-xxl-12 col-xl-12 col-lg-12">--}}
{{--                    <div class="credit-card payoneer">  --}}{{--visa is an alt--}}
{{--                        <div class="type-brand">--}}
{{--                            <h4>M-pesa</h4>--}}
{{--                            <img src="{{asset('assets/images/cc/visa.png') }}" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="cc-number">--}}

{{--                            --}}{{--   mpesa payment form  --}}
{{--                            <form class="input-group" action="{{route('getAccessToken')}}" method="POST">--}}
{{--                                @csrf--}}
{{--                                <input type="number" class="form-control" placeholder="Enter amount to deposit" name="amount">--}}
{{--                                <input value="Deposit" class="input-group-text" type="submit" >--}}

{{--                            </form>--}}
{{--                            <form class="input-group" action="{{route('getAccessToken')}}" method="POST">--}}
{{--                                @csrf--}}
{{--                                <p>REG URL</p>--}}
{{--                                <input value="Deposit" class="input-group-text" type="submit" >--}}

{{--                            </form>--}}
{{--                        </div>--}}
{{--                        <div class="cc-holder-exp">--}}
{{--                            @error('mpesaamount')<p class="text-danger">{{$message}}</p>@enderror--}}

{{--                            @if(Session::has('mpesamessage'))--}}
{{--                                <h5 class="text-success">{{Session::get('mpesamessage')}}</h5>--}}
{{--                            @endif--}}
{{--                            <div class="exp"><span>EXP:</span><strong>12/21</strong></div>--}}
{{--                        </div>--}}
{{--                        <div class="cc-info">--}}
{{--                            <div class="row justify-content-between align-items-center">--}}
{{--                                <div class="col-5">--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <p class="me-3">Status</p>--}}
{{--                                        <p><strong>Active</strong></p>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <p class="me-3">Currency</p>--}}
{{--                                        <p><strong>USD</strong></p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-xl-7">--}}
{{--                                    <div class="d-flex justify-content-between">--}}
{{--                                        <div class="ms-3">--}}
{{--                                            <p>Credit Limit</p>--}}
{{--                                            <p><strong>2000 USD</strong></p>--}}
{{--                                        </div>--}}
{{--                                        <div id="circle1"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-xxl-12 col-xl-12 col-lg-12">--}}
{{--                    <div class="credit-card payoneer">--}}
{{--                        <div class="type-brand">--}}
{{--                            <h4>Deposit</h4>--}}
{{--                            <img src="{{asset('assets/images/cc/paypal.png') }}" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="cc-number">--}}
{{--                            <form class="input-group" action="{{ route('create-payment') }}" method="post">--}}
{{--                                @csrf--}}
{{--                                <input name="paypalamount" type="number" id="paypal-amount" class="form-control" placeholder="Enter amount to deposit" wire:model="paypalamount">--}}
{{--                                <input value="Deposit" class="input-group-text" type="submit" >--}}
{{--                                <h6></h6>--}}
{{--                            </form>--}}
{{--                        </div>--}}

{{--                        <div class="cc-holder-exp">--}}
{{--                            @error('paypalamount')<p class="text-danger">{{$message}}</p>@enderror--}}

{{--                            @if(Session::has('paypalmessage'))--}}
{{--                                <h5 class="text-success">{{Session::get('paypalmessage')}}</h5>--}}
{{--                            @endif--}}
{{--                            <div class="exp"><span>EXP:</span><strong>12/21</strong></div>--}}
{{--                        </div>--}}
{{--                        <div class="cc-info">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-5">--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <p class="me-3">Status</p>--}}
{{--                                        <p><strong>Active</strong></p>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <p class="me-3">Currency</p>--}}
{{--                                        <p><strong>USD</strong></p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-xl-7">--}}
{{--                                    <div class="d-flex justify-content-between">--}}
{{--                                        <div class="ms-3">--}}
{{--                                            <p>Credit Limit</p>--}}
{{--                                            <p><strong>1500/2000 USD</strong></p>--}}
{{--                                        </div>--}}
{{--                                        <div id="circle3"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@push('scripts')--}}
{{--    <script>--}}
{{--        console.log('wallet ,deposit page')--}}
{{--    </script>--}}
{{--@endpush--}}
<div class="container">

    <div class="row mt-5">
        <div class="col-sm-8 mx-auto">
            <form class="card" action="{{route('getAccessToken')}}" method="POST">
                @csrf
                <div class="card-header">
                    Obtain Access Token
                </div>
                <div class="card-body">
                    <h4 id="access_token"></h4>
                    <button type="submit" id="getAccessToken" class="btn btn-primary">Request Access Token</button>
                </div>
            </form>

            <form class="card mt-5" method="POST" action="{{route('registerURLS')}}">
                @csrf
                <div class="card-header">Register URLs</div>
                <div class="card-body">
                    <div id="response"></div>
                    <button id="registerURLS" class="btn btn-primary">Register URLs</button>
                </div>
            </form>

            <div class="card mt-5">
                <div class="card-header">Simulate Transaction</div>
                <div class="card-body">
                    <div id="c2b_response"></div>
                    <form method="POST" action="{{route('stkPush')}}">
                        @csrf
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" name="amount" class="form-control" id="amount">
                        </div>
                        <div class="form-group">
                            <label for="account">Account</label>
                            <input type="text" name="account" class="form-control" id="account">
                        </div>
                        <button id="simulate" class="btn btn-primary">Simulate Payment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

