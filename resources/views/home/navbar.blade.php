<header class="header fl-header-sticky fl-header-fixed fl-header-gradient ">
    <div class="header__top header-top">
        <div class="container">
        </div>
    </div>
    <div class="header__content header-content">
        <div class="container">
            <div class="header-content__inner">
                <a class="header__logo logo " href="{{ route('home') }}">
                    <img class="logo__img" src="{{ asset('images/logo-w.png') }}" alt="logo">
                    <img class="sticky-logo" src="{{ asset('images/logo-sticky.png') }}" alt="logo">
                </a>
                <nav class="header-content__menu menu">
                    <ul class="menu__list menu-list">

                        <li class="menu-list__item menu-list__item--inner">
                            <p class="menu-list__text"> <span>
                                    <a href="{{ route('home') }}">
                                        Accueil
                                    </a>
                                </span>
                            </p>
                        </li>
                        <li class="menu-list__item menu-list__item--inner">
                            <p class="menu-list__text"> <span>
                                    Annonces de Véhicules
                                </span>
                            </p>
                        </li>

                        <li class="menu-list__item ">
                            <p class="menu-list__text"> <span>
                                    Actualités
                                </span>
                            </p>
                        </li>
                        <li class="menu-list__item">
                            <a class="menu-list__link" href="contacts.html">
                                CONTACTEZ-NOUS
                            </a>
                        </li>
                        {{-- Afficher si l'utilisateur avec le rôle "client" est connecté --}}
                        @auth
                        <li class="menu-list__item text-decoration-none">
                            <a class="menu-list__link" href="{{ route('client.index') }}">
                                <span>Espace client</span>
                            </a>
                        </li>
                    @else
                        <li class="menu-list__item">
                            <a class="menu-list__link text-decoration-none" href="{{ route('login') }}">
                                <span class="bold text-white bg-danger border-0 p-2">Connexion</span>
                            </a>
                        </li>
                    @endauth

                    </ul>
                </nav>

                <div class="header-content__wrapper">
                    <div class="header-content__call call">
                        <div class="call__icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                            </svg>
                        </div>
                        <div class="call__box">
                            <p class="call__box-text"> Info line: </p> <a class="call__box-link"
                                href="tel:92218207">(228) 92218207</a>
                        </div>
                    </div>
                    <a class="uk-navbar-toggle header-search-btn" href="#modal-search" data-uk-toggle=""
                        aria-expanded="false">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_28_248)">
                            </g>
                            <defs>
                                <clipPath id="clip0_28_248">
                                    <rect width="24" height="24" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
