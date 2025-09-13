@if(Auth::check())

	@extends('layouts/app')


	@section('content')

		<h1>Edit: {!! $streets->streetname !!}</h1>
		
		{{ html()->modelForm($streets, 'PUT')->route('Streets.update', $streets->id)->open() }}

			@include ('Street._form', ['SubmitButtonText' => 'Update City Streets'])

		{{ html()->closeModelForm() }}
		
	@stop

@endif