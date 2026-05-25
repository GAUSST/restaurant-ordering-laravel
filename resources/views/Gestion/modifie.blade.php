@extends('Templates.template')

@section('content')

    @if ( $page == "categorie" )

        <div class="list" style="overflow:hidden;">

            <h2 align="center" > {{ $secondary_title->content }} </h2>

            <div align= center>

                <div class="modifieform">

                    <h3>
                        Definissez la categorie a mettre a la
                        place de [" {{ $categorie->name }} "]
                    </h3>
                    <br>

                    <form method="POST" action="{{Route("gestion_modifieCatch",[$categorie->id,$page])}}" role="form" class="form">

                        @if(Session::has("fail"))
                            <div class="alert alert-danger">
                                {{ Session::get("fail") }}
                            </div>
                        @endif
                        @csrf
                        <label for="inp1">
                            <h5>Nom categorie</h5>
                        </label>

                        <input type="text" value="{{ $categorie->name }}" id="inp1" autofocus='autofocus' placeholder="Definissez la categorie" class="form-control" autocomplete="off" name="categorie_name">

                        <p>
                            @error('categorie_name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </p>
                        <br>

                        <input class="btn btn-success" name="sub" type="submit" value="Enregistrer les modifications">

                    </form>

                </div>

            </div>

            <a href="/gestion">

                <p style="font-family: 'Holtwood One SC', serif;" class="btn btn-success col-sm-2">

                    <img src="{{asset("storage/icon/back.png")}}" alt="">
                    &nbsp;&nbsp;RETOUR

                </p>

            </a>

        </div>

    @elseif ( $page == "theme" )

        <div class="list" style="overflow:hidden;">

            <h2 align="center" > {{ $secondary_title->content }} </h2>

            <div align= center>

                <div class="modifieform">

                    <h3>
                        Changer le Theme
                    </h3>
                    <br>

                    <form method="POST" action="{{Route("gestion_modifieCatch",[$theme->id,$page])}}" role="form" class="form">

                        @if(Session::has("fail"))
                            <div class="alert alert-danger">
                                {{ Session::get("fail") }}
                            </div>
                        @endif
                        @csrf
                        <h5>Couleur</h5>

                        <select class="form-control" name="theme_color">

                            <optgroup label="Choisissez une couleurs">

                                <option value="bleu" @if ( $theme->content == 'bleu' ) selected @endif >
                                    Bleu
                                </option>

                                <option value="rouge" @if ( $theme->content == 'rouge' ) selected @endif >
                                    Rouge
                                </option>

                                <option value="vert" @if ( $theme->content == 'vert' ) selected @endif >
                                    Vert
                                </option>

                                <option value="blanc" @if ( $theme->content == 'blanc' ) selected @endif >
                                    Blanc
                                </option>

                            </optgroup>

                        </select>
                        <p>
                            @error('theme_color')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </p>
                        <br>

                        <input class="btn btn-success" name="sub" type="submit" value="Enregistrer les modifications">
                    </form>
                </div>
            </div>
            <a href="/gestion">
                <p style="font-family: 'Holtwood One SC', serif;" class="btn btn-success col-sm-2">

                    <img src="{{ asset("storage/icon/back.png") }}" alt="">
                    &nbsp;&nbsp;RETOUR

                </p>
            </a>
        </div>

    @elseif ( $page == "logo" )

        <div class="list" style="overflow:hidden;">

            <h2 align="center" >{{ $secondary_title->content }} </h2>

            <div align= center>

                <div class="modifieform">

                    <h3>Changer l'icon du titre principale du site</h3>
                    <br>

                    <form method="POST" action="{{Route("gestion_modifieCatch",[$logo->id,$page])}}" role="form" class="form" enctype="multipart/form-data">

                        @if(Session::has("fail"))
                            <div class="alert alert-danger">
                                {{ Session::get("fail") }}
                            </div>
                        @endif

                        @csrf
                        <label for="inp2"><h5>Image logo</h5></label>
                        <input type="file" value="{{ $logo->content }}" name="logo_image" id="inp2" class="form-control">
                        <p>
                            @error('logo_image')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </p><br>

                        <input class="btn btn-success" name="sub" type="submit" value="Enregistrer les modifications">

                    </form>

                </div>

            </div>

            <p style="color:orange;">
                <strong style="color:black;">
                    NB:
                </strong>
                Pour une optimisation maximale d'affichage il vous est conseillez de choisir un logo a resolution d'icone.
            </p>

            <a href="/gestion">

                <p style="font-family: 'Holtwood One SC', serif;" class="btn btn-success col-sm-2">
                    <img src="{{ asset("storage/icon/back.png") }}" alt="...">
                    &nbsp;&nbsp;RETOUR
                </p>

            </a>

        </div>

    @elseif ( $page == "root_data" )

        <div class="list" style="overflow:hidden;">

            <h2 align="center" >{{ $secondary_title->content }}</h2>

            <div align=center>

                <div class="modifieform">

                    <h3>
                        Definissez le contenue a mettre a la place
                        de <br> [" {{ $root_data->content }} "]
                    </h3>
                    <br>

                    <form method="POST" action="{{Route("gestion_modifieCatch",[$root_data->id,$page])}}" role="form" class="form">

                        @if(Session::has("fail"))
                            <div class="alert alert-danger">
                                {{ Session::get("fail") }}
                            </div>
                        @endif

                        @csrf
                        <label for="inp3">
                            <h5>
                                Contenue
                            </h5>
                        </label>

                        <input type="text" value="{{ $root_data->content }}" id="inp3" autofocus='autofocus' placeholder="Insserez le contenue" class="form-control" autocomplete="off" name="root_data">

                        <p>
                            @error('root_data')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </p>
                        <br>

                        <input class="btn btn-success" name="sub" type="submit" value="Enregistrer les modifications">

                    </form>

                </div>

            </div>

            <a href="/gestion">

                <p style="font-family: 'Holtwood One SC', serif;" class="btn btn-success col-sm-2">
                    <img src="{{ asset("storage/icon/back.png") }}" alt="...">
                    &nbsp;&nbsp;RETOUR
                </p>

            </a>
        </div>

    @elseif ( $page == "secondary_title" )

        <div class="list" style="overflow:hidden;">

            <h2 align="center" >{{ $secondary_title->content }}</h2>

            <div align= center>

                <div class="modifieform">

                    <h3>
                        Definissez le tittre a mettre a la place
                        de <br> [" {{$secondary_title_current->content}} "]
                    </h3>
                    <br>

                    <form method="POST" action="{{Route("gestion_modifieCatch",[$secondary_title_current->id,$page])}}" role="form" class="form">

                        @if(Session::has("fail"))
                            <div class="alert alert-danger">
                                {{ Session::get("fail") }}
                            </div>
                        @endif

                        @csrf
                        <label for="inp4">
                            <h5>
                                contenue Tittre de page
                            </h5>
                        </label>

                        <input type="text" value="{{ $secondary_title_current->content }}" id="inp4" autofocus='autofocus' placeholder="Definissez le tittre de page" class="form-control" autocomplete="off" name="secondary_title">

                        <p>
                            @error('secondary_title')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </p>
                        <br>

                        <input class="btn btn-success" name="sub" type="submit" value="Enregistrer les modifications">

                    </form>

                </div>

            </div>
            <a href="/gestion">

                <p style="font-family: 'Holtwood One SC', serif;" class="btn btn-success col-sm-2">
                    <img src="{{ asset("storage/icon/back.png") }}" alt="">
                    &nbsp;&nbsp;RETOUR
                </p>

            </a>

        </div>

    @elseif ( $page == "url_text" )

        <div class="list" style="overflow:hidden;">

            <h2 align="center" >{{ $secondary_title->content }}</h2>

            <div align= center>

                <div class="modifieform">

                    <h3>
                        Definissez le contenue pour le titre
                        d'onglet du {{ $url_text->position }}
                    </h3>
                    <br>

                    <form method="POST" action="{{ Route("gestion_modifieCatch",[$url_text->id,$page]) }}" role="form" class="form">

                        @if(Session::has("fail"))
                            <div class="alert alert-danger">
                                {{ Session::get("fail") }}
                            </div>
                        @endif

                        @csrf
                        <label for="inp5"><h5>Cotenue</h5></label>
                        <input type="text" value="{{ $url_text->content }}" id="inp5" autofocus='autofocus' placeholder="Definissez le contenue d'onglet" class="form-control" autocomplete="off" name="url_text">
                        <p>
                            @error('url_text')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </p>
                        <br>

                        <input class="btn btn-success" name="sub" type="submit" value="Enregistrer les modifications">

                    </form>
                </div>
            </div>

            <a href="/gestion">

                <p style="font-family: 'Holtwood One SC', serif;" class="btn btn-success col-sm-2">
                    <img src="{{ asset("storage/icon/back.png") }}" alt="">
                    &nbsp;&nbsp;RETOUR
                </p>

            </a>
        </div>

    @endif

@endsection
