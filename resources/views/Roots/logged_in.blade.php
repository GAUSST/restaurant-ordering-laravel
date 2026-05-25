
@extends("Templates.template")


{{-- --------------------------------------------------------------------------------------------------- --}}

@section("content")


   <br> <div>

        <div>

            <input type="search" id="search" placeholder="Recherche" autocomplete="off">
            <img id="search_img" src="{{ asset("storage/icon/search.png") }}" style='width:40px;' class="search {{  \Illuminate\Support\Str::limit($theme->content,3,$end='')  }}" alt="...">

        </div>

        <ul class="nav nav-pills dangers mb-3 justify-content-center" id="pills-tab" role="tablist">

            @foreach( $categories as $category )

                @if ( $category->id < 4 and $category->id == 1 )
                    <li class="nav-item" role="presentation">

                        <button id="p{{$category->id}}" class="{{ \Illuminate\Support\Str::limit($theme->content,3,$end='') }} nav-link active"  data-bs-toggle="pill" data-bs-target="#pills-{{$category->id}}">
                            {{ $category->name }}
                        </button>

                    </li>

                @elseif ( $category->id < 4 )

                    <li class="nav-item" role="presentation">

                        <button id="p{{$category->id}}" class="{{ \Illuminate\Support\Str::limit($theme->content,3,$end='') }} nav-link "  data-bs-toggle="pill" data-bs-target="#pills-{{$category->id}}">
                            {{ $category->name }}
                        </button>

                    </li>
                @elseif ( $category->id == 4 )

                   <li class="nav-item" role="presentation">
                        <button id="p{{$category->id}}" class="{{ \Illuminate\Support\Str::limit($theme->content,3,$end='') }} nav-link"  data-bs-toggle="pill" data-bs-target="#pills-{{$category->id}}">
                            {{ $category->name }}
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">

                        <button type="button" class="{{ \Illuminate\Support\Str::limit($theme->content,3,$end='') }} nav-link dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"></button>

                        <div class="dropdown-menu">

                @elseif ( $category->id > 4 )

                            <button id="p{{$category->id}}" class="{{ \Illuminate\Support\Str::limit($theme->content,3,$end='') }} nav-link dropdown-item" data-bs-toggle="pill" data-bs-target="#pills-{{$category->id}}">
                                {{ $category->name }}
                            </button>
                            <hr class="dropdown-divider">

                @endif
            @endforeach
                        </div>
                    </li>

                    {{-- </li> --}}

        </ul>

        <br><div class="tab-content" id="pills-tabContent" >
            @foreach ($categories as $category)
                @if ( $category->id == 1 )

                    <div class="tab-pane fade show active" id="pills-{{$category->id}}" role="tabpanel">

                        <div class="row ">
                            @foreach ( $category->items as $item )

                                {{-- <x-item_component/> --}}
                                @include("Components.item_component")

                            @endforeach

                        </div>

                    </div>

                @else

                    <div class="tab-pane fade" id="pills-{{$category->id}}" role="tabpanel">

                        <div class="row ">
                            @foreach ( $category->items as $item )

                                @include("Components.item_component")

                            @endforeach

                        </div>

                    </div>

                @endif

            @endforeach
        </div>

        <div align="center">

            {{-- @auth --}}
            <a href="/logged_in/view_commandes" class="btn {{ \Illuminate\Support\Str::limit($theme->content,3,$end='') }}" style="font-family: 'Holtwood One SC', serif;width:250px;">
                <img src="{{ asset("storage/icon/shop.png") }}" style="width:30px;height:28px;" alt="...">
                &nbsp;&nbsp;&nbsp; Commandes
            </a>
            {{-- @endauth --}}
        </div>
        <br><br>

    </div>
    <script src="{{ asset("storage/js/logged_in.js") }}"></script>

@endsection
