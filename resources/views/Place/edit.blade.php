@if(Auth::check())

	@extends('layouts/app')


	@section('content')
<div class="row">
<div class="col-sm-2">&nbsp;</div>

	<h1>Edit: {!! $place->plname !!}</h1>

		{{ html()->modelForm($place, 'PUT')->route('places.update', $place->plid)->open() }}

			@include ('Place._form')

		{{ html()->closeModelForm() }}
		
		</div>
		</div>


	@stop

@endif