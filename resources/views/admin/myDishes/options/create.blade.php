@extends('adminlte::page')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/sass/main.css') }}" />
@endsection

@section('content')

<div class="container">

	<div class="row">
		<div class="col-12">
			<div class="breadcrumbs">
				<a href="{{ url('admin/my-restaurants') }}">Restaurants</a>
				<i class="fas fa-arrow-right"></i>
				<a href="{{ url('admin/my-restaurants/'.$restaurant->id) }}">{{ $restaurant->name }}</a>
				<i class="fas fa-arrow-right"></i>
				<a href="{{ url('admin/my-dishes/'.$dish->id) }}">{{ $dish->name }}</a>
				<i class="fas fa-arrow-right"></i>
				<span>Selections</span>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<div class="header-large-blue">
				<h1>New Selection for {{ $dish->name }}</h1>
			</div>	
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			
			<form class="content-form" method="post"
				action="/admin/my-dishes/selections/{{ $dish->id }}" enctype="multipart/form-data">
				@csrf
				
				<p>Add a new option so your customer's can customise their meal to their liking!
				For example: Type "Bread" and below that, the different types of bread available.
				And below that, "Select One" because a sandwich can have only one type of bread.</p>
				
				<div class="row">
					<div class="col-md-3">
						<label for="name">Name:</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="name" />
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-3">
						<label for="options">Options:</label>
					</div>
					<div class="col-md-9">
						<div>
							<input type="text" name="options[]" />
						</div>
						<div>
							<input type="text" name="options[]" />
						</div>
						<div>
							<input type="text" name="options[]" />
						</div>
						<div>
							<input type="text" name="options[]" />
						</div>
						<div>
							<input type="text" name="options[]" />
						</div>
						<div>
							<input type="text" name="options[]" />
						</div>
						<div>
							<input type="text" name="options[]" />
						</div>
						<div>
							<input type="text" name="options[]" />
						</div>
						<div>
							<input type="text" name="options[]" />
						</div>
						<div>
							<input type="text" name="options[]" />
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-3">
						<label for="radiocheckbox">Customer chooses one or many options?</label>
					</div>
					<div class="col-md-9">
						<select name="radio_or_checkbox">
							<option value="radio">Select One</option>
							<option value="checkbox">Select Multiple</option>
						</select>
					</div>
				</div>
				
				<div class="row">
					<div class="col-12">
						<div class="form-submit">
							<input type="submit" value="Add Selection" />
						</div>
					</div>
				</div>
					
				
			</form>
		</div>
	</div>
	
	@if(session()->has('errors'))
	<div class="alert alert-danger mt-3 mb-0">
		@foreach( $errors->all() as $message )
		<p>Error: {{ $message }}</p>
		@endforeach
	</div>
	@endif
</div>

@endsection