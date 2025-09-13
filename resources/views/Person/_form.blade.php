<div class="row">
	
	<div class="col">
		<p>
			Directories ID:<br />
			{{ html()->text('directories_pl_dirid')->size('40%') }}
		</p><p>
			First Name:<br />
			{{ html()->text('first')->size('40%') }}	
		</p><p>
			Surname:<br />
			{{ html()->text('last')->size('40%') }}	
		</p><p>
			Salutation:<br />
			{{ html()->text('salutation') ->size('40%')}}																
		</p><p>
			Honorifics:<br />
			{{ html()->text('honorifics')->size('40%') }}	
		</p><p>
			Author:<br />
			{{ html()->text('bioauthor')->size('40%') }}																
		</p><p>
			Image:<br />
			{{ html()->text('ppimage')->size('40%') }}																
		</p><p>
			Caption:<br />
			{{ html()->text('ppcaption')->size('40%') }}																
		</p><p>
			Tag:<br />
			{{ html()->text('pptag')->size('40%') }}																
		</p><p>
			Type:<br />
			{{ html()->text('type')->size('40%') }}																
		</p>
		
	</div>
	<div class="col">
		<p>	
			Biography:<br />
			{{ html()->textarea('biography')->rows(10)->cols(50) }}

		</p><p>	
			Sidebar:<br />
			{{ html()->textarea('ppsidebar')->rows(9)->cols(50) }}		
		</p><p>	
			Comments:<br />
			{{ html()->textarea('ppcomments')->rows(9)->cols(50) }}

		</p>
	</div>
</div>
<input class="btn btn-primary" type="submit" value="Submit">
