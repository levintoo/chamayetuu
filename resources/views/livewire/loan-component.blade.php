<div class="container">
    <div class="page-title">
        <div class="row align-items-center justify-content-between">
            <div class="col-xl-4">
                <div class="page-title-content">
                    <h3>Loan</h3>
                </div>
            </div>
            <div class="col-auto">
                <div class="breadcrumbs"><a href="#">Home </a><span><i class="ri-arrow-right-s-line"></i></span><a href="#">Loans</a></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xxl-6 col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Borrow Loan</h4>
                </div>
                <div class="card-body">
                    <form method="post" name="myform" class="personal_validate">
                        <div class="row g-4">
                            <div class="col-xxl-12 col-xl-12 col-lg-12">
{{--                                @if(Session::has('message'))--}}
                                    <div class="alert alert-danger" role="alert">Not elegible for loan</div>
{{--                                @endif--}}
                                <label class="form-label text-black">Loan Amount</label>
                                <input type="text" class="form-control" placeholder="25481"
                                       name="amount">
                            </div>
                            <div class="col-xxl-12 col-xl-12 col-lg-12">
                                <label class="form-label">Loan type</label>
                                <select class="form-select" name="country">
                                    <option value="">Select</option>
                                @foreach($loantypes as $loantype)
                                        <option value="{{$loantype->loan_id}}">{{$loantype->name}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-xxl-12 col-xl-12 col-lg-12">
                                <label class="form-label">Repayment period(months)</label>
                                <select class="form-select" name="country">
                                    <option value="">Select</option>
                                    <option value="1">1</option>
                                    <option value="3">3</option>
                                    <option value="6">6</option>
                                    <option value="12">12</option>
                                    <option value="24">24</option>
                                    <option value="36">36</option>
                                </select>
                            </div>
                            <div class="col-xxl-12 col-xl-12 col-lg-12">
                                <label class="form-label">Receive via</label>
                                <select class="form-select" name="">
                                    <option value="">Select</option>
                                    <option value="paypal">
                                        Paypal
                                    </option>
                                    <option value="mpesa">
                                        Mpesa
                                    </option>
                                </select>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary pl-5 pr-5">Apply</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xxl-6 col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Eligibility</h4>
                </div>
                <div class="card-body">
                    <form method="post" name="myform" class="personal_validate" novalidate="novalidate">
                        <div class="row g-4">
                            <div class="col-xxl-12 col-xl-12 col-lg-12 align-items-center justify-content-between">
                                <h1 class="card-title text-center">KSH 0</h1>
                            </div>
                            <div class="col-xxl-12 col-xl-12 col-lg-12"></div>
                            <canvas class="col-xxl-12 col-xl-12 col-lg-12" id="foo"></canvas>
                            <div class="col-xxl-12 col-xl-12 col-lg-12"></div>
                            <div class="col-xxl-12 col-xl-12 col-lg-12">
                                <p class="text-red">You are not eligible to request for a loan yet. Transact more with chamayetu to grow your limit. A better credit score gives access to more affordable credit facilities. </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-7">
            <div id="user-activity" class="card" data-aos="fade-up">
                <div class="card-header">
                    <h4 class="card-title">Expenses</h4>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="activityBar"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Unpaid Bills</h4>
                </div>
                <div class="card-body">
                    <div class="unpaid-content">
                        <ul>
                            <li>
                                <p class="mb-0">Service</p>
                                <h5 class="mb-0">Payoneer</h5>
                            </li>
                            <li>
                                <p class="mb-0">Issued</p>
                                <h5 class="mb-0">March 17, 2021</h5>
                            </li>
                            <li>
                                <p class="mb-0">Payment Due</p>
                                <h5 class="mb-0">17 Days</h5>
                            </li>
                            <li>
                                <p class="mb-0">Paid</p>
                                <h5 class="mb-0">0.00</h5>
                            </li>
                            <li>
                                <p class="mb-0">Amount to pay</p>
                                <h5 class="mb-0">$ 532.69</h5>
                            </li>
                            <li>
                                <p class="mb-0">Payment Method</p>
                                <h5 class="mb-0">Paypal</h5>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Payments</h4>
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
                                    <th>Service</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="flexCheckDefault" value=""></div>
                                    </td>
                                    <td><img src="{{ asset('assets/images/social/facebook.png') }}" alt="" width="22" class="me-3 img-fluid">Facebook Ads</td>
                                    <td>$412</td>
                                    <td>March 21, 2021</td>
                                    <td><span class="badge px-3 py-2 bg-success">Paid</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="flexCheckDefault" value=""></div>
                                    </td>
                                    <td><img src="{{ asset('assets/images/social/youtube.png') }}" alt="" width="22" class="me-3 img-fluid">Youtube Premium</td>
                                    <td>$175</td>
                                    <td>December 26, 2021</td>
                                    <td><span class="badge px-3 py-2 bg-danger">Cancel</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="flexCheckDefault" value=""></div>
                                    </td>
                                    <td><img src="{{ asset('assets/images/social/dropbox.png') }}" alt="" width="22" class="me-3 img-fluid">Dropbox</td>
                                    <td>$521</td>
                                    <td>February 16, 2021</td>
                                    <td><span class="badge px-3 py-2 bg-success">Paid</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="flexCheckDefault" value=""></div>
                                    </td>
                                    <td><img src="{{ asset('assets/images/social/google-plus.png') }}" alt="" width="22" class="me-3 img-fluid">Google Plus</td>
                                    <td>$125</td>
                                    <td>June 17, 2021</td>
                                    <td><span class="badge px-3 py-2 bg-warning">Due</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="flexCheckDefault" value=""></div>
                                    </td>
                                    <td><img src="{{ asset('assets/images/social/spotify.png') }}" alt="" width="22" class="me-3 img-fluid">Spotify</td>
                                    <td>$521</td>
                                    <td>August 01, 2021</td>
                                    <td><span class="badge px-3 py-2 bg-success">Paid</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="flexCheckDefault" value=""></div>
                                    </td>
                                    <td><img src="{{ asset('assets/images/social/skype.png') }}" alt="" width="25" class="me-3 img-fluid">Skype</td>
                                    <td>$234</td>
                                    <td>January 19, 2021</td>
                                    <td><span class="badge px-3 py-2 bg-warning">Due</span></td>
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
@push('scripts')
    <script src="{{asset('assets/vendor/chartjs/chartjs.js')}}"></script>
    <script src="{{asset('assets/vendor/gauge.js/gauge.js')}}"></script>
    <script src="{{asset('assets/js/plugins/chartjs-bar-init.js')}}"></script>
        <script>
        var opts = {
            angle: -0.1, /// The span of the gauge arc
            lineWidth: 0.2, // The line thickness
            pointer: {
                length: 0.35, // Relative to gauge radius
                strokeWidth: 0.025 // The thickness
            },
            colorStart: '#6FADCF',   // Colors
            colorStop: '#8FC0DA',    // just experiment with them
            strokeColor: 'rgba(13,64,198,0.84)',   // to see which ones work best for you
            staticLabels: {
                font: "10px sans-serif",  // Specifies font
                labels: [0, 100000, 200000, 300000, 400000],  // Print labels at these values
                color: "#000000",  // Optional: Label text color
                fractionDigits: 0  // Optional: Numerical precision. 0=round off.
            },
        };
        var target = document.getElementById('foo'); // your canvas element
        var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
        gauge.maxValue = 400000; // set max gauge value
        gauge.setMinValue(0);  // set min value
        gauge.set(1000); // set actual value
    </script>
@endpush
