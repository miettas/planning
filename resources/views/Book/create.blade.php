@if(Auth::check())

	@extends('layouts/app')

		@section('content')
			<h1>New Book</h1>

			<div style="margin-left:40px;margin-right:40px">

				{{ html()->form('POST')->route('books.store')->open() }}
				
					@include ('Book._form', ['SubmitButtonText' => 'Add Book'])

				{{ html()->form()->close() }}	

			</div>
		@stop

@endif