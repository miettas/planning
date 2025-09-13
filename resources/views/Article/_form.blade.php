<div class="container-fluid">
	<div class="row">
		<div class="col-3">
			{{ html()->label('ID: ') }}
			{{ html()->text('artid') }}
		</div><div class="col-3">
			{{ html()->label('Person ID: ') }}
			{{ html()->text('people_pl_ppid') }}		
			</div><div class="col-3">
			{{ html()->label('Directory ID:') }}
			{{ html()->text('directories_pl_dirid') }}
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-6">	
			<table width="100%">
				<tr width="50%">
					<td>
					{{ html()->label('Sort:') }}
				</td><td >
					{{ html()->text('artsort')->size('30%') }}
				</tr><tr><td>	
					{{ html()->label('Name/Headline:') }}
				</td><td>
					{{ html()->text('headline')->size('30%') }}
				</tr><tr><td >
					{{ html()->label('Date:') }}
				</td><td >
					{{ html()->text('artdate')->size('30%') }}
					</tr><tr><td >
					{{ html()->label('Author:') }}
				</td><td>
					{{ html()->text('artauthor')->size('30%') }}
					</tr><tr><td >
					{{ html()->label('Credit:') }}
				</td><td>
					{{ html()->text('artcredit')->size('30%') }}
					</tr><tr><td >
					{{ html()->label('Thumbnail:') }}
				</td><td>
					{{ html()->textarea('artthumb')->cols('30') }}
				</tr><tr><td >
					{{ html()->label('Image:') }}
				</td><td>
					{{ html()->textarea('artthumb')->cols('30') }}
				</tr><tr><td >
					{{ html()->label('Caption:') }}
				</td><td>
					{{ html()->textarea('artcaption')->cols('30') }}
				</tr><tr><td >
					{{ html()->label('Tag:') }}
				</td><td>
					{{ html()->text('arttag')->size('30%') }}
				</td></tr>
			</table>
		</div>
			
			
			<table>
				<tr><td>
					{{ html()->label('Abstract:') }}
				</td><td>
					{{ html()->textarea('abstract')->rows(6)->cols(36) }}
				</tr><tr><td>
					{{ html()->label('Article:') }}
				</td><td>
					{{ html()->textarea('article')->rows(6)->cols(36) }}
				</tr><tr><td>
					{{ html()->label('Sidebar:') }}
				</td><td>
					{{ html()->textarea('artsidebar')->rows(6)->cols(36) }}
				</td></tr>						
			</table>
			
		</div>
	</div>
	<br />
	<input class="btn btn-primary" type="submit" value="Submit">
	
