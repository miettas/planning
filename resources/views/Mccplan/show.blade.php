@extends('layouts/app')

@section('content')

	<div class="block w100">
		@include('includes.headings')
	</div>
<div class="row">
	<!-- col 1 - sidebar -->
	<div class="d-none d-sm-block col-sm-3">
		@include('/includes.nextPrevPage', ['tble'=>'mccplans', 'editTable'=>$page->mccid, 'id'=>'mccid', 'text'=>'Page'])<br />
		<h4 class="blu" style="font-style:italic;">Pages</h4>
			@foreach ($pages as $pge)
				<p><a href="{{ url('mccplans', [$pge->mccid]) }}">{{ $pge->mccdescription }}</a></p>
			@endforeach
	</div>	

<!-- col 2 - main content -->

<div class="col" style="max-width:520px;">		
	
	@include('includes.searches', ['tble' => 'SearchMccplans'])

	<h3>{{ $page->chapter }}</h3>
	<table width="100%" ><tr><td width="10%" >
		<div class="d-sm-none">
			<h3 class="blu" style="font-style:italic;">{{ $page->chapters }}</h3>
		</div>
		<div class="hyphenate" id="fnote" style="text-align:justify;">
		{!! $page->mccinfo !!}
		</div>	
	</td></tr><tr><td>
		<span style="text-align:center">@include('/includes.nextPrev', ['tble'=>'mccplans', 'editTable'=>$page->mccid, 'id'=>'mccid', 'textBook'=>'Chapter', 'textChap'=>'Page'])</span>
	</td></tr></table>
		</div>
		
	<div class="d-none d-sm-block col-sm-1">
	</div>
	
</div> 
<!-- - - - - -->		


@stop

<!-- <div class="col" style="max-width:520px;">		
		@include('includes.searches', ['tble' => 'SearchMunros'])
		<h3>{!! $page->amchapter !!}</h3>

		<table width="100%" ><tr><td width="10%" >
			<div class="d-sm-none"></div>
			<div class="hyphenate" id="fnote" style="hyphenate; text-align:justify;"> -->