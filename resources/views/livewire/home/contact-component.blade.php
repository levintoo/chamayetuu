<div>
    <div class="banner-section position-relative">
        <!-- Container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- col  -->
                <div class="col-md-6">
                    <div class="banner-content banner-padding">
                        <h3 class="title">CONTACT US</h3>
                        <p>Lorem ipsum dolor sit amet.
                        </p>
                    </div>
                </div>
                <!-- /col -->
                <!-- col -->
                <div class="col-md-6 mt-7 mt-md-0">
                    <div class="banner-content scene banner-img">
                        <div data-depth="0.2">
                            <img src="{{ asset('assets/images/bg/4.png') }}" alt="img" />
                        </div>
                    </div>
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /Container -->
    </div>
    <!-- /Breadcrumb -->

    <!-- Contact Info -->
    <div class="contact-info-area pt-100 pb-70">
        <!-- Container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-box">
                        <div class="back-icon">
                            <i class="ri-map-2-line"></i>
                        </div>
                        <div class="icon">
                            <i class="ri-map-2-line"></i>
                        </div>
                        <h3>Our Address</h3>
                        <p>175 5th Ave, New York, NY 10010, United States</p>
                    </div>
                </div>
                <!-- /col -->
                <!-- col -->
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-box">
                        <div class="back-icon">
                            <i class="ri-phone-line"></i>
                        </div>
                        <div class="icon">
                            <i class="ri-phone-line"></i>
                        </div>
                        <h3>Contact</h3>
                        <p>Mobile: <a href="tel:+44457895789">(+44) - 45789 - 5789</a></p>
                        <p>E-mail: <a href="mailto:hello@aloa.com">hello@example.com</a></p>
                    </div>
                </div>
                <!-- /col -->
                <!-- col -->
                <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                    <div class="contact-info-box">
                        <div class="back-icon">
                            <i class="ri-time-line"></i>
                        </div>
                        <div class="icon">
                            <i class="ri-time-line"></i>
                        </div>
                        <h3>Hours of Operation</h3>
                        <p>Monday - Friday: 09:00 - 20:00</p>
                        <p>Sunday & Saturday: 10:30 - 22:00</p>
                    </div>
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /Container -->
    </div>
    <!-- /Contact Info -->

    <!-- Contact -->
    <div class="contact-section">
        <!-- Container -->
        <div class="container">
            <!-- row -->
            <div class="row clearfix">
                <!-- col -->
                <div class="col-lg-6">
                    <div class="map-site ml-15">

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.815599555847!2d36.82132121429563!3d-1.28457709906307!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f10d640d9d5f1%3A0x684a1d6fc8f6da02!2sIPS%20Building%2C%20Nairobi!5e0!3m2!1sen!2ske!4v1637049615797!5m2!1sen!2ske"
                            style="border:0;" allowfullscreen=""></iframe>
                    </div>
                </div>
                <!-- /col -->
                <!-- col -->
                <div class="col-lg-6 col-md-12 col-sm-12 form-column">
                    <div class="form-inner">
                        <h3>Let’s Conversation<br />with Bnker</h3>
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form id="contact-form" class="default-form" >
                            @csrf
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group contact-icon contacts-name">
                                    <input type="text" class="name" name="username" placeholder="Your name *"  wire:model="name">
                                    @error('name') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group contact-icon contacts-email">
                                    <input type="email" class="email" name="email" placeholder="Your mail *" wire:model="email">
                                    @error('email') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group contact-icon contacts-phone">
                                    <input type="text" class="phone" name="phone" placeholder="Your Phone *" wire:model="phone">
                                    @error('phone') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group  contact-icon contacts-subject">
                                    <input type="text" class="subject" name="subject" placeholder="Subject *" wire:model="subject">
                                    @error('subject') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group contact-icon contacts-message">
                                    <textarea name="message" class="message" placeholder="Message..." wire:model="message"></textarea>
                                    @error('message') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 message-btn">
                                    <button class="btn theme-btn-1 add_message" type="button" name="submit-form" wire:click="store()">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- col -->
            </div>
            <!-- /row -->
        </div>
        <!-- Container -->
    </div>

    @push('scripts')
{{--         unused--}}
        <script>
            $(document).on('click','.add_message', function (e){
                e.preventDefault()
                var data = {
                    'name': $('.name').val(),
                    'phone': $('.phone').val(),
                    'email': $('.email').val(),
                    'subject': $('.subject').val(),
                    'message': $('.subject').val(),
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: "",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response)
                    }
                });
            })
        </script>
    @endpush

</div>
