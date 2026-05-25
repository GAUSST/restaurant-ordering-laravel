


<div class='col-sm-5 col-md-3 offset-sm-1 offset-md-1'>

    <div class='thumbnail'>

        <img src='{{ asset("storage/img")}}/{{$item->image->content}}' style='width: 100%; height: 100% ;' alt='...'>

        <div class='price {{ \Illuminate\Support\Str::limit($theme->content,3,$end='')}}' >
             {{ number_format($item->price->content,2,'.','') }} €
        </div>

        <div class='caption justify-content-center'>

            <h4 class='commande {{ \Illuminate\Support\Str::limit($theme->content,3,$end='') }}' >
                 {{ $item->name }}
            </h4>

            <p>
                {{ $item->description }}
            </p>

            <a href='/logged_in/add_commandes/{{$item->id }}' class='btn {{ \Illuminate\Support\Str::limit($theme->content,3,$end='') }}'>
                <i class='bi bi-cart2'></i> COMMANDER
            </a>

            @if(App\Models\Commande::where('item_id','=',$item->id)->where('client_id','=',Session::get('client_id'))->first())
                <p class="commande {{ \Illuminate\Support\Str::limit($theme->content,3,$end='') }}" >
                    commandé : {{ App\Models\Commande::where('item_id','=',$item->id)->where('client_id','=',Session::get('client_id'))->first()["nombre"] }}
                </p>
                <p class="commande {{ \Illuminate\Support\Str::limit($theme->content,3,$end='') }}" >
                    cout : {{ App\Models\Commande::where('item_id','=',$item->id)->where('client_id','=',Session::get('client_id'))->first()["nombre"] * $item->price->content }} €
                </p>
            @else
                <p class="commande {{ \Illuminate\Support\Str::limit($theme->content,3,$end='') }}" >
                    commandé : 0
                </p>
                <p class="commande {{ \Illuminate\Support\Str::limit($theme->content,3,$end='') }}" >
                    cout : 0 €
                </p>
            @endif

        </div>
    </div>
</div>
