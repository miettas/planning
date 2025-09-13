@if(Auth::check())

	@extends('layouts/app')


	@section('content2')

		<h1>New Person</h1>

		{{ html()->form('POST')->route('people.store')->open() }}

			@include ('Person._form')

		{{ html()->form()->close() }}	

	@stop

@endif