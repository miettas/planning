@extends('layouts/app')

@section('content')
	
	<div class="row">
		<div class="col-2">
		</div>

		<div class="col-8">
			<h1>Directory Items</h1>

			@foreach ($directory as $dir)
				<p>{!! $dir->headlineCol1 !!}, {!! $dir->headlineCol2 !!}, {!! $dir->headlineCol3 !!}</p> 
			@endforeach

		</div>

		<div class="col">
		</div>

	{!! $directory->render() !!}


@stop