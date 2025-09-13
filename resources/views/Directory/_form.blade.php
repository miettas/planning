<div class="row">
	<div class="col">

		<p>
			Name:<br />
			{{ html()->text('dname')->size('70%') }}	
		</p><p>
			Description:<br />
			{{ html()->textarea('dirDescription')->rows(4)->cols(78) }}
		</p><p>
			
	

			Headline Column 1:<br />
			{{ html()->text('headlineCol1') ->size('70%')}}																
		</p><p>
			Column 1:<br />
			{{ html()->textarea('infoCol1')->rows(4)->cols(78) }}
		</p>
	
		<p>
			Headline Column 2:<br />
			{{ html()->text('headlineCol2')->size('70%') }}		
		</p><p>
			Column 2:<br />
			{{ html()->textarea('infoCol2')->rows(4)->cols(78) }}												
		</p>
	
		<p>
			Headline Column 3:<br />
			{{ html()->text('headlineCol3')->size('70%') }}																
		</p><abbr>
			Column 3:<br />
			{{ html()->textarea('infoCol3')->rows(4)->cols(78) }}									
		</p><p>
			Main Image:<br />
			{{ html()->text('dirImage')->size('70%') }}	
		</p><p>
			Caption:<br />
			{{ html()->text('dirCaption')->size('70%') }}	
		</p>

	</div>
</div>
<br />
<input class="btn btn-primary" type="submit" value="Submit">

