@extends('layouts/app')

@section('vars')
@stop

@section('content')

<body style="background-color:black; ">

	<div class="container" >
		<div class="row">
			<div class="col">
				<div style="background-color: black; color:white;">
					
					<h2>{{str_replace(" images","",$pimage->palt)}}</h2>
					@php
						list($big,$small,$width) = imageSize($pimage->ppath,$pimage->pname,$pimage->pext);
					@endphp
					
					
					
					<picture>
						<source srcset='{{ $big }}' media='(min-width: 640px)' > <img src='{{ $small }}' alt="{!! $pimage->palt !!}" width="{{ $width }}" />	
					</picture> 
					
					<br />
					<span class="caption">
						@if(strlen($pimage->pcaption))
							{!! $pimage->pcaption!!}</i>
						@endif
						<small><i>{!! "Photo: ",$pimage->pcredit ?? '' !!}</i></small>
					</span>
				</div>

				<span style="text-align:center">
					<span class="text-center">@include('/includes/next_prev_pimage')</span>
				</span>

				@if (Auth::check())<br /><a href="{{ url('pimages/edit', [$pimage->pimgid]) }}">( Edit )</a> @endif
			</div>
		</div>
	</div>
</body>
@stop