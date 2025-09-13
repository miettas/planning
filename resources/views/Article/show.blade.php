@extends('layouts/app')

@section('vars')
	@php
		$rev_article = '';
		if(!empty($article->mimages)){
			$rev_article = preg_replace('[mimage/\d+]', '$article->mimages->imgpath/$article->mimages->imgname.$article->mimages->imgext',$article->article);
		}
	@endphp
@endsection
@section('content')
	<div class="row">
		<div class="col-sm-3">
		
			<div class="d-none d-sm-block">
				@if($article->artsidebar)
					<table width="100%"><tr><td width="100%">
				@endif
				<p>{!! $article->artsidebar !!}</p>
				@if($article->artsidebar)
					</td></tr><tr><td>	
				@endif	
				@if (!empty($tag))
					<h4>Related stories</h4>
					@foreach ($tag as $t)
						<p><a href="/articles/{{$t->artid}}">{{$t->headline}}</a></p>
					@endforeach
				@endif	
				@if($article->artsidebar)
					</td></tr></table>	
				@endif	
			</div>
		</div>	
	
		<div class="col" style="max-width:520px;">
	
			@include('includes.searches', ['tble' => 'SearchArticles'])
				<h1>{!!  $article->headline !!}</h1> {{$article->people}}
				<p> @if(!empty($article->artauthor))<strong>{!! $article->artauthor !!}</strong><br />@endif
					@if(!empty($article->artcredit)){!! $article->artcredit !!}@endif
					@if(!empty($article->artdate)){!! $article->artdate !!}@endif
				</p>
				<p>
					@if(!empty($article->people))
						 {{ $article->people->salutation ?? '' }} {{ $art->peoplefirst ?? '' }} {{ $article->people->last ?? '' }} {{ $article->people->honorifics ?? '' }}
					@endif

					@if(!empty($article->artimage))
						<div class="block w100" >{!! $article->artimage ?? '' !!}<br /><span class="caption">{!! $article->artcaption !!}<br /></span></div><br />
					@endif

					@if(!empty($article->abstract))
						<div style="text-decoration: none">
							<p><strong>{!! $article->abstract !!}</strong></p>
						</div>
					@endif
					@if(strlen($article->article))
						<div  class="hyphenate" style="text-decoration: none;hyphenate; text-align:justify;">
							{!! $article->article !!}
						</div>
					@endif
				</p>
					<br />

				<span style="text-align:center">@include('/includes.nextPrevMin',['tble'=>'articles', 'editTable'=>$article->artid, 'id'=>'artid', 'text'=>'Article'])</span>
				
	
		
		<div class="col-1">
			
		</div>
	</div>			

@stop

