<p >
	<strong>
		<a href="{{url('pimages', ['pimgid' => $prevChap])}}" >< Previous Street</a>
			<br />
		<a href="{{url('pimages', ['pimgid' => $prevPage])}}" >< Previous Image</a>
			&nbsp;:&nbsp;
		<a href="{{url('pimages', ['pimgid' => $nextPage])}}" >Next Image ></a>
		<br />
		<a href="{{url('pimages', ['pimgid' => $nextChap])}}" >Next  Street ></a>
	</strong>
	<br />
	@if (Auth::check())<a href='{!!url("pimages/$pimage->pimgid/edit")!!}'>( Edit )</a>@endif
</p>