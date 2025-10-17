<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Planning Melbourne') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
        <!-- Scripts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body class="bg-dark text-white">
        <div class="w-screen">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <a class="navbar-brand" href="#">Planning Melbourne</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="articles">Articles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="books_pls">Publications</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="people_pls">People</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="places">Places</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="streets">Streets</a>
                            </li>
                        </ul>
                    </div>
                </nav>


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
