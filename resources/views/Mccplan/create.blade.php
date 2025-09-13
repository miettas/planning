@if(Auth::check())

	@extends('layouts/app')


	@section('content2')

		<h1>New Page</h1>


		{{ html()->form('POST')->route('mccplans.store')->open() }}
				
			@include ('Mccplan._form')

		{{ html()->form()->close() }}	

	@stop

@endif