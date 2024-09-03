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

                        <li class="menu-list__item menu-list__item--inner">
                            <p class="menu-list__text"> <span>
                                    Actualités
                                </span>
                                <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.6141 0.5H0.385884C0.043835 0.5 -0.130416 0.971108 0.114826 1.25083L3.72893 5.37302C3.87737 5.54233 4.12261 5.54233 4.27111 5.37302L7.88522 1.25083C8.1304 0.971108 7.95614 0.5 7.6141 0.5Z"
                                        fill="#777777" />
                                </svg>
                            </p>
                            <ul class="menu-list__sublist menu-sublist">
                                <li class="menu-sublist__item"> <a class="menu-sublist__link" href="blog-1.html">
                                        Liste des Articles
                                    </a> </li>
                                <li class="menu-sublist__item"> <a class="menu-sublist__link" href="blog-2.html">
                                        Grille des Articles
                                    </a> </li>
                                <li class="menu-sublist__item"> <a class="menu-sublist__link" href="article.html">
                                        Détail de l'Article
                                    </a> </li>
                            </ul>
                        </li>
                        <li class="menu-list__item">
                            <a class="menu-list__link" href="contacts.html">
                                CONTACTEZ-NOUS
                            </a>
                        </li>
                        {{-- Afficher si l'utilisateur avec le rôle "client" est connecté --}}
                        @auth
                            @if (auth()->user()->role === 'client')
                                <li class="menu-list__item">
                                    <a class="menu-list__link" href="{{ route('client') }}">
                                        <span>Espace client</span>
                                    </a>
                                </li>
                            @else
                                <li class="menu-list__item">
                                    {{-- enlevze la barre du lien qui s'affiche quand le cursseur est sur le lien --}}
                                    <a class="menu-list__link" href="{{ route('login') }}">
                                        <span class="bold text-white bg-danger border-0 p-2">Connection</span>
                                    </a>
                                </li>
                            @endif
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
