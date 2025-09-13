@extends('layouts/app')

@section('content')

	<div class="row" >
		
		<div class="d-none d-sm-block col-sm-2">
				@if($person->ppsidebar)
					<p>{!! $person->ppsidebar !!}</p><br />
				@endif	
				@if (strlen($auth_tag))
					<h4>Stories by {{$person->first}} {{ $person->last }}</h4>
					@foreach ($auth_tag as $at)
						<p><a href="/articles/{{$at->artid}}">{{$at->headline}}</a></p>
					@endforeach
				@endif	
				@if (!empty($tag))
					<h4>Related stories</h4>
					@foreach ($tag as $t)
						<p><a href="{{url('articles', [$t->artid])}}">{{$t->headline}}</a></p>
					@endforeach
				@endif
			</div>
		

			<div class="col hyphenate" style="max-width:520px; text-align:justify">
				@include('includes.searches', ['tble' => 'SearchPeople'])

				<h1>{{ $person->salutation.' '  ?? ''}}{{ $person->first.' '  ?? ''}}{{  $person->last }} {{ $person->honorifics  ?? '' }}</h1>
				
				@if($person->ppimage)
					<div class="block w40 right">
						{!! $person->ppimage !!}
						<span class="caption">{!! $person->ppcaption !!}
					</span></div>
				@endif
				{!! $person->biography ?? '' !!}<br />
				{!! $person->bioauthor ?? '' !!}<br />
				{!! $person->ppcredit ?? '' !!}<br />

				<span style="text-align:center">@include('/includes.nextPrevMin',['tble'=>'people', 'editTable'=>$person->ppid, 'id'=>'ppid', 'text'=>'Person'])</span>
				
		</div>
		<div class="d-none d-sm-block col-sm-1">
		</div>
	</div>
	

@stop
