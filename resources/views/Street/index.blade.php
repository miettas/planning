@extends('layouts/app')

@section('content')

<div class="row p-4">

	<!-- col 1 -->

	<div class="col-4" style="max-width:150px;">
		
	</div>
	<!-- end col 1 -->
	
	<!-- col 2 -->
	<div class="col-8" > 

		@include('includes.searches', ['tble' => 'SearchStreets'])
		
		@if( isset($noresult))
			<h3>{{ $noresult }}</h3>
		@else
			<h2>Streets</h2>
			
			<div class="flex flex-col  sm:flex-row sm:pl-6 align-top  align-text-top">
				@foreach($streets as $s)
		
					<table>
						<tr >
							<td style="">
								<img src="{{$s->thumb}}" width="150px">
							</td>
						
							<td style="padding-left:20px">
								<div  class="basis-4/5 max-w-[560px]" >
									<h4><a  href="{{url('streets', $s->id)}}">{!!  $s->streetname !!}</a></h4>

								</div>
							</td>
						</tr>
					</table>
					<!-- image -->
					
					

					<!-- book info -->
					
				
					
				@endforeach
				
			</div>
		@endif

	</div>
	<!-- end col 2 -->

	<!-- col 3 -->
	<div class="col-1">
	
	</div>
</div>
	<!-- end row -->

@endsection