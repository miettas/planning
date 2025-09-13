@extends('layouts/app')

@section('content')
	<div class="row">

		<div class="d-none d-sm-block col-sm-2">
		</div>

		<div class="col" style="margin-left:3%">	
				@include('includes.searches', ['tble' => 'SearchPlaces'])
			<h1>Place</h1>
				
			@foreach ($place as $plc)
				@php
					$img = '';
	  				if(preg_match('/<img.*?>/', $plc->plinfo, $match)){
		  				$img = $match[0];
		  			}
				@endphp
				<div class="row">
					<div class="col-sm-3">
					
						<div style="max-width:160px;">
							{!! strlen($plc->plimage) ? $plc->plimage : $img !!}	
							</div>
						<br />
					</div>
					<div class="col hyphenate" style="max-width:520px; text-align:justify">

						<a href="{{ url('places', [$plc->plid]) }}"><strong>{{ $plc->plname }}</strong></a> <br />

						{!! $info = abbreviate($plc->plinfo, $plc->plid,'places',180) !!}
						
						
						<br /><br />
					</div>
				</div>
					
			@endforeach
		</div>
		
	</div>


	{!! $place->render() !!}


@endsection