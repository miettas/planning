@extends('layouts/app')

@section('vars')
@stop
@section('content')
<body style="background-color: black;">
	<div class="container">
		<div>
			@include('includes.searches', ['tble' => 'SearchPimages'])
		</div>

		<div class="row">
			<div class="col-12">
				@if(!empty($pimages))
					
					@foreach ($pimages as $img)
						
						<!-- image -->	

						<div class="d-inline-flex flex-row mb-3 max-width:200px">
							<a  href="{{url('pimages',[$img->pimgid])}}">
								<img src="{{ $img->ppath }}/{{ $img->pname }}.{{$img->pext}}" alt="{!! $img->palt !!}" width="{{ $img->width }}"  />	
							</a>
						</div>
					@endforeach
				
				@endif
			</div>	
		</div>
	</div>
	
</body>

@stop
