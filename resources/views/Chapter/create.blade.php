@if(Auth::check())

	@extends('layouts/app')


	@section('content')

		<h1>New Chapter</h1>

		
			{{ html()->form('POST')->route('chapters.store')->open() }}
			
				@include ('Chapter._form')

			{{ html()->form()->close() }}	
	
	@stop

@endif