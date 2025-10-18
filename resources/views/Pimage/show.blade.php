@extends('layouts/guest')

@section('content')

	<div class="container" >
		<div class="row">
			<div class="col">
				
					
					<h2>{{$st->streetname}}</h2>
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
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</body>
@endsection