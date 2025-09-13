@if(Auth::check())

	@extends('layouts/app')


	@section('content2')

		<h1>New Image</h1>

		{{ html()->form('POST')->route('pimages.store')->open() }}
				
			@include ('Pimage._form')

		{{ html()->form()->close() }}	

	@stop
	
@endif