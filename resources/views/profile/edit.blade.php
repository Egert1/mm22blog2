@extends('partials.layout')
@section('content')
  <div class="card bg-base-200 w-3/5 shadow-xl mx-auto my-auto">
    <div class="card-body space-y-6">

      {{-- Profile Info Update --}}
      <div class="card bg-base-100 shadow-lg">
        <div class="card-body">
          @include('profile.partials.update-profile-information-form')
        </div>
      </div>

      {{-- Password Update --}}
      <div class="card bg-base-100 shadow-lg">
        <div class="card-body">
          @include('profile.partials.update-password-form')
        </div>
      </div>

      {{-- Delete User --}}
      <div class="card bg-base-100 shadow-lg">
        <div class="card-body">
          @include('profile.partials.delete-user-form')
        </div>
      </div>

    </div>
  </div>
@endsection
