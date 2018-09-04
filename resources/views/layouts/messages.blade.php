@if($errors->any())
<div class="alert alert-warning">
	<strong>Whoops</strong>
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

@if(session('success'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
	<strong>Yay</strong>
	{{ session('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if(session('error'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Whoops</strong>
  {{ session('error') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif