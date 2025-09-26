@php($levelMap = ['success'=>'success','status'=>'success','error'=>'danger','warning'=>'warning','info'=>'info','message'=>'info'])
@foreach ($levelMap as $key => $bsClass)
  @if (session($key))
    <div class="alert alert-{{ $bsClass }} alert-dismissible fade show" role="alert">
      {{ session($key) }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
@endforeach
