@extends("Templates.template")

@section('content')

    @if ( $page == 'urlText' )

        <div class="list"align="center" >

            <a href="/gestion">
                <img src="{{ asset("storage/x.png") }}" alt="..." style="float: right;">
            </a>

            <h2 align="center" >{{ $secondary_title->content }}</h2>

            <p>
                Ête-vous sûr de vouloir supprimer le nom de contenue
                 [ {{ $url_text->content }} ] de l'onglet du [ {{ $url_text->position }} ] " ?
            </p>

            <div align="center">
                <a href="/gestion" class="btn btn-success">Non</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{{ Route("delete_validation",[$url_text->id,$page]) }}" class="btn btn-warning">Oui</a><br><br>
            </div>

        </div>

    @elseif ( $page == 'secondaryTitle' )

        <div class="list"align="center" >

            <a href="/gestion">
                <img src="{{ asset("storage/icon/x.png") }}" alt="..." style="float: right;">
            </a>

            <h2 align="center" >{{ $secondary_title->content }}</h2>

            <p>
                Ête-vous sûr de vouloir supprimer le titre secondaire [
                {{ $secondary_title_current->content }} ] du [ {{ $secondary_title_current->position }} ] ?
            </p>

            <div align="center">
                <a href="/gestion" class="btn btn-success">Non</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{{ Route("delete_validation",[$secondary_title_current->id,$page]) }}" class="btn btn-warning">Oui</a><br><br>
            </div>

        </div>

    @endif

@endsection
