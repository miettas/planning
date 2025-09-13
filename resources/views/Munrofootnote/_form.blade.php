
	<div class="row">
		<div class="col">

		<p>
			Number:<br />
			{{ html()->text('mfnnumber')->size('40%') }}
		</p><p>
		Chapter:<br />
			{{ html()->text('mfnchapter')->size('40%') }}	
		</p><p>
			Page:<br />
			{{ html()->text('mfnpage')->size('40%') }}	
		</p>
	</div>

	<div class="col">
		
		<p>	
			Info:<br />
			{{ html()->textarea('mfninfo')->rows(8)->cols(50) }}		
		</p>
		
	</div>
</div>

<input class="btn btn-primary" type="submit" value="Submit">
