@extends('layouts.app')
@section('title','Sign in')
@section('content')
<div class="row justify-content-center">
  <div class="col-lg-10 col-xl-8">
    <div class="card shadow-sm border-0 overflow-hidden">
      <div class="bg-primary text-white text-center p-4">
        <h2 class="mb-1">Sign in</h2>
        <p class="mb-0">Access your account.</p>
      </div>
      <div class="card-body p-4"><form method="POST" action="{{ route('login') }}">
@csrf
<div class="row g-3">
  <div class="col-md-6">
    <label class="form-label" for="email">Email</label>
    <input id="email" type="email" name="email" value="{{ old('email') }}"
      class="form-control @error('email') is-invalid @enderror" required autocomplete="email" autofocus>
    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-6">
    <label class="form-label" for="password">Password</label>
    <input id="password" type="password" name="password"
      class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">
    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
</div>
<div class="form-check mt-3">
  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
  <label class="form-check-label" for="remember">Remember me</label>
</div>
<div class="d-grid mt-3"><button type="submit" class="btn btn-primary btn-lg">Sign in</button></div>
</form></div>
      <div class="card-footer bg-light px-4 py-3"><div class="d-flex flex-wrap gap-3 justify-content-between">
  <a href="{{ route('password.request') }}" class="link-primary text-decoration-none"><i class="bi bi-question-circle"></i> Forgot password?</a>
  <span>New here? <a href="{{ route('register') }}" class="link-primary text-decoration-none">Create an account</a></span>
</div></div>
    </div>
  </div>
</div>
@endsection
