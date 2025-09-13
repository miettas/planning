<div class="row">
	<div class="col">
        <p>
			ID:<br />
			{{ html()->text('id')->size('40%') }}	
		</p><p>
			Street:<br />
			{{ html()->text('street')->size('40%') }}
		</p><p>
			Street Name:<br />
			{{ html()->text('streetname')->size('40%') }}	
		</p><p>
			Street Info:<br />
			{{ html()->text('street_info')->size('40%') }}	
		</p>
	</div>
	<div class="col">
		<div class="form-group">
            Street Info:<br />
            {{ html()->textarea('street_info')->rows(12)->cols(50) }}
		</div>
		
	</div>
</div>

<input class="btn btn-primary" type="submit" value="Submit">