@extends("Templates.template")


@section('content')

    <div class="list registerlist" >
        <h3>Remplissez ces champs pour vous connecter</h3><br>
        <form class="registerform row" method="POST" action="{{ Route("connect.store") }}">

            @if(Session::has("fail"))
                <div class="alert alert-danger">
                    {{ Session::get("fail") }}
                </div>
            @endif
            @csrf
            <label for="inp1"><h5>Email</h5></label>
            <input type="text" value="{{ old("mail") }}"  id="inp1" autofocus='autofocus' placeholder="Saisissez votre email" class="form-control" autocomplete="off" name="mail">
                @error('mail')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror

            <label for="inp4"><h5>Mot de passe</h5></label>
            <div class="input-group">
                <input type="password" value="{{ old("password") }}" id="inp4" autofocus='autofocus' placeholder="Saisissez votre mot de passe" class="form-control" autocomplete="off" name="password">

                <div class="input-group-text mb-0.1">
                    <img src="{{ asset("storage/icon/view.png") }}" class='showe' alt="...">
                    <img class='hide' src="{{ asset("storage/icon/hidden.png") }}" alt="..">
                </div>

            </div>
            <p>
                @error('password')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </p>
            <input type="submit" class="btn btn-success col-sm-6 offset-3" name="sub" value="Se Connecter">

        </form><br>
            <div>
                <em><strong>
                    <a href="{{ Route("register") }}">Creer un compte</a>
                </strong></em>
            </div>

    </div>
    <script src="{{ asset("storage/js/regist_connect.js") }}"></script>


@endsection
