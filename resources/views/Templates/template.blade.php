<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
                {{ $main_title->content }}
        </title>
        <link rel="icon" type="image/png" href="{{asset("storage/icon/$main_image->content")}}">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&family=Lato:wght@100&display=swap" rel="stylesheet">
        <link href="{{ asset("storage/css/bootstrap.min.css ") }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset("storage/css/style.css ") }}">
    </head>
    <body>
        <div class="container site">
            <h1 class="text-logo  {{ $theme->content }} ">
                <img style="width:32px;height:32px;" src="{{ asset("storage/icon/$main_image->content")}}" style="margin-bottom:-4px;" alt="">
                        {{ $title->content }}
                <img style="width:32px;height:32px;" src="{{ asset("storage/icon/$main_image->content")}}" style="margin-bottom:-4px;" alt="">
            </h1>

            @yield('content')

        </div>
        <script src="{{ asset("storage/js/bootstrap.min.js") }}"></script>
    </body>
</html>
