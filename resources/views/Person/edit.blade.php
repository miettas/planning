@if(Auth::check())

	@extends('layouts/app')

	@section('content2')

		<h1>Edit: {!! $person->ppname !!}</h1>

		{{ html()->modelForm($person, 'PUT')->route('people.update', $person->ppid)->open() }}

			@include ('Person._form')

		{{ html()->closeModelForm() }}

	@stop

@endif