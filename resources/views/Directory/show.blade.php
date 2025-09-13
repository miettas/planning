@extends('layouts/app')

@section('content')
@php $info = ''; $info2 = ''; @endphp
<div class="row">
    @if($directory->dirid == 4)   
        <figure class="figure">
            {!! $directory->dirImage !!}
            <figcaption class="figure-caption">Collins Street, 1991. <i>Photo Tony Knox</i></figcaption>
        </figure>
    @endif

    <!-- left column -->
        <div class="col-sm">
            @if($directory->infoCol1)
                <h4>{!! $directory->headlineCol1 !!}</h4>
                {!! $directory->infoCol1 !!}
            @endif
        </div>

    <!-- centre column -->
        <div class="col-sm">
            @if($directory->infoCol2)

                <h4>{!! $directory->headlineCol2 !!}</h4>

                @for( $i=0; $i<3; $i++ )

                    <h5>{{ $array[$i][0]->headline }}</h5>

                        @if(strlen($array[$i][1])) 
                            {!! $array[$i][1] !!}<br />
                        @endif
                        @if(strlen($array[$i][3]))
                            {!! $array[$i][3] !!}<br />
                        @endif
                    <p>
                        {!! $array[$i][2] !!}
                    </p>
                @endfor
          @endif 
        </div>
    
        <!-- right column -->
        <div class="col-sm">
            @if($directory->infoCol3)

                <h4>{!! $directory->headlineCol3 !!}</h4>
                @for( $i=0; $i<3; $i++ )

                    <h5>{{ $array1[$i][0]->first }} {{ $array1[$i][0]->last }}</h5>

                    @if(strlen($array[$i][1]))
                        {!! $array1[$i][1] !!}<br />
                    @endif
                    @if(strlen($array1[$i][3]))
                        {!! $array1[$i][3] !!}<br />
                    @endif
                    <p>
                        {!! $array1[$i][2] !!}
                    </p>
                @endfor

            @endif 

    </div>
</div>


@stop
