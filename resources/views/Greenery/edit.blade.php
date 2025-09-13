@if(Auth::check())

	@extends('layouts/app')


	@section('content2')


		<h1>Edit: {!! $page->grname !!}</h1>

		{{ html()->modelForm($page, 'PUT')->route('greeneries.update', $page->grid)->open() }}

			@include ('Greenery._form')

		{{ html()->closeModelForm() }}	

	@stop

@endif