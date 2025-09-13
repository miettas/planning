@if(Auth::check())

	@extends('layouts/app')


	@section('content')

			<h1>Edit: {!! $mimages->imgname !!}</h1>

			{{ html()->modelForm($mimages, 'PUT')->route('mimages.update', $mimages->imgid)->open() }}

				@include ('Mimage._form')

			{{ html()->closeModelForm() }}	
		

	@stop

@endif