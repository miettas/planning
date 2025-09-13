@if(Auth::check())

	@extends('layouts/app')


	@section('content2')

		<h1>New Page</h1>

		{{ html()->form('POST')->route('mimages.store')->open() }}

			@include ('Munro._form')

		{{ html()->form()->close() }}	

	

	@stop

@endif