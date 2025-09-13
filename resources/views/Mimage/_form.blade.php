<div class="row">
	<div class="col">
		<p>
			Image Name:<br />
			{{ html()->text('imgname')->size('40%') }}	
		</p><p>
			Path:<br />
			{{ html()->text('imgpath')->size('40%') }}	
		</p><p>
			Extension:<br />
			{{ html()->text('imgext') ->size('40%')}}
		</p><p>
			Alt:<br />
			{{ html()->text('alt')->size('40%') }}	
		</p><p>
			Caption:<br />
			{{ html()->text('caption')->size('40%') }}
		</p><p>
			Credit:<br />
			{{ html()->text('credit')->size('40%') }}
		</p><p>
			Person ID:<br />
			{{ html()->text('person_ppid')->size('40%') }}		
		</p>
	</div>
	<div class="col">
		<p>
			Place ID:<br />
			{{ html()->text('') ->size('40%')}}	
		</p><p>
			Article ID:<br />
			{{ html()->text('article_artid')->size('40%') }}	
		</p><p>
			Comments:<br />
			{{ html()->textarea('imgcomments')->rows(15)->cols(45) }}
																	
</p>
		
	</div>
</div>

<input class="btn btn-primary" type="submit" value="Submit">