@if(Auth::check())

	@extends('layouts/app')


	@section('content2')
	

		<h1>Edit: {!! $page->mfnnumber !!}</h1>

		{{ html()->modelForm($page, 'PUT')->route('munrofootnotes.update', $page->mfnid)->open() }}

			@include ('Munrofootnote._form')

		{{ html()->closeModelForm() }}


	@stop

@endif