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
								<img src="{!! $img->ppath !!}/{!! $img->pname !!}.{!! $img->pext !!}" alt="{!! $img->palt !!}" width="$img->width" >	
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
</body>
<!-- - - - - -->