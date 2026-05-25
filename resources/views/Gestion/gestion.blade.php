@extends("Templates.template")


@section('content')
    <div class="list" style='overflow:hidden;'>
        <h2 align="center" >
            {{ $secondary_title_current->content}}
        </h2><br>

        <!--  -->
        <div align=center >
            <h4>Les texts d'onglet de tout les pages</h4>
            <table class="table table-striped">
                <thead align=center>
                    <tr>
                        <th><strong>Position</strong></th>
                        <th><strong>Cotenues</strong></th>
                        <th><strong>Actions</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($url_texts as $url_text )
                        <tr>
                            <td width='300'>{{ $url_text->position }}</td>
                            <td align=center width='400'>{{ $url_text->content }}</td>
                            <td width='300'>
                                &nbsp;
                                <a href="gestion/modifie/{{$url_text->id}}/url_text">
                                    <span class='btn btn-success' style='width:45%;'>
                                        <img src='{{asset("storage/icon/edit.png") }}'>
                                        &nbsp;&nbsp;&nbsp;Modifier
                                    </span>
                                </a>
                                &nbsp;&nbsp;
                                <a href='/delete/{{$url_text->id}}/urlText'>
                                    <span class='btn btn-danger' style='width:45%;'>
                                        <img src='{{asset("storage/icon/x.png") }}'>
                                        &nbsp;&nbsp;&nbsp;Supprimer
                                    </span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!--  -->
        <div align=center class="scroll" >
            <h4>Les differents categories</h4>
            <table class="table table-striped">
                <thead align=center>
                    <tr>
                        <th><strong>Cotenues</strong></th>
                        <th><strong>Actions</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $categories as $categorie )
                        <tr>
                            <td align=center>{{ $categorie->name }}</td>
                            <td width=300>&nbsp;&nbsp;
                                <a href="gestion/modifie/{{$categorie->id}}/categorie">
                                    <span class='btn btn-success' style='width:100%;'>
                                        <img src='{{asset("storage/icon/edit.png") }}'>
                                        &nbsp;&nbsp;&nbsp;&nbsp;Modifier
                                    </span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <!--  -->
        <div align=center class="scroll" >
            <h4>Le titre principale et son couleur , mots de passe et logo de tout les pages</h4>
            <table class="table table-striped">
                <thead align=center>
                    <tr>
                        <th><strong>Description</strong></th>
                        <th><strong>Cotenues</strong></th>
                        <th><strong>Actions</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($root_datas as $root_data)

                        @if( $root_data->id == 3 )
                            <tr style="text-transform: capitalize;">
                                <td width=300>{{ $root_data->name }}</td>
                                <td  align=center>{{ $root_data->content }}</td>
                                <td width='300'>
                                    &nbsp;&nbsp;
                                    <a href="gestion/modifie/{{$root_data->id}}/logo">
                                        <span class='btn btn-success' style='width:100%;'>
                                            <img src="{{asset("storage/icon/edit.png") }}">
                                            &nbsp;&nbsp;&nbsp;&nbsp;Modifier
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        @elseif( $root_data->id == 4 )
                            <tr style="text-transform: capitalize;">
                                <td width=300>{{ $root_data->name }}</td>
                                <td  align=center>{{ $root_data->content }}</td>
                                <td width='300'>
                                    &nbsp;&nbsp;
                                    <a href="gestion/modifie/{{$root_data->id}}/theme">
                                        <span class='btn btn-success' style='width:100%;'>
                                            <img src='{{asset("storage/icon/edit.png") }}'>
                                            &nbsp;&nbsp;&nbsp;&nbsp;Modifier
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        @else
                            <tr style="text-transform: capitalize;">
                                <td width=400>{{ $root_data->name }}</td>
                                <td  align=center>{{ $root_data->content }}</td>
                                <td width='300'>
                                    &nbsp;&nbsp;
                                    <a href="gestion/modifie/{{$root_data->id}}/root_data">
                                        <span class='btn btn-success' style='width:100%;'>
                                            <img src='{{asset("storage/icon/edit.png") }}'>
                                            &nbsp;&nbsp;&nbsp;&nbsp;Modifier
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

        <!--  -->
        <div align=center class="scroll" >
            <h4>Les titres secondaires de tout les pages</h4>
            <table class="table table-striped">
                <thead align=center>
                    <tr>
                        <th><strong>Position</strong></th>
                        <th><strong>Cotenues</strong></th>
                        <th><strong>Actions</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $secondary_titles as $secondary_title )

                        <tr style="text-transform: capitalize;">
                            <td width='300' align=center>{{ $secondary_title->position }}</td>
                            <td width=450 align=center>{{ $secondary_title->content }}</td>
                            <td width='300'>&nbsp;
                                <a href="gestion/modifie/{{$secondary_title->id}}/secondary_title">
                                    <span class='btn btn-success' style='width:45%;'>
                                        <img src='{{asset("storage/icon/edit.png") }}'>
                                        &nbsp;&nbsp;&nbsp;Modifier
                                    </span>
                                </a>
                                &nbsp;&nbsp;
                                <a href="/delete/{{$secondary_title->id}}/secondaryTitle">
                                    <span class='btn btn-danger' style='width:45%;'>
                                        <img src='{{asset("storage/icon/x.png") }}'>
                                        &nbsp;&nbsp;&nbsp;Supprimer
                                    </span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!--  -->
        <br><br><div align=center class="scroll" >
            <h4>
                Commandes de la clientèle pour {{ (date("H") > 18)? 'de demain' : 'd\'aujourd\'hui'}} <br>
                <em>
                    <small> ( Veillez vide tout les commandes du jour a 18h pour laissez place au commande de demain ) </small>
                </em>
            </h4>
            <table class="table table-striped">
                <thead align=center>
                    <tr>
                        <th><strong>Prenom</strong></th>
                        <th><strong>Nom</strong></th>
                        <th><strong>Email</strong></th>
                        <th><strong>Commandes</strong></th>
                        <th><strong>Prix Total</strong></th>
                        <th><strong>Inscris depuis</strong></th>
                        <th><strong>Action</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ( $clients as $client)
                            <tr>
                                <td>{{ $client->prenom }}</td>
                                <td>{{ $client->nom }}</td>
                                <td>{{ $client->mail }}</td>
                                <td width=250>
                                @foreach ($client->commandes as  $commande)
                                    <span style='display:grid;'>
                                        ( {{ $commande->nombre }} {{ $commande->item->name }} à {{ number_format($commande->price->content,2,".",'') }} € )
                                    </span>
                                @endforeach
                                </td>
                                <td width=100>
                                    {{ number_format($couts,2,'.','')  }} €
                                </td>
                                <td width=100>
                                    Le {{ date($client->created_at) }}
                                </td>
                                <td width=300>
                                    &nbsp;
                                    <a href='logged_in/remove_commandes/{{ $client->id }}/path=1' class='btn btn-primary' style='width:45%;margin:8% 0px;'>
                                        <em> Retirer </em>
                                    </a>
                                    &nbsp;
                                    <a href='mailto:{{ $client->mail }}' class='btn btn-primary' style='width:45%;'>
                                        <em> Mail </em>
                                    </a>
                                </td>
                            </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <p style="color:orange;">
            <strong style="color:black;">NB: </strong>
            Toutes vos modifications seront imediatement appliquer aux pages du sites en rapport avec ces modifications dès leurs rechargement.
        </p>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="/list">
            <span style="font-family: 'Holtwood One SC', serif;" class="btn btn-warning">
                <img src="{{asset("storage/icon/back.png") }}" alt=""> &nbsp;&nbsp;RETOUR
            </span>
        </a>
    </div>
    </div>
    <b></b>
    <script src="{{asset("storage/js/gestion.js") }}"></script>
@endsection
