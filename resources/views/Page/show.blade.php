@extends('layouts/app')

@section('content')
@include('includes.headings')

<div class="row">
	<!-- col 1 - sidebar -->
	<div class="d-none d-sm-block col-sm-3">

		<h3 class="blu" style="font-style:italic;">Pages</h3>
		@foreach ($pages as $pge)
			<p><a href="{!! url('pages', [$pge->pid]) !!}">{{ $pge->pdescription }}</a></p>
		@endforeach

	</div>	


<!-- col 2 - main content -->

	<div class="col" style="max-width:520px;">	
			
		<span class="blu"><i>{{$page->books_pl->bkname}}<br />Chapter {{$page->chapters_pl->chapname}}</i></span>
			
		@include('includes.searches', ['tble' => 'SearchPages'])

		<h3 class="blu" style="font-style:italic;"></h3>
		<div class="hyphenate" style="hyphenate; text-align:justify;">
			{!! $page->pinfo !!}
		</div>		
		<span style="text-align:center">@include('/includes.nextPrev', ['tble'=>'pages', 'editTable'=>$page->pid, 'id'=>'pid', 'textBook'=>'Chapter', 'textChap'=>'Page'])</span>

	</div>
		
	<div class="d-none d-sm-block col-sm-1">	
	</div> 
<!-- - - - - -->		
</div>

@stop
