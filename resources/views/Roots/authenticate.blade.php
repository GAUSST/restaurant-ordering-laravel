@extends("Templates.template")

@section("content")

    <div class="list" style="overflow:hidden;">
        <h2 align="center" >Identifications</h2>
        <div align= center>
            <div class="modifieform">
                <h3>Entrez le mot de passe d'admistrateur</h3><br>
                <form method="POST" action="" role="form" class="form">

                    <!--  -->
                    <label for="inp" class="form-label"><h5>Mot de passe</h5></label>
                    <div class="input-group">

                        <input type="password" id="inp" autofocus='autofocus' placeholder="Mot de passe" class="form-control" autocomplete="off" name="psw">

                        <div class="input-group-text mb-0.1">
                            <img src="../icon/view.png" class='showe' alt="..."><img class='hide' src="../icon/hidden.png" alt="">
                        </div>

                    </div>
                    <p>{{   @if ($errors->any())
                                $error
                            @endif
                    }}</p><br>

                    <!--  -->
                    <input id="inp2" class="btn btn-success" name="sub" type="submit" value="Entrer">
                    <!--  -->
                </form>
            </div>
        </div>
        <a  href="{{ ($path==2) ? "list/2" : Route("logged_in")  }}">
            <p style="font-family: 'Holtwood One SC', serif;" class="btn btn-success col-sm-2">
                <img src="{{ asset("storage/icon/back.png") }}" alt="">
                 &nbsp;&nbsp;RETOUR
            </p>
        </a>
    </div>
    <span id="pass" style="display:none">{{ $pass }}</span>
    <script src="{{ asset("storage/js/authenticate.js") }}"></script>
@endsection
