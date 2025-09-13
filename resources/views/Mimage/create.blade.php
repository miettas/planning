@if(Auth::check())

	@extends('layouts/app')


	@section('content2')

		<h1>New Image</h1>

		{{ html()->form('POST')->route('mimages.store')->open() }}
				
			@include ('Mimage._form')

		{{ html()->form()->close() }}	

	@stop
	
@endif