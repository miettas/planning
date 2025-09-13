<div class="row">
	<div class="col">
		<p>
			Chapter Name:<br />
			{{ html()->text('chapname')->size('40%') }}
		</p><p>
			Book ID:<br />
			{{ html()->text('books_pl_bkid')->size('40%') }}	
		</p><p>
			Directory ID:<br />
			{{ html()->text('directories_pl_dirid')->size('40%') }}	
		</p><p>
			Sort:<br />
			{{ html()->text('sort_order')->size('40%') }}	
		</p>
	</div>
	<div class="col">
		<div class="form-group">
			<p>Book Descroption
				{{ html()->textarea('bkdescription')->rows(12)->cols(50) }}
			</p>
		</div>
		
	</div>
</div>

<input class="btn btn-primary" type="submit" value="Submit">