
@if(Auth::check())

	@extends('layouts/app')

	@section('content')


		<h1>Edit: {!! $directory->dname !!}</h1>

		<div style="margin-left:40px;margin-right:40px">


		{{ html()->modelForm($directory, 'PUT')->route('directories.update', $directory->dirid)->open() }}

			@include ('Directory._form')

		{{ html()->closeModelForm() }}	

			
		</div>

	@stop

@endif