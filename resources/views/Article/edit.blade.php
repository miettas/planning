@if(Auth::check())

	@extends('layouts/app')

	@php $id = $article->artid;  @endphp

	@section('content2')

		<h1>Edit: {!! $article->artname !!}</h1>
		
		{{ html()->modelForm($article, 'PUT')->route('articles.update', $article->artid)->open() }}

			@include ('Article._form', ['SubmitButtonText' => 'Update Article'])

		{{ html()->closeModelForm() }}		

		

	@stop

@endif

