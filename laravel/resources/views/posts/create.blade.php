@extends ('layouts.master')

@section ('content')

	<div class="col-sm-8 blog-main">
	
		<h1>Publish a Post</h1>
		
		<hr>
		
		<form method="POST" action="/laravel_git/laravel/public/posts">
		
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		
			  <div class="form-group">
			    <label for="title">Title:</label>
			    <input type="text" class="form-control" id="title" name="title">
			  </div>
			  
			  <div class="form-group">
			    <label for="body">Body</label>
			    <textarea class="form-control" id="body" name="body" rows="3"></textarea>
			  </div>
			  
			  <div class="form-group">
			  
			  	<button type="submit" class="btn btn-primary">Publish</button>
			  
			  </div>
			  
			  @include('layouts.errors')
			  
		</form>
	
	</div>
	
@endsection
