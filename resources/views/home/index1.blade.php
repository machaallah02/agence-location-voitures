@extends('base')

@section('title', 'Home')

@section('content')
<main class="main">
    <section class="main__selection">
        <div class="container-fluid">

            <div class="hero-slider swiper" data-rcslide-style="1" data-rcslide-col="1">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="slider-content">
                            <div class="slider-content-inner">
                                <h4>Audi RS 6</h4>
                                <div class="info-fx">Avant GT <b>2024</b></div>
                                <div class="fx-info-text">
                                    Performance extraordinaire dans la matrice automobile
                                </div>
                                <div class="fx-info-tech">
                                    <div>
                                        <p>Type de carburant</p>
                                        <h5>Essence</h5>
                                    </div>
                                    <div>
                                        <p>Kilométrage</p>
                                        <h5>250Mi</h5>
                                    </div>
                                    <div>
                                        <p>Transmission</p>
                                        <h5>Manuelle</h5>
                                    </div>

                                    <div>
                                    </div>
                                    <a class="btn-slide">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7 7L17 17" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M17 7V17H7" stroke="#ffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <img src="images/slider1.jpg" alt="img">
                    </div>

                    <div class="swiper-slide">
                        <div class="slider-content">
                            <div class="slider-content-inner">
                                <h4>Xiaomi</h4>
                                <div class="info-fx">SU7 <b>2022</b></div>
                                <div class="fx-info-text">
                                    Cette berline électrique est développée par des Chinois
                                </div>

                                <div class="fx-info-tech">
                                    <div>
                                        <p>Type de carburant</p>
                                        <h5>Essence</h5>
                                    </div>
                                    <div>
                                        <p>Kilométrage</p>
                                        <h5>150Mi</h5>
                                    </div>
                                    <div>
                                        <p>Transmission</p>
                                        <h5>Manuelle</h5>
                                    </div>

                                    <div>
                                    </div>
                                    <a class="btn-slide">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7 7L17 17" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M17 7V17H7" stroke="#ffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <img src="images/slider2.jpg" alt="img">
                    </div>

                    <div class="swiper-slide">
                        <div class="slider-content">
                            <div class="slider-content-inner">
                                <h4>Cadillac</h4>
                                <div class="info-fx">Celestiq <b>2024</b></div>
                                <div class="fx-info-text">
                                    Cette berline électrique est la manifestation ultime du luxe ultra
                                </div>

                                <div class="fx-info-tech">
                                    <div>
                                        <p>Type de carburant</p>
                                        <h5>Électrique</h5>
                                    </div>
                                    <div>
                                        <p>Kilométrage</p>
                                        <h5>190Mi</h5>
                                    </div>
                                    <div>
                                        <p>Transmission</p>
                                        <h5>Automatique</h5>
                                    </div>

                                    <div>
                                    </div>
                                    <a class="btn-slide">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7 7L17 17" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M17 7V17H7" stroke="#ffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <img src="images/slider3.jpg" alt="img">
                    </div>

                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <section class="section-search-results section-top-padding">
        <div class="container">
            <div class="search-inner row section-about-2col p-2">
                <!-- Colonne de gauche avec le formulaire de recherche -->
                <div class="about-2cols col-md-4">
                    <div class="search-content__info">
                        <h3 class="search-content__info__title">
                            Trouvez votre voiture idéale
                        </h3>
                        <!-- Formulaire de recherche -->
                        <form action="{{ route('vehicules.search') }}" method="GET" class="search-form">
                            <div class="search-form__group">
                                <label for="marque" class="search-form__label">Marque</label>
                                <input type="text" id="marque" name="marque" class="search-form__input" placeholder="Ex. Toyota">
                            </div>
                            <div class="search-form__group">
                                <label for="modele" class="search-form__label">Modèle</label>
                                <input type="text" id="modele" name="modele" class="search-form__input" placeholder="Ex. Corolla">
                            </div>
                            <div class="search-form__group">
                                <label for="année" class="search-form__label">Année</label>
                                <input type="number" id="année" name="année" class="search-form__input" placeholder="Ex. 2022" min="1900" max="{{ date('Y') }}">
                            </div>
                            <div class="search-form__group">
                                <label for="tarif_location" class="search-form__label">Tarif Location (max)</label>
                                <input type="number" id="tarif_location" name="tarif_location" class="search-form__input" placeholder="Ex. 500" min="0">
                            </div>
                            <div class="btn-action">
                                <button type="submit" class="btn btn-search">
                                    <span>Rechercher</span>
                                    <b>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 16C14.4183 16 18 12.4183 18 8C18 3.58172 14.4183 0 10 0C5.58172 0 2 3.58172 2 8C2 12.4183 5.58172 16 10 16Z" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M22 22L16.65 16.65" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </b>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Colonne de droite avec les résultats de la recherche -->
                @if(request()->has('marque') || request()->has('modele') || request()->has('année') || request()->has('tarif_location'))
                    <div class="col-md-8 about-col2">
                        <div class="results-inner">
                            @if($vehicules->isEmpty())
                                <p class="no-results">Aucun véhicule trouvé correspondant à vos critères.</p>
                            @else
                                <div class="results-list">
                                    @foreach($vehicules as $vehicule)
                                        <div class="result-item {{ $vehicule->isSearchResult ? 'highlighted' : '' }}">
                                            <img src="{{ asset('storage/' . $vehicule->image) }}" alt="{{ $vehicule->marque }} {{ $vehicule->modele }}" class="result-item__img">
                                            <div class="result-item__info">
                                                <h3 class="result-item__title">{{ $vehicule->marque }} {{ $vehicule->modele }}</h3>
                                                <p class="result-item__details">Année: {{ $vehicule->année }}</p>
                                                <p class="result-item__details">Tarif: {{ $vehicule->tarif_location }} franc CFA/jour</p>
                                                <a href="{{ route('vehicule.details', ['id' => $vehicule->id]) }}" class="btn btn-view">Voir les détails</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <style>
        .search-inner {
            display: flex;
            flex-wrap: wrap;
        }

        .search-content__info__title {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .search-content__info__text {
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        .search-form {
            display: flex;
            flex-direction: column;
        }

        .search-form__group {
            margin-bottom: 1rem;
        }

        .search-form__label {
            display: block;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .search-form__input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn-action {
            margin-top: 1rem;
        }

        .btn-search {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-search:hover {
            background-color: #0056b3;
        }

        .results-list {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .result-item {
            display: flex;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            width: 100%;
            max-width: 350px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .result-item__img {
            width: 150px;
            height: 100px;
            object-fit: cover;
        }

        .result-item__info {
            padding: 1rem;
        }

        .result-item__title {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .result-item__details {
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        .btn-view {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            text-decoration: none;
        }

        .btn-view:hover {
            background-color: #0056b3;
        }

        .no-results {
            font-size: 1.25rem;
            color: #666;
        }

        /* Style pour les résultats de recherche */
        .result-item.highlighted {
            border: 2px solid #007bff; /* Bordure bleue */
            background-color: #f0f8ff; /* Fond légèrement coloré */
        }

        .result-item.highlighted .result-item__title {
            color: #007bff; /* Titre en bleu */
        }
    </style>




    <section class="main__carbox carbox main__carbox-white section-all-padding">
        <div class="container">
            <div class="carbox__titling titling titling--centered">
                <p class="titling__suptext">Élever les trajets à un niveau supérieur</p>
                <h1 class="titling__title">Véhicules Carbox</h1>
                <p class="titling__text">Convallis etiam at vulputate integer duis sodales. Est velit vulputate risus risus fermentum tempus leo volutpat. Laoreet at adipiscing mauris</p>
            </div>

            <div class="listing-swiper swiper">
                <div class="swiper-wrapper">
                    @foreach($vehicules as $vehicule)
                        <div class="swiper-slide">
                            <a class="carbox__card carbox-card " href="{{ route('vehicule.details', ['id' => $vehicule->id]) }}">
                                <div class="carbox-card__preview carbox-card-preview">
                                    <img class="carbox-card-preview__img" src="{{ asset('storage/' . $vehicule->image) }}" alt="{{ $vehicule->marque }} {{ $vehicule->modele }}">
                                </div>
                                <div class="carbox-card__inner">
                                    <p class="carbox-card__suptext">{{ $vehicule->marque }}</p>
                                    <h3 class="carbox-card__title">{{ $vehicule->année }} {{ $vehicule->marque }} {{ $vehicule->modele }}</h3>
                                    <div class="carbox-card__info carbox-card-info">
                                        <div class="carbox-card-info__box carbox-card-info-box">
                                            <div class="carbox-card-info-box__icon">
                                                <!-- Icône essence -->
                                            </div>
                                            <div class="carbox-card-info-box__column">
                                                <p class="carbox-card-info-box__column-suptext">Essence</p>
                                                <p class="carbox-card-info-box__column-text">{{ $vehicule->carburant }}</p>
                                            </div>
                                        </div>
                                        <div class="carbox-card-info__box carbox-card-info-box">
                                            <div class="carbox-card-info-box__icon">
                                                <!-- Icône vitesse -->
                                            </div>
                                            <div class="carbox-card-info-box__column">
                                                <p class="carbox-card-info-box__column-suptext">Vitesse</p>
                                                <p class="carbox-card-info-box__column-text">{{ $vehicule->vitesse_max }}</p>
                                            </div>
                                        </div>
                                        <div class="carbox-card-info__box carbox-card-info-box">
                                            <div class="carbox-card-info-box__icon">
                                                <!-- Icône contrôle -->
                                            </div>
                                            <div class="carbox-card-info-box__column">
                                                <p class="carbox-card-info-box__column-suptext">Contrôles</p>
                                                <p class="carbox-card-info-box__column-text">{{ $vehicule->controle }}</p>
                                            </div>
                                        </div>
                                        <div class="carbox-card-info__box carbox-card-info-box">
                                            <div class="carbox-card-info-box__icon">
                                            </div>
                                            <div class="carbox-card-info-box__column">
                                                <p class="carbox-card-info-box__column-suptext">type</p>
                                                <p class="carbox-card-info-box__column-text">{{ $vehicule->type }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carbox-card__bottom carbox-card-bottom">
                                        <div class="carbox-card-bottom__price">
                                            <ins class="carbox-card-bottom__price-current">{{ $vehicule->tarif_location }}franc CFA</ins>
                                        </div>
                                        <div class="carbox-card-bottom__rait">
                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"></svg>
                                            <span>{{ $vehicule->note }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

            <div class="carbox__wrap">
                <a class="carbox__link btn" href="{{ route('vehicules') }}">
                    <span>Voir toutes les annonces</span>
                    <b>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"></svg>
                    </b>
                </a>
            </div>
        </div>
    </section>

    <section class="section__catalog_tab section-all-padding">
        <div class="container">
            <div class="catalog__inner" id="cataloge-tabs">
                <div class="catalog__content catalog-content">
                    <h2 class="catalog-content__title_">Nos Véhicules en Vedette</h2>
                    @if($vehicules->isNotEmpty())
                        @php
                            $featuredVehicule = $vehicules->first();
                        @endphp
                        <div class="catalog-content__featured">
                            <a href="{{ route('vehicule.details', $featuredVehicule->id) }}" class="catalog-content__link">
                                <div class="catalog-content__preview">
                                    <img src="{{ asset('storage/' . $featuredVehicule->image) }}" alt="{{ $featuredVehicule->marque }} {{ $featuredVehicule->modele }}" class="catalog-content__img">
                                </div>
                                <div class="catalog-content__info">
                                    <h3 class="catalog-content__title">{{ $featuredVehicule->marque }} {{ $featuredVehicule->modele }}</h3>
                                    <p class="catalog-content__details">
                                        <span>Année: {{ $featuredVehicule->année }}</span>
                                        <span>Tarif: ${{ $featuredVehicule->tarif_location }} par jour</span>
                                    </p>
                                    <p class="catalog-content__description">{{ $featuredVehicule->description }}</p>
                                    <p class="catalog-content__cta">
                                        Réservez maintenant pour une expérience inoubliable!
                                    </p>
                                </div>
                            </a>
                        </div>
                    @else
                        <p>Aucun véhicule disponible pour le moment.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>


    <section class="section__browse_vehicle_brands section-all-padding">
        <div class="container">
            <div class="carbox__titling titling titling--centered">
                <p class="titling__suptext">Élevez vos trajets à un niveau supérieur</p>
                <h1 class="titling__title">Marques de véhicules</h1>
                <p class="titling__text">Découvrez notre sélection de marques de véhicules, allant des modèles les plus récents aux plus populaires. Trouvez celui qui correspond à vos besoins.</p>
            </div>

            <div class="brands-grid brands-grid_3col">
                <div class="brands-grid-item">
                    <a href="#"><img src="images/g1.jpg" alt="Coupe"></a>
                    <span>Coupe</span>
                </div>
                <div class="brands-grid-item">
                    <a href="#"><img src="images/g2.jpg" alt="SUV"></a>
                    <span>SUV</span>
                </div>
                <div class="brands-grid-item">
                    <a href="#"><img src="images/g3.jpg" alt="Hybride"></a>
                    <span>Hybride</span>
                </div>
            </div>

            <div class="brands-grid brands-grid_2col">
                <div class="brands-grid-item">
                    <a href="#"><img src="images/g4.jpg" alt="Berline"></a>
                    <span>Berline</span>
                </div>
                <div class="brands-grid-item">
                    <a href="#"><img src="images/g5.jpg" alt="Sport"></a>
                    <span>Sport</span>
                </div>
            </div>
        </div>
    </section>

    <section class="section-all-padding main__reviews-bg1">
        <div class="container">

            <div class="carbox__titling titling titling--centered">
                <p class="titling__suptext">Emmener les trajets à un niveau supérieur</p>
                <h1 class="titling__title">Nos Clients</h1>
                <p class="titling__text">
                    Ce que disent nos clients de notre service de recherche de voitures rapide, c'est qu'il est efficace et fiable. Ils apprécient la rapidité avec laquelle nous trouvons le véhicule parfait pour eux, leur faisant gagner un temps et des efforts précieux.
                </p>
            </div>

            <div class="rcslide__inner">
                <div class="rcslide__swiper rcslide-swiper swiper" data-rcslide-style="1" data-rcslide-col="3">
                    <div class="swiper-wrapper">
                        <div class="rcslide-swiper__slide rcslide-slide swiper-slide">
                            <div class="rcslide-slide__inner">
                                <div class="rcslide-slide__top rcslide-slide-top">
                                    <div class="rcslide-slide-top__box rcslide-slide-top-box">
                                        <div class="rcslide-slide-top-box__img">
                                            <img class="rcslide-slide-top-box__img-image" src="images/ava1.jpeg" alt="Andrew Tyson">
                                        </div>
                                        <div class="rcslide-slide-top-box__column">
                                            <p class="rcslide-slide-top-box__column-name">Andrew Tyson</p>
                                            <p class="rcslide-slide-top-box__column-text">Acheteur de voitures</p>
                                        </div>
                                    </div>
                                    <div class="rcslide-slide-top__stars stars stars-rate-2">
                                        <!-- Icônes des étoiles pour la notation -->
                                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.04894 0.92705C7.3483 0.00573921 8.6517 0.00573969 8.95106 0.92705L10.0206 4.21885C10.1545 4.63087 10.5385 4.90983 10.9717 4.90983H14.4329C15.4016 4.90983 15.8044 6.14945 15.0207 6.71885L12.2205 8.75329C11.87 9.00793 11.7234 9.4593 11.8572 9.87132L12.9268 13.1631C13.2261 14.0844 12.1717 14.8506 11.388 14.2812L8.58778 12.2467C8.2373 11.9921 7.7627 11.9921 7.41221 12.2467L4.61204 14.2812C3.82833 14.8506 2.77385 14.0844 3.0732 13.1631L4.14277 9.87132C4.27665 9.4593 4.12999 9.00793 3.7795 8.75329L0.979333 6.71885C0.195619 6.14945 0.598395 4.90983 1.56712 4.90983H5.02832C5.46154 4.90983 5.8455 4.63087 5.97937 4.21885L7.04894 0.92705Z" fill="#E63619" />
                                        </svg>
                                        <!-- Répéter les icônes selon les étoiles nécessaires -->
                                    </div>
                                </div>
                                <p class="rcslide-slide__text">
                                    Vestibulum neque aliquam consequat elementum at tempus praesent turpis netus. Egestas ac dictual stvel venenatis sed.
                                </p>
                            </div>
                        </div>
                        <div class="rcslide-swiper__slide rcslide-slide swiper-slide">
                            <div class="rcslide-slide__inner">
                                <div class="rcslide-slide__top rcslide-slide-top">
                                    <div class="rcslide-slide-top__box rcslide-slide-top-box">
                                        <div class="rcslide-slide-top-box__img">
                                            <img class="rcslide-slide-top-box__img-image" src="images/ava2.jpeg" alt="Shane Wilson">
                                        </div>
                                        <div class="rcslide-slide-top__column">
                                            <p class="rcslide-slide-top-box__column-name">Shane Wilson</p>
                                            <p class="rcslide-slide-top-box__column-text">Vendeur de voitures</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="rcslide-slide__text">
                                    Platea netus imperdiet sed pellentesque feugiat. Nullam viverra lobortis venenatis aliquet tempus malesuada ut. Velit mattis interdum.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="rcslide-swiper__pagination swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="main__articles section-all-padding">
        <div class="container">
           <div class="articles__titling titling titling--centered">
              <p class="titling__suptext"> Élevez vos trajets à un autre niveau </p>
              <h1 class="titling__title">
                 Nos Nouveaux Articles
              </h1>
              <p class="titling__text"> Convallis etiam at vulputate integer duis sodales. Est velit vulputate risus risus fermentum tempus leo volutpat laoreet at adipiscing mauris </p>
           </div>
           <div class="articles__inner">
              <div class="articles__card articles-card articles-card articles-card-box articles-card-date-bottom" href="#">
                  <div class="articles-card__poster">  <a href="#"><img class="articles-card__img" src="images/articles-img-1.jpg" alt="img"> </a></div>
                 <div class="articles-card__bottom">

                    <h3 class="articles-card__title">
                        <a href="#"> Voici un premier aperçu du Honda Civic modifié pour le marché américain</a>
                    </h3>
                    <p class="articles-card__text"> Un nullam dui augue fames porttitor etiam sed libero morbi eget at volutpat magna purus. </p>


                     <div class="articles-card__info articles-card-info articles-card-info articles-card-info-v2">
                       <div class="articles-card-info__box">

                          <time class="articles-card-info__box-text"> <strong>16</strong> Oct 2023 </time>

                           <div class="aci-post-author"><a href="/">Mark Doe</a></div>
                       </div>
                    </div>
                 </div>
              </div>
               <div class="articles__card articles-card articles-card articles-card-box articles-card-date-bottom" href="#">
                   <div class="articles-card__poster">  <a href="#"><img class="articles-card__img" src="images/articles-img-2.jpg" alt="img"> </a></div>
                 <div class="articles-card__bottom">

                    <h3 class="articles-card__title">
                      <a href="#">Une légende japonaise peut désormais être importée légalement aux États-Unis</a>
                    </h3>
                    <p class="articles-card__text"> Un nullam dui augue fames porttitor etiam sed libero morbi eget at volutpat magna purus. </p>


                     <div class="articles-card__info articles-card-info articles-card-info articles-card-info-v2">
                       <div class="articles-card-info__box">

                          <time class="articles-card-info__box-text"> <strong>21</strong> Déc 2023 </time>

                           <div class="aci-post-author"><a href="/">Mark Doe</a></div>
                       </div>
                    </div>
                 </div>
              </div>
               <div class="articles__card articles-card articles-card articles-card-box articles-card-date-bottom" href="#">
                   <div class="articles-card__poster"> <a href="#"> <img class="articles-card__img" src="images/articles-img-3.jpg" alt="img"></a> </div>
                 <div class="articles-card__bottom">

                    <h3 class="articles-card__title">
                        <a href="#"> Hennessey construit une Dodge Challenger</a>
                    </h3>
                    <p class="articles-card__text"> Un nullam dui augue fames porttitor etiam sed libero morbi eget at volutpat magna purus. </p>


                     <div class="articles-card__info articles-card-info articles-card-info articles-card-info-v2">
                       <div class="articles-card-info__box">

                          <time class="articles-card-info__box-text"> <strong>06</strong> Jan 2024 </time>

                           <div class="aci-post-author"><a href="/">Mark Doe</a></div>
                       </div>

                    </div>
                 </div>
              </div>
              </div>
        </div>
        <img class="articles__bg" src="images/articles-bg.png" alt="bg">
     </section>

 </main>
@endsection
