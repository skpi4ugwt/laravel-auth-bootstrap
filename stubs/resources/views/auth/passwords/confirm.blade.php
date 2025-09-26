@extends('layouts.app')
@section('title','Confirm password')
@section('content')
<div class="row justify-content-center">
  <div class="col-lg-10 col-xl-8">
    <div class="card shadow-sm border-0 overflow-hidden">
      <div class="bg-primary text-white text-center p-4">
        <h2 class="mb-1">Confirm password</h2>
        <p class="mb-0">For your security, please confirm your password to continue.</p>
      </div>
      <div class="card-body p-4"><form method="POST" action="{{ route('password.confirm') }}">
@csrf
<div class="mb-3">
  <label class="form-label" for="password">Password</label>
  <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">
  @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="d-grid"><button type="submit" class="btn btn-primary btn-lg">Confirm</button></div>
</form></div>
      <div class="card-footer bg-light px-4 py-3"><div><a href="{{ route('home') }}" class="link-secondary text-decoration-none">Back to home</a></div></div>
    </div>
  </div>
</div>
@endsection
