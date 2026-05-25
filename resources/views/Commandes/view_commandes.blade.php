@extends("Templates.template")

@section('content')

    <div class="list" style='overflow:hidden;'>
        <h2 class='commande {{ \Illuminate\Support\Str::limit($theme->content,3,$end='') }}'>
        Vos commandes {{ (date("H") > 18)? 'de demain' : 'd\'aujourd\'hui'}}</h2>

        <br><br><br><br>

        <div class='row justify-content-center'>

            @forelse ( $commandes as $commande )
                <div class='col-md-4 offset-md-1 note' >
                    <div class='thumbnail'>
                        <img src='{{ asset("storage/img")}}/{{$commande->item->image->content }}' class='{{ $theme->content }}' style="width: 100%; height: 350px ;" alt='...'>
                        <div class='caption justify-content-center'>

                            <p>
                                <em class='commande {{ \Illuminate\Support\Str::limit($theme->content,3,$end='') }}' >Nom</em> : &nbsp;&nbsp;{{ $commande->item->name }}
                            </p>

                            <p>
                                <em class='commande {{ \Illuminate\Support\Str::limit($theme->content,3,$end='') }}' >Prix pour un </em>: &nbsp;&nbsp;{{ $commande->item->price->content }} €
                            </p>

                            <p>
                                <em class='commande {{ \Illuminate\Support\Str::limit($theme->content,3,$end='') }}' >commandé </em>: {{ $commande->nombre }}
                            </p>

                            <p>
                                <em class='commande {{ \Illuminate\Support\Str::limit($theme->content,3,$end='') }}' >coût totale </em>: {{ ($commande->nombre * $commande->item->price->content) }} €
                            </p>
                            <a href='/logged_in/remove_commandes/{{$commande->item->id}}/page' class='btn btn-warning {{ \Illuminate\Support\Str::limit($theme->content,3,$end='') }}'><em> Retirer </em></a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="commande {{ \Illuminate\Support\Str::limit($theme->content,3,$end='') }}">
                <p style="margin: 100px auto;">Votre liste de commande est vide pour l'instant.</p>
                </div>
            @endforelse
        </div>
        <br><br><br>
        <a href="/logged_in" class="btn col-sm-2 retour{{ \Illuminate\Support\Str::limit($theme->content,3,$end='') }}"><img src="{{ asset("storage/icon/back.png") }}" alt=""> &nbsp;&nbsp;RETOUR</a>
        </div>
    </div>
    </div>
    <script src="{{ asset("storage/js/bootstrap.min.js") }}"></script>

@endsection
