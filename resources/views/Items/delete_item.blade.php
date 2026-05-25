@extends("Templates.template")


@section('content')
    <div class="list"align="center" >

        <a href="{{ Route("list") }}">
            <img src="{{ asset("storage/icon/x.png") }}" alt="..." style="float: right;">
        </a>

        <h2 align="center" >
            {{ $secondary_title->content }}
        </h2>

        <p>
            Ête-vous sûr de vouloir supprimer l'element (
            Nom: {{ $item->name }}; Categorie: {{ $item->categorie->name }}; Prix: {{ $item->price->content }} €
            ) de la liste des menus ?
        </p>

        <div align="center">
            <a href="{{ Route("list") }}" class="btn btn-success">
                Non
            </a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="{{ Route("list.delete.validation",$id) }}" class="btn btn-danger">
                Oui
            </a>
            <br><br>
        </div>

    </div>
@endsection
