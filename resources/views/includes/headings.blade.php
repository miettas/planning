@if($page->book_bkid==1)
	<h2 style="margin-top:-12px; font-style:italic;padding:10px;background-color: #0066cc;">.<span style="color:white;"><small>CITY OF MELBOURNE STRATEGY PLAN 1985</small></span></h2>
	
@elseif($page->book_bkid==2)
	<h2 style="margin-top:-6px">
			<img src="/images/header/g-g_header.jpg" alt="Grids and Greenery header" width="25%" /> &nbsp; &nbsp; {!!$page->chapter_name!!}
	</h2>

@elseif($page->book_bkid==3)
	<div class="block w100" style="margin-top:-12px">
	<img  src="/images/header/gg_cs_header.jpg" alt="Grids and Greenery Case Studies header" width="30%" /><h2 style="background-color:#1a7ddb;">
		{!!$page->chapter_name!!}
	</div>
@endif
