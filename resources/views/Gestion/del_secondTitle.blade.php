@extends("Templates.template")


@section('content')

    <div class="list"align="center" >

        <a href="/gestion/{{ $path }}">
            <img src="{{ asset("storage/icon/x.png") }}" alt="..." style="float: right;">
        </a>

        <h2 align="center" >{{ $secondary_title_current->content }}</h2>

        <p>
            Ête-vous sûr de vouloir supprimer le titre secondaire "
            {{ $secondary_title->content }} {{ $secondary_title->position }} " ?
        </p>

        <div align="center">
            <a href="/gestion/{{ $path }}" class="btn btn-success">Non</a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="delete_url-text-validation/{{ $secondary_title->id }}/{{ $path }}" class="btn btn-warning">Oui</a><br><br>
        </div>

    </div>

@endsection
