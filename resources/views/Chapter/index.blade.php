@extends('layouts/app')

@section('content')
<div class="row">

	<div class="d-none d-sm-block col-2"> <!-- col 1 -->
		
	</div>	<!-- end col 1 -->

	<div class="col-sm"> <!-- col 2 -->

		@include('includes.searches', ['tble' => 'SearchChapters'])
		
		@if( isset($noresult))
			<h3>{{ $noresult }}</h3>
		@else
			<h1>Chapters</h1>
		
			@foreach ($chapter as $chap)
				<p>{!!url('chapters', $chap->chapid)!!}
					<a href=""><strong>{!!  $chap->chapname !!}</strong></a>
				</p>
			@endforeach	
		@endif
		{!! $chapter->render() !!}		

	</div>	<!-- end col 2 -->

	<div class="d-none d-sm-block col-1">
	
	</div>
	</div>	<!-- end row -->

@endsection