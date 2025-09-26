@extends('layouts.app')
@section('title','Verify your email')
@section('content')
<div class="row justify-content-center">
  <div class="col-lg-8">
    <div class="card shadow-sm border-0">
      <div class="card-body p-4">
        @if (session('resent'))
          <div class="alert alert-success" role="alert">A fresh verification link has been sent to your email address.</div>
        @endif
        <h3 class="mb-3">Verify your email</h3>
        <p class="text-muted">We sent a verification link to <strong>{{ auth()->user()->email }}</strong>. Please check your inbox.</p>
        <form method="POST" action="{{ route('verification.resend') }}" class="d-inline">@csrf
          <button type="submit" class="btn btn-primary">Resend verification email</button>
        </form>
        <a href="{{ route('logout') }}" class="btn btn-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Not your account? Log out</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
      </div>
    </div>
  </div>
</div>
@endsection
