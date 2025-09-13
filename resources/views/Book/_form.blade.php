<div class="row">
	<div class="col">
		<p>
			ID:<br />
			{{ html()->text('bkid')->size('40%') }}
		</p><p>
			Name:<br />
			{{ html()->text('bkname')->size('40%') }}	
		</p><p>
			Author:<br />
			{{ html()->text('bkauthor')->size('40%') }}	
		</p><p>
			Publisher:<br />
			{{ html()->text('publisher') ->size('40%')}}																
		</p><p>
			isbn:<br />
			{{ html()->text('isbn')->size('40%') }}	
		</p><p>
			Publication Date:<br />
			{{ html()->text('datepublished')->size('40%') }}																
		</p><p>
			Type:<br />
			{{ html()->text('bktype')->size('40%') }}																
		</p><p>
			Thumbnail:<br />
			{{ html()->text('bkthumb')->size('40%') }}																
		</p>
	</div>
	<div class="col">
		<p>	
			Description:<br />
			{{ html()->textarea('bkdescription')->rows(11)->cols(50) }}
		
		</p><p>	
			Info:<br />
			{{ html()->textarea('bkinfo')->rows(12)->cols(50) }}		
		</p>
		
	</div>

	
	
</div>
<br />
	<input class="btn btn-primary" type="submit" value="Submit">
