@extends("Templates.template")

@section("content")


    <div class="list registerlist" >
    <h3>Remplissez ces champs pour vous inscrire</h3><br>
    <form class="registerform row" id="form" method="POST" action="{{ Route("register.store") }}">

        @if(Session::has('fail'))
            <div class="alert alert-success">
                {{Session::get('fail')}}
            </div>
        @endif

        @csrf
        <label for="inp1"><h5>Prenom</h5></label>
        <input type="text" value="{{ old("prenom") }}" id="inp2" autofocus='autofocus' placeholder="Saisissez votre prenom" class="form-control" autocomplete="off" name="prenom">
        @error('prenom')
            <p class="text-danger">
                {{ $message }}
            </p><br>
        @enderror

        <!--  -->
        <label for="inp2"><h5>Nom</h5></label>
        <input type="text" value="{{ old("nom") }}" id="inp2" autofocus='autofocus' placeholder="Saisissez votre nom" class="form-control" autocomplete="off" name="nom">
        @error('nom')
            <p class="text-danger">
                {{ $message }}
            </p><br>
        @enderror

        <!--  -->
        <label for="inp3"><h5>Email</h5></label>
        <input type="text" value="{{ old("mail") }}" id="inp3" autofocus='autofocus' placeholder="Saisissez votre email" class="form-control" autocomplete="off" name="mail">
        @error('mail')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
        <br>

        <label for="inp4"><h5>Mot de passe</h5></label>
        <div class="input-group">

            <input type="password" value="{{ old("password") }}"id="inp4" autofocus='autofocus' placeholder="Saisissez votre mot de passe" class="form-control" autocomplete="off" name="password">

            <div class="input-group-text mb-0.1">
                <img src="{{ asset("storage/icon/view.png") }}" class='showe' alt="..."><img class='hide' src="{{ asset("icon/hidden.png") }}" alt="">
            </div>

        </div>
        @error('password')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
        <input type="submit" class="btn btn-success col-sm-6 offset-3" name="sub" value="Valider">
        <!--  -->
    </form><br>
    <p><em><strong>• Deja inscris?<a href="{{ Route("connect") }}"> Se connecter.</a></strong></em></p>
    </div>

    </div>
    <script src="{{ asset("storage/js/regist_connect.js") }}"></script>


@endsection
