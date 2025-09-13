
@if(Auth::check())

	@extends('layouts/app')

	@section('content2')


		<h1>New Item</h1>

			{{ html()->form('POST')->route('directories.store')->open() }}
				
				@include ('Directory._form', ['SubmitButtonText' => 'Add Item'])

			{{ html()->form()->close() }}	


@stop

@endif