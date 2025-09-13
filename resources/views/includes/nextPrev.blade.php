<br />
<p >
	<strong><big>
		<a href="{{$prevChap}}" > < Previous {{$textBook}}</a>
		<br />

		<a href="{{$prevPage}}" > < Previous {{$textChap}}</a>
			&nbsp;:&nbsp;
		<a href="{{$nextPage}}" > Next {{$textChap}} ></a>
		
		<br />
		<a href="{{$nextChap}}" > Next {{$textBook}} ></a></big>
	</strong>

	@if (Auth::check())<br /><a href='{!!url("$tble/$editTable/edit")!!}'>( Edit )</a>@endif
</p>
