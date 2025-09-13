<h3>{!! $plan->plname !!}</h3>
@if(count($plan->buildings))
	{!! $plan->buildings->buildname !!}<br />
@endif
@if(count($plan->addresses) && strlen($plan->addresses->suburb))
	Address:  
	{!! isset($plan->addresses->stnmbr) ? $plan->addresses->stnmbr : $plan->addresses->lot_number !!}  
	{!! $plan->addresses->street !!}, 
	{!! $plan->addresses->suburb !!}. 
	{!! strtoupper($plan->addresses->state) !!}
	{!! $plan->addresses->postcode !!}<br />
@endif
<p>
	{!! $plan->plid  !!} : 
	{!! $plan->plname or '' !!} <br />
	{!! $plan->plinfo !!}
</p>
<p>
	<h4><a href="{{action('PlansController@show', [$plan->plid-1])}}" style="button type='button' class='btn' ">< Previous</a>&nbsp;&nbsp;&nbsp;
	<a href="{{action('PlansController@show', [$plan->plid+1])}}" style="button type='button' class='btn' ">Next ></a></h4><br />
	@if (Auth::check())<a href="{!!action('PlansController@edit', [$plan->plid])!!}">( Edit )</a>@endif
</p>