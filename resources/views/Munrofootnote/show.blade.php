@extends('layouts/app')

@section('content')

	<div class="block w100">
		@include('includes.headings')
	</div>
	<div class="row">
<!-- col 1 - sidebar -->
		

<!-- col 2 - main content -->

		<div class="col" style="max-width:520px;">	
			
	
			@include('includes.searches', ['tble' => 'SearchMunrofootnotes'])
	<h3>Footnote</h3>	
		<span id="fnote">
			{!! $page->mfninfo !!}
</span>
		</div>
		
<!-- col 3- - - - -->	

		<div class="d-none d-sm-block col-sm-1">
		</div>
	
	</div> 
		


@stop
