@if(Auth::check())

	@extends('layouts/app')


	@section('content')
		<div class="row">
	
			<div class="col-sm-8">

				<h1>New Place</h1>

				{{ html()->form('POST')->route('places.store')->open() }}

					@include ('Place._form')

				{{ html()->form()->close() }}	

			</div>
		</div>

	@stop

@endif