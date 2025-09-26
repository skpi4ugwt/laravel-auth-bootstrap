@extends('layouts.app')
@section('title','Forgot password')
@section('content')
<div class="row justify-content-center">
  <div class="col-lg-10 col-xl-8">
    <div class="card shadow-sm border-0 overflow-hidden">
      <div class="bg-primary text-white text-center p-4">
        <h2 class="mb-1">Forgot password</h2>
        <p class="mb-0">Enter your email to receive a reset link.</p>
      </div>
      <div class="card-body p-4">@if (session('status'))
  <div class="alert alert-success" role="alert">{{ session('status') }}</div>
@endif
<form method="POST" action="{{ route('password.email') }}">
@csrf
<div class="mb-3">
  <label class="form-label" for="email">Email address</label>
  <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required>
  @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="d-grid"><button type="submit" class="btn btn-primary btn-lg">Send password reset link</button></div>
</form></div>
      <div class="card-footer bg-light px-4 py-3"><div class="d-flex flex-wrap gap-3 justify-content-between">
  <a href="{{ route('login') }}" class="link-primary text-decoration-none">Back to login</a>
  <span>New user? <a href="{{ route('register') }}" class="link-primary text-decoration-none">Create an account</a></span>
</div></div>
    </div>
  </div>
</div>
@endsection
