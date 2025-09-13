@if(Auth::check())

	@extends('layouts/app')
		@section('content2')

			<h1>New Article</h1>

			{{ html()->form('POST')->route('articles.store')->open() }}
			
				@include ('Article._form')

			{{ html()->form()->close() }}		
			

		@stop
		

@endif

		