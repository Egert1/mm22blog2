@extends('partials.layout')
@section('content')
    <div class="card bg-base-200 w-2/5 shadow-xl mx-auto my-auto">
        <div class="card-body">
            <div class="mb-4 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <!-- Email Address -->
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Email</span>
                    </div>
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="input input-bordered w-full @error('email') input-error @enderror" required autofocus />
                    <div class="label">
                        @error('email')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </div>
                </label>
                <div class="flex items-center justify-end mt-4">
                    <input type="submit" class="btn btn-primary" value="{{ __('Email Password Reset Link') }}">
                </div>
            </form>
        </div> 
    </div>
@endsection