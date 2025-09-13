<div class="row">
    <p>
        Image Name:<br />
        {{ html()->text('pname')->size('40%') }}	
    </p><p>
        Path:<br />
        {{ html()->text('ppath')->size('40%') }}	
    </p><p>
        Extension:<br />
        {{ html()->text('pext') ->size('40%')}}
    </p><p>
        Alt:<br />
        {{ html()->text('palt')->size('40%') }}	
    </p><p>
        Caption:<br />
        {{ html()->text('pcaption')->size('40%') }}
    </p><p>
        Credit:<br />
        {{ html()->text('pcredit')->size('40%') }}
    </p>
    </p><p>
        Rating:<br />
        {{ html()->text('rating')->size('40%') }}
    </p><p>
    </p><p>
        City Streets ID:<br />
        {{ html()->text('Streets-id')->size('40%') }}
    </p>
</div>


<input class="btn btn-primary" type="submit" value="Submit">