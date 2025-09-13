@extends('layouts/app')

@section('content')


	<div class="row">
	<!-- col 1 - sidebar -->
		<div class="d-none d-sm-block col-sm-3">
			@include('/includes.nextPrevPage', ['tble'=>'greeneries', 'editTable'=>$page->grid, 'id'=>'grid', 'text'=>'Page'])
			<br />
	
			<h3 class="blu" style="font-style:italic;">Chapters</h3>
			@foreach ($pages as $pge)
				<p><a href="{{ url('greeneries', [$pge->grid]) }}">{!! $pge->grdescription !!}</a></p>
			@endforeach
		</div>	

	<!-- col2 - main col ----->

		<div class="col" style="max-width:520px;">	

			@include('includes.searches', ['tble' => 'SearchGreeneries'])
								
			<span style="text-align:justify">{!! $page->grinfo !!}</span>
			
			<span style="text-align:center">@include('/includes.nextPrev', ['tble'=>'greeneries', 'editTable'=>$page->grid, 'id'=>'grid', 'textBook'=>'Chapter', 'textChap'=>'Page'])</span>
		
		</div>
			
		<div class="d-none d-sm-block col-1">
	

		</div>
	</div>
<!-- - - - - -->		


@stop

