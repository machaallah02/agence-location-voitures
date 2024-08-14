<nav class="navbar fixed-top bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('home') }}">MyCar</a>
    
    <div class="d-flex justify-content-end gap-3">
      <a class="text-black cursor-pointer text-decoration-none" href="#">Contactez-nous</a>
      <a class="text-black cursor-pointer text-decoration-none" href="#">Blog</a>

      @auth
     
        <a class="text-black cursor-pointer text-decoration-none bg-primary px-3 py-1 rounded" href="{{ route('logout') }}">Déconnexion</a>
      @else
        {{-- Si personne n'est connecté, afficher le lien de connexion --}}
        <a class="text-black cursor-pointer text-decoration-none bg-primary px-3 py-1 rounded" href="{{ route('login') }}">Se connecter</a>
      @endauth
    </div>

    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">MyCar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Tâches</a>
          </li>
          @auth
    <li class="nav-item">
        <a class="nav-link" href="#">
            <strong>Nom :</strong> {{ Auth::user()->nom  }}<br>
        </a>
    </li>
    <li><hr> 
      <a class="nav-link cursor-pointer text-decoration-none" href="{{ route('historique') }}"> Historique</a>
    </li>

    <li>
      <a class="nav-link cursor-pointer text-decoration-none" href="{{ route('profile', Auth::user()->id) }}"> Mon profil</a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="{{ route('logout') }}">Déconnexion</a>
    </li>
@endauth

        </ul>
      </div>
    </div>
  </div>
</nav>
