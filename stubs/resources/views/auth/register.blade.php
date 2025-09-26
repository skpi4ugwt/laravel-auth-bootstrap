@extends('layouts.app')
@section('title','Create your account')
@section('content')
<div class="row justify-content-center">
  <div class="col-lg-10 col-xl-8">
    <div class="card shadow-sm border-0 overflow-hidden">
      <div class="bg-primary text-white text-center p-4">
        <h2 class="mb-1">Create your account</h2>
        <p class="mb-0">Join us by filling the details below.</p>
      </div>
      <div class="card-body p-4"><form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
@csrf
<div class="row g-3">
  <div class="col-md-3">
    <label class="form-label" for="title">Title</label>
    <select id="title" name="title" class="form-select @error('title') is-invalid @enderror">
      <option value="">Select Title</option>
      @foreach (['Prof.','Dr.','Mr.','Mrs.','Ms.','Miss'] as $t)
        <option value="{{ $t }}" {{ old('title') === $t ? 'selected' : '' }}>{{ $t }}</option>
      @endforeach
    </select>
    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-3">
    <label class="form-label" for="name">Name *</label>
    <input id="name" name="name" value="{{ old('name') }}"
      class="form-control @error('name') is-invalid @enderror" required autocomplete="name">
    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-3">
    <label class="form-label" for="email">Email *</label>
    <input id="email" type="email" name="email" value="{{ old('email') }}"
      class="form-control @error('email') is-invalid @enderror" required autocomplete="email">
    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-3">
    <label class="form-label" for="mobile">Mobile</label>
    <input id="mobile" type="tel" name="mobile" value="{{ old('mobile') }}"
      class="form-control @error('mobile') is-invalid @enderror" pattern="^[0-9]{10,15}$" placeholder="919892939495">
    @error('mobile')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
</div>
<div class="row g-3 mt-1">
  <div class="col-md-3">
    <label class="form-label" for="gender">Gender</label>
    <select id="gender" name="gender" class="form-select @error('gender') is-invalid @enderror">
      <option value="">Select Gender</option>
      @foreach (['Male','Female','Other'] as $g)
        <option value="{{ $g }}" {{ old('gender') === $g ? 'selected' : '' }}>{{ $g }}</option>
      @endforeach
    </select>
    @error('gender')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-3">
    <label class="form-label" for="university">University</label>
    <input id="university" name="university" value="{{ old('university') }}"
      class="form-control @error('university') is-invalid @enderror">
    @error('university')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-3">
    <label class="form-label" for="department">Department</label>
    <input id="department" name="department" value="{{ old('department') }}"
      class="form-control @error('department') is-invalid @enderror">
    @error('department')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-3">
    <label class="form-label" for="city">City</label>
    <input id="city" name="city" value="{{ old('city') }}"
      class="form-control @error('city') is-invalid @enderror">
    @error('city')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
</div>
<div class="row g-3 mt-1">
  <div class="col-md-4"><label class="form-label" for="state">State</label><input id="state" name="state" value="{{ old('state') }}" class="form-control @error('state') is-invalid @enderror">@error('state')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
  <div class="col-md-4"><label class="form-label" for="country">Country</label><input id="country" name="country" value="{{ old('country') }}" class="form-control @error('country') is-invalid @enderror">@error('country')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
  <div class="col-md-4"><label class="form-label" for="pincode">Pincode</label><input id="pincode" name="pincode" value="{{ old('pincode') }}" class="form-control @error('pincode') is-invalid @enderror" inputmode="numeric" pattern="^[0-9]{4,10}$">@error('pincode')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
</div>
<div class="row g-3 mt-1 align-items-end">
  <div class="col-md-3"><label class="form-label" for="password">Password *</label><input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">@error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
  <div class="col-md-3"><label class="form-label" for="password_confirmation">Confirm Password *</label><input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required autocomplete="new-password"></div>
  <div class="col-md-6"><label class="form-label" for="profile_image">Upload Profile Photo</label><input type="file" id="profile_image" name="profile_image" class="form-control @error('profile_image') is-invalid @enderror" accept="image/*">@error('profile_image')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
</div>
<div class="form-check mt-3">
  <input class="form-check-input @error('agree') is-invalid @enderror" type="checkbox" id="agree" name="agree" {{ old('agree') ? 'checked' : '' }}>
  <label class="form-check-label" for="agree">I agree to the <a href="/terms-conditions" target="_blank">Terms &amp; Conditions</a> and <a href="/privacy-policy" target="_blank">Privacy Policy</a>.</label>
  @error('agree')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
</div>
<div class="d-grid mt-3"><button type="submit" class="btn btn-primary btn-lg">Create Account</button></div>
</form></div>
      <div class="card-footer bg-light px-4 py-3"><div class="d-flex flex-wrap gap-3 justify-content-between">
  <span>Already have an account? <a href="{{ route('login') }}" class="link-primary text-decoration-none">Sign in</a></span>
  <a href="{{ route('password.request') }}" class="link-secondary text-decoration-none"><i class="bi bi-question-circle"></i> Forgot password?</a>
</div></div>
    </div>
  </div>
</div>
@endsection
