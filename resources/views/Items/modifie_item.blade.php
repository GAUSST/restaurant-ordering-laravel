@extends("Templates.template")


@section('content')
    <div class="list" style="overflow:hidden;">
        <h2 align="center" > {{ $secondary_title->content }} </h2>
        <div class='row'>

            <div class="col-sm-12 col-md-6" align="center">

                        <div class='thumbnail'><br>
                            <div>
                                <img style='width:95%; height:600px;' src="{{asset("storage/img")}}/{{$item->image->content}}"alt='...'>
                            </div>
                            <div>

                                <p>
                                    <span style='font-weight:bolder; font-size:1.3em;'>
                                        &nbsp;&nbsp;&nbsp;Nom
                                    </span>
                                    : &nbsp;&nbsp;{{ $item->name }}
                                </p>

                                <p>
                                    <span style='font-weight:bolder; font-size:1.3em;'>
                                        &nbsp;&nbsp;&nbsp;Categories
                                    </span>
                                    : &nbsp;&nbsp;{{ $item->categorie->name }}
                                </p>

                                <p>
                                    <span style='font-weight:bolder; font-size:1.3em;'>
                                        &nbsp;&nbsp;&nbsp;Prix
                                    </span>
                                    : &nbsp;&nbsp;{{ number_format($item->price->content,2,".",'') }} €
                                </p>

                                <p>
                                    <span style='font-weight:bolder; font-size:1.3em;'>
                                        &nbsp;&nbsp;&nbsp;Description
                                    </span>
                                    : &nbsp;&nbsp;{{ $item->description }}
                                </p>

                            </div>
                        </div>

            </div>
            <div class="col-sm-12 col-md-6 modifieform">
                <h3>Definissez les informations à remplacer pour ce element</h3><br>
                <form method="POST" action="{{Route("list.modifie.store",$id)}}">

                    @if(Session::has("fail"))
                            <div class="alert alert-danger">
                                {{ Session::get("fail") }}
                            </div>
                    @endif
                    @csrf
                    <label for="inp1"><h5>Nom</h5></label>
                    <input type="text" value="{{$item->name}}" id="inp1" autofocus='autofocus' placeholder="Definissez le nom de l'element" class="form-control" autocomplete="off" name="name">
                    <p>
                        @error('name')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </p><br>

                    <!--  -->
                    <label for="inp2"><h5>Categorie</h5></label>
                    <select name="categorie" class="form-select" id="inp2">

                        <optgroup label="Choisissez une categorie">

                            @foreach( $categories as $categorie )

                                @if( $item->categorie->id == $categorie->id )

                                    <option selected value="{{ $categorie->name }}">{{ $categorie->name }}</option>
                                @else
                                    <option value="{{ $categorie->name }}">{{ $categorie->name }}</option>
                                @endif


                            @endforeach

                        </optgroup>

                    </select><br>


                    <label for="inp3"><h5>Prix</h5></label>
                    <input type="text" value="{{ $item->price->content }}" id="inp3" placeholder="Definissez le prix de l'element" class="form-control" autocomplete="off" name="price">
                    <p>
                        @error('price')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </p><br>


                    <label for="inp4"><h5>Description</h5></label>
                    <textarea id="inp4" placeholder="Definissez la description de l'element" class="form-control" autocomplete="off" name="description"></textarea>
                    <p>
                        @error('description')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </p>
                    <br>


                    <input class="btn btn-success btn-lg" style="width:80%" name="sub" type="submit" value="Enregistrer les modifications">

                </form><br>

            </div>
        </div>
        <a href="{{ Route("list") }}">
            <p style="font-family: 'Holtwood One SC', serif;" class="btn btn-success col-sm-2">
                <img src="{{ asset("storage/icon/back.png") }}" alt="">
                &nbsp;&nbsp;RETOUR
            </p>
        </a>

    </div>
@endsection
