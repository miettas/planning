@extends('layouts/app')

@section('content')

<div class="row">

	<div class="col-sm-2">

	</div>

	<div class="col">
		
		@include('includes.searches', ['tble' => 'SearchArticles'])
		<h1>Articles</h1>

		@foreach ($article as $art)
			@if(!strlen($art->artthumb))
				@php
					$img = $img ?? '';
					if(preg_match('/<img.*?>/', $art->article, $match)){
						$img =  $match[0];
					}
				@endphp
			@endif
			<div class="row">
				<div class="col-sm-3" >
					
					@if(strlen($art->artimage))
						<a href="{{url('articles', $art->artid)}}">{!! $art->artimage !!}</a>
					@elseif(!isset($art->artthumb))
						<a href="{{url('aticles', $art->artid)}}">{!! $img ?? '' !!}</a>	
					@elseif(strlen($art->artthumb))
						<a href="{{url('articles', $art->artid)}}">{!! $art->artthumb !!}</a>
					@endif
					<br /><br />
				</div>
				<div class="col hyphenate" style="max-width:520px; text-align:justify;">
				
					<strong><a href="{{ url('articles', [$art->artid]) }}">
					@if($art->headline)
						{{ $art->headline }}
					@endif
					</a> </strong> <br />
					{{ $art->artdate ?? '' }}
					{!! $info = abbreviate($art->abstract,$art->artid,'artid','articles',120) !!}
					<br /><br />		
				</div>
				@endforeach
			</div>
		

	</div>
	 {!! $article->render() !!}	
	<div class="col-sm-1">
	</div>
</div>


@stop




