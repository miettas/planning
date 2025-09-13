@if(Auth::check())

	@extends('layouts/app')


	@section('content2')
	

		<h1>Edit: {!! $page->pname !!}</h1>

		{{ html()->modelForm($page, 'PUT')->route('pages.update', $page->pid)->open() }}

			@include ('Page._form')

		{{ html()->closeModelForm() }}


	@stop

@endif