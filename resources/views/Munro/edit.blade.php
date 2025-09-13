@if(Auth::check())

	@extends('layouts/app')


	@section('content2')
	

		<h1>Edit: {!! $page->amname !!}</h1>

		{{ html()->modelForm($page, 'PUT')->route('munros.update', $page->amid)->open() }}

			@include ('Munro._form')

		{{ html()->closeModelForm() }}


	@stop

@endif