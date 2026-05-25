<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset("storage/app/public/css/bootstrap.min.css") }}">
        <title>Accueil</title>
    </head>
    <body>
            <header>

                <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top ">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ Route("accueil") }}">Offcanvas dark navbar</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-end bg-dark text-white" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Dark offcanvas</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ Route("accueil") }}">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ Route("connect") }}">S'identifier</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ Route("register") }}">S'inscrire</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="{{ Route("nos-cartes") }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Nos Cartes
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Burgers</a></li>
                                    <li><a class="dropdown-item" href="#">Boissons</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">Burgers</a></li>
                                    <li><a class="dropdown-item" href="#">Boissons</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">Burgers</a></li>
                                    <li><a class="dropdown-item" href="#">Boissons</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    </div>
                </div>
                </nav>

            </header>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> --}}
<script src="{{ asset("storage/js/bootstrap.min.js") }}"></script>
    </body>
</html>
