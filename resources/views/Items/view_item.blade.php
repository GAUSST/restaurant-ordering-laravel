@extends("Templates.template")


@section('content')
    <div class="list" style='overflow:hidden;'>
        <h2 align="center" >
                {{$secondary_title->content}}
        </h2>
        <div class='row' >
            <div class='thumbnail col-sm-7' align=center ><br>
                <img src='{{ asset("storage/img") }}/{{ $item->image->content }}' style='width:90%; height:600px;' alt='...'>
            </div>
            <div class='thumbnail col-sm-5' >

                <br><br><br><br>

                <p>
                    <span style='font-weight:bolder; font-size:1.3em;'>
                        Nom
                    </span>
                    : &nbsp;&nbsp;{{ $item->name }}
                </p>

                <br><br>

                <p>
                    <span style='font-weight:bolder; font-size:1.3em;'>
                        Categories
                    </span>
                    : &nbsp;&nbsp;{{ $item->categorie->name }}
                </p>

                <br><br>

                <p>
                    <span style='font-weight:bolder; font-size:1.3em;'>
                        Prix
                    </span>
                    : &nbsp;&nbsp;{{ $item->price->content }}€
                </p>

                <br><br>

                <p>
                    <span style='font-weight:bolder; font-size:1.3em;'>
                        Description
                    </span>
                    : &nbsp;&nbsp;{{ $item->description }}
                </p>

                <br><br>

                <p>
                    <span style='font-weight:bolder; font-size:1.3em;'>
                        Image
                    </span>
                    : &nbsp;&nbsp;{{ $item->image->content }}
                </p>

                <br><br>

            </div>
            <a href="{{ Route("list") }}">
                <p style="font-family: 'Holtwood One SC', serif;" class="btn btn-warning col-sm-2">
                    <img src="{{ asset("storage/icon/back.png") }}" alt="">
                    &nbsp;&nbsp;RETOUR
                </p>
            </a>
        </div>
    </div>
@endsection
