@extends("Templates.template")


@section('content')
    <div class="list" style="overflow:hidden;">

        <h2 align="center" > {{ $secondary_title->content }} </h2><br><br>

        <div class="row" align="center">
            <form method="POST" action="{{ Route("list.add.validation") }}" class="addform col-sm-10 offset-1" role="form" enctype="multipart/form-data">

                @if(Session::has("fail"))
                    <div class="alert alert-danger">
                        {{ Session::get("fail") }}
                    </div>
                @endif
                @csrf
                    <label for="inp1"><h5>Nom</h5></label>
                    <input type="text" value="{{ old("name") }}" id="inp1" autofocus='autofocus' placeholder="Donnez le nom de l'element" class="form-control" autocomplete="off" name="name">
                    <p>
                        @error('name')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </p>
                    <br>


                    <label for="inp2"><h5>Categorie</h5></label>
                    <input type="text" value="{{ old("categorie") }}" autocomplete="off" class="form-control" placeholder="Donnez la categorie de l'element" id="inp2" name="categorie">
                    <p>
                        @error('categorie')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </p>
                    <br>


                    <label for="inp3"><h5>Prix</h5></label>
                    <input type="text" value="{{ old("price") }}" id="inp3" placeholder="Donnez le prix de l'element" class="form-control" autocomplete="off" name="price">
                    <p>
                        @error('price')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </p>
                    <br>


                    <label for="inp5"><h5>Image</h5></label>
                    <input type="file" value={{ old("image") }} id="inp5" class="form-control" name="image">
                    <p>
                        @error('image')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </p>


                    <label for="inp4"><h5>Description</h5></label>
                    <textarea id="inp4" placeholder="Donnez la description de l'element" class="form-control" autocomplete="off" name="description"></textarea>
                    <p>
                        @error('description')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </p>
                    <br>


                <input class=" form-control btn btn-primary" name="sub" type="submit" value="Ajouter">
            </form>
        </div><br>
        <p><b>NB:</b> L'image doit avoir un nom de 6 caractères max et d'une dimension de 600x800 ou 800x600 pour une affichage optimale!</p><br>
        <a href="{{ Route("list") }}">
            <p style="font-family: 'Holtwood One SC', serif;" class="btn btn-success col-sm-2">
                <img src="{{ asset("storage/icon/back.png") }}" alt="">
                 &nbsp;&nbsp;RETOUR
            </p>
        </a>
    </div>
    </div>
@endsection
