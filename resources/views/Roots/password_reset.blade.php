<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
                {{ $main_title->content }}
        </title>
        <link rel="icon" type="image/png" href="{{asset("icon/$main_image->content")}}">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&family=Lato:wght@100&display=swap" rel="stylesheet">
        <link href="{{ asset("css/bootstrap.min.css ") }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset("css/style.css ") }}">
    </head>
    <body>
        <div class="container site">
            <h1 class="text-logo  {{ $theme->content }} ">
                <img style="width:32px;height:32px;" src="{{ asset("storage/icon/$main_image->content")}}" style="margin-bottom:-4px;" alt="">
                        {{ $title->content }}
                <img style="width:32px;height:32px;" src="{{ asset("storage/icon/$main_image->content")}}" style="margin-bottom:-4px;" alt="">
            </h1>

            <div class="list registerlist" >
                <h3></h3><br>
                <form class="registerform form" method="POST" action="{{ Route("connect.store") }}">

                    <div class="">
                        <label for="inp1"><h5>Email</h5></label>
                        <input type="text" value="" id="inp1" autofocus='autofocus' placeholder="Saisissez votre email" class="form-control" autocomplete="off" name="email">
                        <p>{{-- ($emailCheck)?$emailCheck:null --}}</p>

                        <label for="inp4">
                            <h5>Inserez votre mot de passe</h5>
                        </label>
                        <input type="password" value=""id="inp4" autofocus='autofocus' placeholder="Saisissez votre mot de passe" class="form-control" autocomplete="off" name="password1"><br>
                        <label for="inp2">
                            <h5>Validez le mot de passe</h5>
                        </label>
                        <input type="password" value=""id="inp2" autofocus='autofocus' placeholder="Valider votre mot de passe" class="form-control" autocomplete="off" name="password2"><br>

                        <input type="submit" class="form-control btn btn-success" name="sub" value="Valider">
                    </div>
                </form>
            </div>

            </div>
        </div>
        <script src="{{ asset("storage/js/regist_connect.js") }}"></script>
        <script src="{{ asset("storage/js/bootstrap.min.js") }}"></script>
    </body>
</html>
