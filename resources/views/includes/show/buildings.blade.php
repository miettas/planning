<h3>{!! $build->buildname !!}</h3>

@if(count($build->client))	
	Client: {!!$build->client!!}
@endif
@if(count($build->jobnumber))
	<br />
	Job Number: {!!$build->jobnumber!!}
@endif
<!--address-->
@if(count($build->addresses) && strlen($build->addresses->suburb))
	<br />
	Address:  
	{!! isset($build->addresses->stnmbr) ? $build->addresses->stnmbr : $build->addresses->lot_number !!}  
	{!! $build->addresses->street !!}, 
	{!! $build->addresses->suburb !!}. 
	{!! strtoupper($build->addresses->state) !!}
	{!! $build->addresses->postcode !!}
@endif
<!-- Date or project -->	
@if(count($build->date_built)) 
	<br />
	Plan Dated: {!! $build->date_built !!}
@endif
<!-- drawing info -->
@if(count($build->builddescription)  && strlen($build->builddescription))
	<br />
	Description: {!!$build->builddescription!!}
@endif
@if(count($build->builddescription2) && strlen($build->builddescription2))
	<br />
	Description: {!!$build->builddescription2!!}
@endif
@if(count($build->drawinglocation)  && strlen($build->buildlocation))
	<br />
	Drawing Location: {!!$build->drawinglocation!!}
@endif
@if(count($build->drawinglocation2)  && strlen($build->buildlocation2))
	<br />
	Drawing Location: {!!$build->drawinglocation2!!}
@endif					
<!--manuscript info-->
@if(count($build->manuscriptlocation)  && strlen($build->manuscriptlocation))
	<br />
	Manuscript Location: {!!$build->manuscriptlocation!!}
@endif
@if(count($build->manuscriptinfo)  && strlen($build->manuscriptinfo))
	<br />
	Manuscript Info: {!!$build->manuscriptinfo!!}
@endif
@if(count($build->manuscriptcomment)  && strlen($build->manuscriptcomment))
	<br />
	Manuscript Comment: {!!$build->manuscriptcomment!!}
@endif 
<!--images-->
@if(count($build->buildplan)  && strlen($build->buildplan))
	<br />
	Plans:<br /><div style="margin-left:20px"><a href="{!!action('BuildingsController@edit', [$build->buildid])!!}">{!!$build->buildplan!!}</a></div>
@endif
@if(count($build->buildplan2)  && strlen($build->buildplan2))
	<br />
	Plans: {!!$build->buildplan2!!}
@endif
<!--notes-->
@if(count($build->buildnote)  && strlen($build->buildnote))
	<br />
	Notes: {!!$build->buildnote!!}
@endif
@if(count($build->keywords)  && strlen($build->keywords))
	<br />
	Keywords: {!!$build->keywords!!}
@endif
@if(count($build->otherprofessional)  && strlen($build->otherprofessional))
	<br />
	Other Professional Employed: {!!$build->otherprofessional!!}
			@endif
<br /><br />


@foreach($build->akimages as $img)
	<div class="left" style="max-width:175px;height:190px;" >
		<a href="{!! action('AkimagesController@show', [$img->imgid]) !!}">
			<img src="{!! $img->imgpath !!}/{!! $img->imgname !!}.{!! $img->imgextension !!}" alt="{!! $img->alt !!}" style="max-width:150px;"/>
		</a>
		<span class="caption">{!! $img->caption !!}</span>

	</div>			
@endforeach