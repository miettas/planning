@if(Auth::check())

	@extends('layouts/app')


	@section('content')

			<h1>Edit: {!! $pimages->streetname !!}</h1>

			{{ html()->modelForm($pimages, 'PUT')->route('pimages.update', $pimages->pimgid)->open() }}

				@include ('Pimage._form')

			{{ html()->closeModelForm() }}	
		

	@stop

@endif