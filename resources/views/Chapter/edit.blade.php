@if(Auth::check())

	@extends('layouts/app')


	@section('content')

		<h1>Edit: {!! $chapter->chapname !!}</h1>
		
		{{ html()->modelForm($chapter, 'PUT')->route('chapters.update', $chapter->chapid)->open() }}

			@include ('Chapter._form', ['SubmitButtonText' => 'Update Article'])

		{{ html()->closeModelForm() }}			
		
	@stop

@endif