@extends('layouts.app')
@section('title','Reset password')
@section('content')
<div class="row justify-content-center">
  <div class="col-lg-10 col-xl-8">
    <div class="card shadow-sm border-0 overflow-hidden">
      <div class="bg-primary text-white text-center p-4">
        <h2 class="mb-1">Reset password</h2>
        <p class="mb-0">Choose a new password for your account.</p>
      </div>
      <div class="card-body p-4"><form method="POST" action="{{ route('password.update') }}">
@csrf
<input type="hidden" name="token" value="{{ request()->route('token') }}">
<div class="row g-3">
  <div class="col-md-6">
    <label class="form-label" for="email">Email</label>
    <input id="email" type="email" name="email" value="{{ old('email', request('email')) }}" class="form-control @error('email') is-invalid @enderror" required>
    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-3">
    <label class="form-label" for="password">New password</label>
    <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-3">
    <label class="form-label" for="password_confirmation">Confirm password</label>
    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required autocomplete="new-password">
  </div>
</div>
<div class="d-grid mt-3"><button type="submit" class="btn btn-primary btn-lg">Reset password</button></div>
</form></div>
      <div class="card-footer bg-light px-4 py-3"><div><a href="{{ route('login') }}" class="link-primary text-decoration-none">Back to login</a></div></div>
    </div>
  </div>
</div>
@endsection
