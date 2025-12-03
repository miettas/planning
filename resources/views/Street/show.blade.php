@extends('layouts/guest')

@section('content')
	<div class="row">
		
	<!-- col 1 - sidebar -->
		<div class="col-1">
		</div>
			
	<!-- col 2 - main content -->
		<div class="col colspan:col-8">
		<h2>{{$streets->streetname}}</h2>
        @include('includes.search-dark', ['tble' => 'SearchStreets'])
			<div class="ml-4" style="background-color:black;">

				@if(isset($img200))

					@foreach($img200 as $img)
					
						<div style="display:inline-block;margin-top:10px;margin-left:10px;max-width:200px;>" >
							<a href="{!! url('pimages', [$img->pimgid] ) !!}">
								<img src="{!! $img->ppath !!}/{!! $img->pname !!}.{!! $img->pext !!}" alt="{!! $img->palt !!}" width="{!! $img->width !!}" >	
							</a>
						</div>
					@endforeach

				@endif
				
				<span style="text-align:center">
					@include('/includes.nextPrevMin',['tble'=>'streets', 'editTable'=>$streets->id, 'id'=>'id', 'text'=>'City Streets'])
				</span>
			</div>
		<div class="d-none d-sm-block col-1">

		</div>
	</div>
    </div>
<!-- - - - - -->
 @endsection