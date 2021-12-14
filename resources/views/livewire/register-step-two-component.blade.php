@push('styles')
    <style>
        a:hover {
            cursor: pointer !important;
        }
    </style>
@endpush
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo/>
        </x-slot>

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

            <x-jet-validation-errors class="mb-3"/>

            <form method="POST" action="">
                @csrf

                <div class="mb-3">
                    <x-jet-label value="Code"/>
                    <x-jet-input type="text" name="otp" :value="old('otp')" required autofocus wire:model="otp"/>
                </div>

                <div class="d-flex justify-content-end mt-4">

                </div>
            </form>
            <button class="btn btn-primary" wire:click="verifyuser">
                verify
            </button>
            <a class="text-muted me-3" wire:click="resendcode">
                Didn't receive code?
            </a>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
