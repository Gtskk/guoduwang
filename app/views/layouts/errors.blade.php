<div class="row">
	<div class="nine columns">
		@if($errors->any())
			<div class="alert-box alert">
				@foreach($errors->all() as $e)
					<li>{{ $e }}</li>
				@endforeach
				<a href="" class="close">&times;</a>
			</div>
		@endif
		@if(!empty($error))
			<div class="alert-box alert">
				<li>{{ $error }}</li>
			</div>
		@endif
	</div>
</div>