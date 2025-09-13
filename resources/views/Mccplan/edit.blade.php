@if(Auth::check())

	@extends('layouts/app')


	@section('content2')
	

		<h1>Edit: {!! $page->mccname !!}</h1>

		{{ html()->modelForm($page, 'PUT')->route('mccplans.update', $page->mccid)->open() }}

			@include ('Mccplan._form', ['SubmitButtonText' => 'Update Book'])

		{{ html()->closeModelForm() }}	

	@stop

@endif