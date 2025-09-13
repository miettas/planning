
<ul>
 	@foreach($page as $p)
   		<li><a href="{{action('PagesController@show', [$p->pid])}}">
   		pname}}</a></li>
    @endforeach
</ul>