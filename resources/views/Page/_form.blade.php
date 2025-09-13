
	<div class="row">
		<div class="col">
		<p>
			Page Name:<br />
			{{ html()->text('pname')->size('40%') }}
		</p><p>
			Chapter ID:<br />
			{{ html()->text('chapters_pl_chapid')->size('40%') }}	
		</p><p>
			Book ID:<br />
			{{ html()->text('books_pl_bkid')->size('40%') }}	
		</p><p>
		Page Description:<br />
			{{ html()->text('pdescription') ->size('40%')}}																
		</p><p>
			Chapter Name:<br />
			{{ html()->text('chapter_name')->size('40%') }}	
		</p>

	</div>

	<div class="col">
	<p>	
		Info:<br />
		{{ html()->textarea('pinfo')->rows(15)->cols(50) }}
	</p>
	
	</div>
</div>
<input class="btn btn-primary" type="submit" value="Submit">
