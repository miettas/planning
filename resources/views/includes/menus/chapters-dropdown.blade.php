
<ul>
 	@foreach($chapter as $chap)
   		<li><a href="{{action('ChaptersController@show', [$chap->chapid])}}">{{$chap->chapname}}</a></li>
    @endforeach
</ul>