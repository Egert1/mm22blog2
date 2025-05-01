<section class="space-y-6">
    <header>
      <h2 class="text-lg font-medium text-gray-900">
        {{ __('Profile Information') }}
      </h2>
      <p class="mt-1 text-sm text-gray-600">
        {{ __("Update your account's profile information and email address.") }}
      </p>
    </header>
  
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
      @csrf
    </form>
  
    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
      @csrf
      @method('patch')
  
      <div class="form-control w-full">
        <label for="name" class="label">
          <span class="label-text">{{ __('Name') }}</span>
        </label>
        <input
          id="name"
          name="name"
          type="text"
          required
          autofocus
          autocomplete="name"
          value="{{ old('name', $user->name) }}"
          class="input input-bordered w-full @error('name') input-error @enderror"
        />
        @error('name')
          <label class="label">
            <span class="label-text-alt text-error">{{ $message }}</span>
          </label>
        @enderror
      </div>
  
      <div class="form-control w-full">
        <label for="email" class="label">
          <span class="label-text">{{ __('Email') }}</span>
        </label>
        <input
          id="email"
          name="email"
          type="email"
          required
          autocomplete="username"
          value="{{ old('email', $user->email) }}"
          class="input input-bordered w-full @error('email') input-error @enderror"
        />
        @error('email')
          <label class="label">
            <span class="label-text-alt text-error">{{ $message }}</span>
          </label>
        @enderror
  
        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
          <div class="mt-2 text-sm text-gray-800 space-y-2">
            <p>
              {{ __('Your email address is unverified.') }}
              <label
                for="send-verification"
                class="btn btn-link btn-sm p-0 align-baseline hover:underline"
              >
                {{ __('Click here to re-send the verification email.') }}
              </label>
            </p>
            @if (session('status') === 'verification-link-sent')
              <p class="font-medium text-sm text-success">
                {{ __('A new verification link has been sent to your email address.') }}
              </p>
            @endif
          </div>
        @endif
      </div>
  
      <div class="flex items-center gap-4">
        <button type="submit" class="btn btn-primary">
          {{ __('Save') }}
        </button>
        @if (session('status') === 'profile-updated')
          <p
            x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 2000)"
            class="text-sm text-gray-600"
          >
            {{ __('Saved.') }}
          </p>
        @endif
      </div>
    </form>
  </section>
  