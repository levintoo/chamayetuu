@push('styles')
    <style>
        a:hover {
            cursor: pointer !important;
        }
    </style>
@endpush
<div>
        <div class="card-body">
            <div class="mb-3">
                <p>Please input otp sent to {{Auth::user()->email}}.</p>
            </div>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
                <form  method="POST" action="{{route('otp.validate')}}">
                    @csrf
                    <div class="mb-3">
                        <label value="Code"/>
                        <input type="number" name="otp_input"  required autofocus wire:model="otp_input"/>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        @error('otp_input')<p class="text-danger">{{$message}}</p>@enderror
                    </div>
                    <button type="submit" class="btn btn-primary">
                        verify
                    </button>
                </form>

                <a class="text-muted me-3" wire:click="resendcode">
                    Didn't receive code?
                </a>
        </div>
</div>
