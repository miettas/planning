@if(Auth::check())

	@extends('layouts/app')


	@section('content')

		<h1>New SearchStreets</h1>

		
			{{ html()->form('POST')->route('Streets.store')->open() }}
			
				@include ('Street._form')

			{{ html()->form()->close() }}	
	
	@stop

@endif