@extends('layouts/guest')

@section('content')


	
	
<div class="container">
		<div>
			@include('includes.search-dark', ['tble' => 'SearchStreetsimport "resources/scss/bankgothic_medium.scss'])
		</div>

		<div class="row">
			<div class="col-12">

		
		
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
									<h5><a  href="{{url('streets', $s->id)}}">{!!  $s->streetname !!}</a></h5>

								</div>
							</td>
						</tr>
					</table>
					<!-- image -->
					
					

					<!-- book info -->
					
				
					
				@endforeach
				
			</div>
		@endif

	</div></div>
	<!-- end col 2 -->

	<!-- col 3 -->
	<div class="col-1">
	
	</div>
</div>
	<!-- end row -->

@endsection