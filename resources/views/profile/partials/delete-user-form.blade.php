<section class="space-y-6">
    <header class="space-y-2">
      <h2 class="text-lg font-medium text-gray-900">
        {{ __('Delete Account') }}
      </h2>
      <p class="mt-1 text-sm text-gray-600">
        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
      </p>
    </header>
  
    
    <label for="confirm-delete-modal" class="btn btn-error">
      {{ __('Delete Account') }}
    </label>
  
    
    <input type="checkbox" id="confirm-delete-modal" class="modal-toggle" />
    <div class="modal modal-bottom sm:modal-middle">
      <div class="modal-box">
        <h3 class="font-bold text-lg">
          {{ __('Are you sure you want to delete your account?') }}
        </h3>
        <p class="py-4 text-sm text-gray-600">
          {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
        </p>
  
        <form method="POST" action="{{ route('profile.destroy') }}">
          @csrf
          @method('delete')
  
          <div class="form-control w-full max-w-xs">
            <label class="label">
              <span class="label-text">{{ __('Password') }}</span>
            </label>
            <input
              type="password"
              name="password"
              placeholder="{{ __('Password') }}"
              class="input input-bordered"
              required
            />
            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
          </div>
  
          <div class="modal-action mt-6">
            
            <label for="confirm-delete-modal" class="btn">
              {{ __('Cancel') }}
            </label>
            
            <button type="submit" class="btn btn-error">
              {{ __('Delete Account') }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>
  