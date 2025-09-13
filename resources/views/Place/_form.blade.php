<p>
	Name:<br />
	{{ html()->text('plname')->size('80%') }}	
</p><p>
	Author:<br />
	{{ html()->text('bkauthor')->size('80%') }}	
</p><p>
	Image:<br />
	{{ html()->text('plimage') ->size('80%')}}																
</p><p>
	Info:<br />
	{{ html()->textarea('plinfo')->rows(12)->cols(89) }}
</p><p>
	Address ID:<br />
	{{ html()->text('address_adrid')->size('80%') }}																
</p><p>
	Author/Credit:<br />
	{{ html()->text('plauthor')->size('80%') }}																
</p><p>
	Caption:<br />
	{{ html()->text('plcaption')->size('80%') }}																
</p><p>
	Tag:<br />
	{{ html()->text('pltag')->size('80%') }}																
</p>

<input class="btn btn-primary" type="submit" value="Submit">
