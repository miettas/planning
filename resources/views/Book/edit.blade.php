@if(Auth::check())

	@extends('layouts/app')


	@section('content2')

		<h1>Edit: {!! $book->bkname !!}</h1>

		{{ html()->modelForm($book, 'PUT')->route('books.update', $book->bkid)->open() }}

			@include ('Book._form', ['SubmitButtonText' => 'Update Book'])

		{{ html()->closeModelForm() }}	
		
	@stop

@endif