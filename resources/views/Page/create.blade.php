@if(Auth::check())

	@extends('layouts/app')


	@section('content2')

		<h1>New Page</h1>

		{{ html()->form('POST')->route('pages.store')->open() }}

			@include ('Page._form')

		{{ html()->form()->close() }}	

	@stop

@endif