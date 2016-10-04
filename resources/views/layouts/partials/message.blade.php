@if(session()->has('message'))
  <div class="alert">{{ session()->get('message') }}</div>
@endif


@if(session()->has('alert'))
  <div class="alert">{{ session()->get('alert') }}</div>
@endif
