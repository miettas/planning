@if(Auth::check())

	@extends('layouts/app')


	@section('content2')

		<h1>New Footnote</h1>

		{{ html()->form('POST')->route('munrofootnotes.store')->open() }}

			@include ('Munrofootnote._form')

		{{ html()->form()->close() }}	

	@stop

@endif