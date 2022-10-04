<nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
    <div class="container-fluid">
        <a class="navbar-brand" href="/homemy"><strong>
                <div class="justify-start ">
                    <img src="/img/4.jpeg" width="80px" height="50px" class="rounded-circle">
                </div>
            </strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/homemy"><strong>Productos</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/usuarios"><strong>Usuarios</strong></a>
                </li>
            </ul>
        </div>
        @auth
            <div>
                <img src="/img/{{ auth()->user()->image ?? 'user-logo2.webp' }}" class="rounded-circle mb-2" width="50px"
                    height="40px">
            </div>
            <div class="justify-end">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <strong>{{ auth()->user()->name ?? auth()->user()->name }}</strong>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-info">
                                <li><a class="dropdown-item" href="/logout"><strong>Cerrar session</strong></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

        @endauth
    </div>
</nav>
<br>
