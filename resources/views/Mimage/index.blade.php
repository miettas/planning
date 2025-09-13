@extends('layouts/app')
<!--  -->
@section('vars')

@stop
@section('content')
	 
	<div class="row">

		<div class="col-sm-2">
			&nbsp;
		</div>

		<div class="col">

			<div class="d-none d-sm-block">
				@include('includes.searches', ['tble' => 'SearchMimages'])
			</div>
			
			
				<div class="col-9">
					<h1>Images</h1>
				
						@foreach ($mimages as $img)
							<p>
								<a href="{{ url('mimages', [$img->imgid]) }}">
									<img src="{{ $img->imgpath }}/{{ $img->imgname }}.{{$img->imgext}}" alt="{!! $img->alt !!}" width="220px"  />	
								<br />
								<span class="caption">{{ $img->caption }}</span>	
							</a>
							<br />
							</p>
							
						@endforeach
				
			</div>
			<div class="col">
			<span class="caption">{{$img->caption}}</span></a><br /><br />
	</div>
		</div></div>
{!! $mimages->render() !!}

@stop