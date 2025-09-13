@extends('layouts/app')
@section('content')

	<div class="row">

		<div class="col-sm-3"> <!-- col 1 -->
			<img src="{{$book->bkthumb}}" alt="{{$book->bkname}}"width="100%" style="max-width:150px;max-height:120px; float: right;" />
		</div>	<!-- end col 1 -->

		<div class="col hyphenate" style="max-width:520px; text-align:justify"> <!-- col 2 -->
			@include('includes.searches', ['tble' => 'SearchChapters_pls'])
			<h1>{!! $book->bkname !!}</h1>
		
			@if(strlen($book->bkauthor))Author: {{ $book->bkauthor }}; @endif
			@if(strlen($book->publisher))Publisher: {{ $book->publisher }} @endif
			@if(strlen($book->datepublished))<br />Date Published: {{ $book->datepublished }}; @endif
			@if(strlen($book->isbn))ISBN: {{ $book->isbn }}@endif

			<p>
				@foreach($book->chapters_pl as $chap)
					<a href="{!!url('chapters', [$chap->chapid])!!}">{!! $chap->chapname !!}</a>, 
				@endforeach
			</p><br />	
			
			<span style="text-align:center">@include('/includes.nextPrevMin',['tble'=>'books', 'editTable'=>$book->bkid, 'id'=>'bkid', 'text'=>'Book'])</span>
		</div>
		<div class="col-1"> <!-- col 3 -->
		</div>
	</div>	

@stop
