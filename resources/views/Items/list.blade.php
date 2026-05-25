@extends("Templates.template")


@section('content')

    <div class="list" >
        <table class="table table-striped" >
            <thead>

                <th colspan="6" >
                    <h2 style="font-family: 'Holtwood One SC';text-align:center;" >
                        {{ $secondary_title->content }}
                    </h2>
                </th>

                <tr style="font-weight:bold;">

                    <td> Nom        </td>
                    <td> Description</td>
                    <td> prix       </td>
                    <td> Image      </td>
                    <td> Categorie  </td>
                    <td> Actions    </td>

                </tr>

            </thead>
            <tbody>

                @foreach($items as $item)
                    @if( strlen($item->description) > 30 && preg_match("/\s/",$item->description) == false )
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td width= 300> {{ (substr($item->description,0,30)."...") }}</td>
                            <td>            {{ number_format($item->price->content,2,'.','') }} €    </td>
                            <td width= 100> {{ $item->image->content }}      </td>
                            <td>            {{ $item->categorie->name }}  </td>

                            <td>
                            <a href="{{ Route("list.view",[$item->id])  }}" class="btn btn-secondary">
                                <img style="width:25px;height:25px;" src="{{ asset("storage/icon/view.png") }}" alt='...'>
                                Voir
                            </a>

                            <a href='{{ Route("list.modifie",[$item->id]) }}' class="btn btn-primary">
                                <img style="height:25px;width:25px;" src="{{ asset("storage/icon/edit.png") }}" alt='...'>
                                Modifier
                            </a>

                            <a href='{{ Route("list.delete",[$item->id]) }}' class="btn btn-danger">
                                <img style="height:25px;width:25px;" src="{{ asset("storage/icon/x.png") }}" alt='...'>
                                Supprimer
                            </a>
                            </td>
                        </tr>
                    @elseif ( strlen($item->image->content) > 7)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td width= 300> {{ $item->description }}</td>
                            <td>            {{ number_format($item->price->content,2,'.','') }} €    </td>
                            <td width= 100> {{ (substr($item->image->content,0,3)."..").'.png' }}      </td>
                            <td>            {{ $item->categorie->name }}  </td>

                            <td>
                            <a href="{{ Route("list.view",[$item->id])  }}" class="btn btn-secondary">
                                <img style="width:25px;height:25px;" src="{{ asset("storage/icon/view.png") }}" alt='...'>
                                Voir
                            </a>

                            <a href='{{ Route("list.modifie",[$item->id]) }}' class="btn btn-primary">
                                <img style="height:25px;width:25px;" src="{{ asset("storage/icon/edit.png") }}" alt='...'>
                                Modifier
                            </a>

                            <a href='{{ Route("list.delete",[$item->id]) }}' class="btn btn-danger">
                                <img style="height:25px;width:25px;" src="{{ asset("storage/icon/x.png") }}" alt='...'>
                                Supprimer
                            </a>
                            </td>
                        </tr>
                    @elseif ( strlen($item->image->content) > 7 AND strlen($item->description) > 30 && preg_match("/\s/",$item->description) == false )
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td width= 300> {{ (substr($item->description,0,30)."...") }}</td>
                            <td>            {{ number_format($item->price->content,2,'.','') }} €    </td>
                            <td width= 100> {{ (substr($item->image->content,0,3)."..").'.png' }}      </td>
                            <td>            {{ $item->categorie->name }}  </td>

                            <td>
                            <a href="{{ Route("list.view",[$item->id])  }}" class="btn btn-secondary">
                                <img style="width:25px;height:25px;" src="{{ asset("storage/icon/view.png") }}" alt='...'>
                                Voir
                            </a>

                            <a href='{{ Route("list.modifie",[$item->id]) }}' class="btn btn-primary">
                                <img style="height:25px;width:25px;" src="{{ asset("storage/icon/edit.png") }}" alt='...'>
                                Modifier
                            </a>

                            <a href='{{ Route("list.delete",[$item->id]) }}' class="btn btn-danger">
                                <img style="height:25px;width:25px;" src="{{ asset("storage/icon/x.png") }}" alt='...'>
                                Supprimer
                            </a>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td width= 300> {{ $item->description }}</td>
                            <td>            {{ number_format($item->price->content,2,'.','') }} €    </td>
                            <td width= 100> {{ $item->image->content }}      </td>
                            <td>            {{ $item->categorie->name }}  </td>

                            <td>
                            <a href="{{ Route("list.view",[$item->id])  }}" class="btn btn-secondary">
                                <img style="width:25px;height:25px;" src="{{ asset("storage/icon/view.png") }}" alt='...'>
                                Voir
                            </a>

                            <a href='{{ Route("list.modifie",[$item->id]) }}' class="btn btn-primary">
                                <img style="height:25px;width:25px;" src="{{ asset("storage/icon/edit.png") }}" alt='...'>
                                Modifier
                            </a>

                            <a href='{{ Route("list.delete",[$item->id]) }}' class="btn btn-danger">
                                <img style="height:25px;width:25px;" src="{{ asset("storage/icon/x.png") }}" alt='...'>
                                Supprimer
                            </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
            <tfoot>
                <tr >

                    <td colspan=6><a href="list/add" class="btn btn-success btn-lg" style="margin: 0% 5%; font-family: 'Holtwood One SC', serif; width:90%;font-size:1.3em;padding-top:4px;word-spacing:10px;" >
                    <img src="{{ asset("storage/icon/plus.png") }}" style="height:20px;" alt="..."> &nbsp;AJOUTER UN NOUVEAU ELEMENT</a></td>
                </tr>
                <tr>
                    <td align="center" colspan="6" style="color: orangered;">
                        Ces elements constitues le menu actuel du restaurant.&nbsp;&nbsp;&nbsp;
                        <a href="/logged_in" class="btn btn-secondary" style="font-family: 'Holtwood One SC', serif;width:200px;">
                            <img src="{{ asset("storage/icon/shop.png") }}" style="width:26px;height:26px;" alt="...">
                            &nbsp;&nbsp;&nbsp;&nbsp;Boutique
                        </a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="{{ Route("gestion") }}" class="btn btn-primary" style="font-family: 'Holtwood One SC', serif;width:200px;">
                            <img src="{{ asset("storage/icon/gestion.png") }}" style="width:32px;height:32px;" alt="...">
                            &nbsp;&nbsp;&nbsp;&nbsp;Gestion
                        </a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
    <script src="{{ asset("storage/js/bootstrap.min.js") }}"></script>

@endsection
