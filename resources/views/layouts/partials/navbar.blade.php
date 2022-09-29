<nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
    <div class="container-fluid">
        <a class="navbar-brand" href="/homemy"><strong>
                {{-- <style>
                    .engranaje {
                        /* cambia estos dos valores para definir el tamaño de tu círculo */
                        height: 100px;
                        width: 100px;
                        /* los siguientes valores son independientes del tamaño del círculo */
                        background-repeat: no-repeat;
                        background-position: 50%;
                        border-radius: 50%;
                        background-size: 100% auto;
                    }
                </style> --}}
                <div id="engranaje">
                    <img src="/img/4.jpeg" width="80px" height="50px">
                </div>
            </strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/homemy">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/usuarios">Usuarios</a>
                </li>
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <strong>{{ auth()->user()->name ?? auth()->user()->name }}</strong>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/logout">Cerrar session</a></li>
                        </ul>

                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>
<br>
