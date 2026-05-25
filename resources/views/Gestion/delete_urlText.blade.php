@extends("Templates.template")

@section('content')

    <div class="list"align="center" >

        <a href="/gestion/{{ $path }}">
            <img src="{{ asset("storage/x.png") }}" alt="..." style="float: right;">
        </a>

        <h2 align="center" >{{ $secondary_title }}</h2>

        <p>
            Ête-vous sûr de vouloir supprimer le nom de contenue
            " {{ $url_text->content }} de l'onglet du {{ $url_text->position }} " ?
        </p>

        <div align="center">
            <a href="/gestion/{{ $path }}" class="btn btn-success">Non</a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="/delete_url-text-validation/{{ $url_text->id }}/{{ $path }}" class="btn btn-warning">Oui</a><br><br>
        </div>

    </div>

@endsection
