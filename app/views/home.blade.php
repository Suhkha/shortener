@extends('layout')

@section('title')Url Shortener with Laravel @stop

@section('content')

<div class="wrapper">
	
	{{ Form::open(array('route' => 'home.store', 'method' => 'POST'), array('role' => 'form')) }}

		<div class="row">

		@if($errors->has('url'))

			<p>{{ $errors->first('url') }}</p>

		@endif


		@if(Session::has('global'))

			<p>{{ Session::get('global') }}</p>
			
		@endif
			<div class="form-group col-md-8">
				{{ Form::label('url', 'Shorten an URL') }}
				{{ Form::text('url', null, array('placeholder' => 'URL', 'class' => 'form-control')) }}

				{{ Form::button('Crear', array('type' => 'submit', 'class' => 'btn btn-black')) }}
			</div>
		</div>

	{{ Form::close() }}

</div>



@stop