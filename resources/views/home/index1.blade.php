@extends('base')

@section('title', 'Home')

@section('content')
<main class="main">
    <section class="main__selection">
        <div class="container-fluid">

            <div class="switcher-wrapper">
                <div class="demo_changer">
                    <div class="demo-icon color-primary">

                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
    <g>
        <g>
            <path d="M500.633,211.454l-58.729-14.443c-3.53-11.133-8.071-21.929-13.55-32.256c8.818-14.678,27.349-45.571,27.349-45.571
                c3.545-5.903,2.607-13.462-2.256-18.325l-42.422-42.422c-4.863-4.878-12.407-5.815-18.325-2.256L347.055,83.53
                c-10.269-5.435-21.006-9.932-32.065-13.433l-14.443-58.729C298.876,4.688,292.885,0,286,0h-60
                c-6.885,0-12.891,4.688-14.546,11.367c0,0-10.005,40.99-14.429,58.715c-11.792,3.735-23.188,8.584-34.043,14.502l-47.329-28.403
                c-5.918-3.516-13.447-2.607-18.325,2.256l-42.422,42.422c-4.863,4.863-5.801,12.422-2.256,18.325l29.268,48.882
                c-4.717,9.302-8.672,18.984-11.821,28.901l-58.729,14.487C4.688,213.124,0,219.115,0,226v60c0,6.885,4.688,12.891,11.367,14.546
                l58.744,14.443c3.56,11.294,8.188,22.266,13.799,32.798l-26.191,43.652c-3.545,5.903-2.607,13.462,2.256,18.325l42.422,42.422
                c4.849,4.849,12.407,5.771,18.325,2.256c0,0,29.37-17.607,43.755-26.221c10.415,5.552,21.313,10.137,32.549,13.696l14.429,58.715
                C213.109,507.313,219.115,512,226,512h60c6.885,0,12.876-4.688,14.546-11.367l14.429-58.715
                c11.558-3.662,22.69-8.394,33.281-14.136c14.78,8.862,44.443,26.66,44.443,26.66c5.903,3.53,13.462,2.622,18.325-2.256
                l42.422-42.422c4.863-4.863,5.801-12.422,2.256-18.325l-26.968-44.927c5.317-10.093,9.727-20.654,13.169-31.523l58.729-14.443
                C507.313,298.876,512,292.885,512,286v-60C512,219.115,507.313,213.124,500.633,211.454z M256,361c-57.891,0-105-47.109-105-105
                s47.109-105,105-105s105,47.109,105,105S313.891,361,256,361z"/>
        </g>
    </g>
    <g>
    </g>
    <g>
    </g>
    <g>
    </g>
    <g>
    </g>
    <g>
    </g>
    <g>
    </g>
    <g>
    </g>
    <g>
    </g>
    <g>
    </g>
    <g>
    </g>
    <g>
    </g>
    <g>
    </g>
    <g>
    </g>
    <g>
    </g>
    <g>
    </g>
    </svg>

                    </div>
                    <div class="form_holder">
                        <div class="predefined_styles">
                            <div class="skin-theme-switcher">
                                <h4>Color</h4>
                                <a class="styleswitch" href="javascript:void(0);" data-switchcolor="color1" style="background-color:#DD0005"></a>
                                <a class="styleswitch" href="javascript:void(0);" data-switchcolor="color2" style="background-color:#fabc00"></a>
                                <a class="styleswitch" href="javascript:void(0);" data-switchcolor="color3" style="background-color:#1e87f0"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end switcher-->

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
                        <img src="{{asset('images/slider1.jpg')}}" alt="img">
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
                        <img src="{{asset('images/slider2.jpg')}}" alt="img">
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
                        <img src="{{asset('images/slider3.jpg')}}" alt="img">
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
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.9931 3.24071C17.9928 3.24034 17.9925 3.24006 17.9921 3.23972L16.9944 2.24022C16.8384 2.08398 16.5858 2.08398 16.4298 2.24022C16.2738 2.39646 16.2738 2.6496 16.4298 2.80584L17.311 3.68865V6.26328C17.311 7.32675 18.1519 8.19085 19.2014 8.24058V16.498C19.2014 16.9035 18.8719 17.2332 18.4672 17.2332C18.0624 17.2332 17.7333 16.9035 17.7333 16.498V15.3043C17.7333 14.4379 17.0299 13.7332 16.1654 13.7332H15.4043V1.6C15.4043 0.717581 14.688 0 13.8071 0H3.42554C2.54469 0 1.82839 0.717581 1.82839 1.6V19.2H0.399282C0.178582 19.2 0 19.3789 0 19.6C0 19.8211 0.178582 20 0.399282 20H2.2277H15.005H16.8334C17.0541 20 17.2327 19.8211 17.2327 19.6C17.2327 19.3789 17.0541 19.2 16.8334 19.2H15.4043V14.5332H16.1654C16.5897 14.5332 16.9347 14.8793 16.9347 15.3043V16.498C16.9347 17.3445 17.6222 18.0332 18.4672 18.0332C19.3125 18.0332 20 17.3445 20 16.498V5.41679C20 5.31054 19.9579 5.20897 19.883 5.13397L17.9931 3.24071ZM2.62698 19.2V1.6C2.62698 1.15897 2.98533 0.799984 3.42554 0.799984H13.8071C14.2473 0.799984 14.6057 1.15897 14.6057 1.6V19.2H2.62698ZM18.1096 6.26328V4.48867L19.2014 5.58242V7.44057C18.5923 7.39217 18.1096 6.88573 18.1096 6.26328Z" fill="#E63619" />
                                                    <path d="M13.4078 1.6001H3.82488C3.60418 1.6001 3.42557 1.779 3.42557 2.00009V8.8333C3.42557 9.05439 3.60418 9.23329 3.82488 9.23329H13.4078C13.6285 9.23329 13.8071 9.05439 13.8071 8.8333V2.00009C13.8071 1.779 13.6285 1.6001 13.4078 1.6001ZM13.0085 8.43331H4.22416V2.40008H13.0085V8.43331Z" fill="#E63619" />
                                                    <path d="M13.1415 12.1001C12.9208 12.1001 12.7422 12.279 12.7422 12.5001V15.7669C12.7422 15.988 12.9208 16.1669 13.1415 16.1669C13.3622 16.1669 13.5408 15.988 13.5408 15.7669V12.5001C13.5408 12.279 13.3622 12.1001 13.1415 12.1001Z" fill="#E63619" />
                                                 </svg>
                                            </div>
                                            <div class="carbox-card-info-box__column">
                                                <p class="carbox-card-info-box__column-suptext">Essence</p>
                                                <p class="carbox-card-info-box__column-text">{{ $vehicule->carburant }}</p>
                                            </div>
                                        </div>
                                        <div class="carbox-card-info__box carbox-card-info-box">
                                            <div class="carbox-card-info-box__icon">
                                                <!-- Icône vitesse -->
                                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 9.87479C9.71053 9.87479 9.47368 10.1143 9.47368 10.4095C9.47368 10.7047 9.71053 10.9442 10 10.9442C10.2895 10.9442 10.5263 10.7047 10.5263 10.4095C10.5263 10.1143 10.2895 9.87479 10 9.87479ZM10 12.0136C9.12947 12.0136 8.42105 11.2939 8.42105 10.4095C8.42105 9.52508 9.12947 8.80536 10 8.80536C10.2432 8.80536 10.4737 8.86204 10.68 8.9615L13.1695 6.43339C13.3747 6.22485 13.7074 6.22485 13.9137 6.43339C14.1189 6.643 14.1189 6.98093 13.9137 7.18947L11.4253 9.71865C11.5232 9.92719 11.5789 10.1625 11.5789 10.4095C11.5789 11.2939 10.8705 12.0136 10 12.0136ZM16.6989 17.75C16.5589 17.75 16.4253 17.6933 16.3274 17.5928L14.8389 16.0806C14.6326 15.8721 14.6326 15.5342 14.8389 15.3246C15.0442 15.116 15.3768 15.116 15.5832 15.3246L16.6884 16.4474C18.0674 14.8722 18.8137 12.9237 18.9274 10.9442H17.3684C17.0779 10.9442 16.8421 10.7047 16.8421 10.4095C16.8421 10.1143 17.0779 9.87479 17.3684 9.87479H18.9274C18.8147 7.89422 18.0674 5.94573 16.6884 4.37155L15.5832 5.49444C15.3768 5.70298 15.0442 5.70298 14.8389 5.49444C14.6326 5.28483 14.6326 4.9469 14.8389 4.73836L15.9442 3.6144C14.4358 2.24875 12.5442 1.45203 10.5263 1.33439V2.92355C10.5263 3.21871 10.2905 3.45826 10 3.45826C9.70947 3.45826 9.47368 3.21871 9.47368 2.92355V1.33439C7.45579 1.45203 5.56421 2.24875 4.05579 3.6144L5.16105 4.73729C5.36737 4.9469 5.36737 5.28483 5.16105 5.49337C4.95579 5.70298 4.62316 5.70298 4.41684 5.49337L3.31158 4.37048C1.93263 5.94573 1.18526 7.89422 1.07263 9.87479H2.63158C2.92211 9.87479 3.15789 10.1143 3.15789 10.4095C3.15789 10.7047 2.92211 10.9442 2.63158 10.9442H1.07263C1.18632 12.9237 1.93263 14.8733 3.31158 16.4474L4.41684 15.3246C4.62316 15.116 4.95579 15.116 5.16105 15.3246C5.36737 15.5342 5.36737 15.8721 5.16105 16.0806L3.67263 17.5928C3.57474 17.6933 3.44105 17.75 3.30105 17.75C3.16105 17.75 3.02737 17.6933 2.92842 17.5928C0.996842 15.6304 0.0221054 13.0595 0.00526328 10.4822C0.00210538 10.4576 0 10.4341 0 10.4095C0 10.3849 0.00210538 10.3614 0.00526328 10.3368C0.0221054 7.75947 0.996842 5.18751 2.92842 3.22513C4.81684 1.30659 7.32842 0.25 10 0.25C12.6716 0.25 15.1832 1.30659 17.0716 3.22513C19.0032 5.18751 19.9779 7.75947 19.9947 10.3368C19.9979 10.3614 20 10.3849 20 10.4095C20 10.4341 19.9979 10.4576 19.9947 10.4822C19.9779 13.0595 19.0032 15.6304 17.0716 17.5928C16.9726 17.6933 16.8389 17.75 16.6989 17.75Z" fill="#E63619" />
                                                 </svg>
                                            </div>
                                            <div class="carbox-card-info-box__column">
                                                <p class="carbox-card-info-box__column-suptext">Vitesse</p>
                                                <p class="carbox-card-info-box__column-text">{{ $vehicule->vitesse_max }}</p>
                                            </div>
                                        </div>
                                        <div class="carbox-card-info__box carbox-card-info-box">
                                            <div class="carbox-card-info-box__icon">
                                                <!-- Icône contrôle -->
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_61_900)">
                                                       <path d="M19.4141 2.34375H16.3864C16.1141 1.00812 14.9305 0 13.5156 0C12.1008 0 10.9171 1.00812 10.6449 2.34375H0.585938C0.262344 2.34375 0 2.60609 0 2.92969C0 3.25328 0.262344 3.51562 0.585938 3.51562H10.6449C10.9171 4.85125 12.1008 5.85938 13.5156 5.85938C14.9305 5.85938 16.1141 4.85125 16.3864 3.51562H19.4141C19.7377 3.51562 20 3.25328 20 2.92969C20 2.60609 19.7377 2.34375 19.4141 2.34375ZM13.5156 4.6875C12.5465 4.6875 11.7581 3.89922 11.7578 2.9302C11.7578 2.93004 11.7579 2.92988 11.7579 2.92969C11.7579 2.92949 11.7578 2.92934 11.7578 2.92918C11.7581 1.96016 12.5465 1.17188 13.5156 1.17188C14.4849 1.17188 15.2734 1.96043 15.2734 2.92969C15.2734 3.89895 14.4849 4.6875 13.5156 4.6875Z" fill="#E63619" />
                                                       <path d="M19.4141 9.41406H9.35512C9.08293 8.07844 7.89922 7.07031 6.48438 7.07031C5.06953 7.07031 3.88586 8.07844 3.61363 9.41406H0.585938C0.262344 9.41406 0 9.67641 0 10C0 10.3236 0.262344 10.5859 0.585938 10.5859H3.61363C3.88582 11.9216 5.06953 12.9297 6.48438 12.9297C7.89922 12.9297 9.08289 11.9216 9.35512 10.5859H19.4141C19.7377 10.5859 20 10.3236 20 10C20 9.67641 19.7377 9.41406 19.4141 9.41406ZM6.48438 11.7578C5.51527 11.7578 4.72684 10.9695 4.72656 10.0005C4.72656 10.0004 4.7266 10.0002 4.7266 10C4.7266 9.9998 4.72656 9.99965 4.72656 9.99949C4.72684 9.03047 5.51527 8.24219 6.48438 8.24219C7.45363 8.24219 8.24219 9.03074 8.24219 10C8.24219 10.9693 7.45363 11.7578 6.48438 11.7578Z" fill="#E63619" />
                                                       <path d="M19.4141 16.4844H16.3864C16.1142 15.1487 14.9305 14.1406 13.5156 14.1406C12.1008 14.1406 10.9171 15.1487 10.6449 16.4844H0.585938C0.262344 16.4844 0 16.7467 0 17.0703C0 17.3939 0.262344 17.6562 0.585938 17.6562H10.6449C10.9171 18.9919 12.1008 20 13.5156 20C14.9305 20 16.1141 18.9919 16.3864 17.6562H19.4141C19.7377 17.6562 20 17.3939 20 17.0703C20 16.7467 19.7377 16.4844 19.4141 16.4844ZM13.5156 18.8281C12.5465 18.8281 11.7581 18.0398 11.7578 17.0708C11.7578 17.0707 11.7579 17.0705 11.7579 17.0703C11.7579 17.0701 11.7578 17.07 11.7578 17.0698C11.7581 16.1008 12.5465 15.3125 13.5156 15.3125C14.4849 15.3125 15.2734 16.1011 15.2734 17.0703C15.2734 18.0396 14.4849 18.8281 13.5156 18.8281Z" fill="#E63619" />
                                                    </g>
                                                    <defs>
                                                       <clipPath id="clip0_61_900">
                                                          <rect width="20" height="20" fill="white" />
                                                       </clipPath>
                                                    </defs>
                                                 </svg>
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
                                            <ins class="carbox-card-bottom__price-current">{{ $vehicule->tarif_location }}XOF</ins>
                                        </div>
                                        <div class="carbox-card-bottom__rait">
                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4.04894 0.927049C4.3483 0.0057385 5.6517 0.00573921 5.95106 0.92705L6.34708 2.1459C6.48096 2.55792 6.86491 2.83688 7.29814 2.83688H8.57971C9.54844 2.83688 9.95121 4.0765 9.1675 4.6459L8.13068 5.39919C7.7802 5.65383 7.63354 6.1052 7.76741 6.51722L8.16344 7.73607C8.46279 8.65738 7.40831 9.4235 6.6246 8.8541L5.58778 8.10081C5.2373 7.84617 4.7627 7.84617 4.41221 8.10081L3.3754 8.8541C2.59169 9.4235 1.53721 8.65738 1.83656 7.73607L2.23259 6.51722C2.36646 6.1052 2.2198 5.65383 1.86932 5.39919L0.832501 4.6459C0.0487874 4.0765 0.451563 2.83688 1.42029 2.83688H2.70186C3.13509 2.83688 3.51904 2.55792 3.65292 2.1459L4.04894 0.927049Z" fill="#F0C419" />
                                             </svg>                                            <span>{{ $vehicule->note }}</span>
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
                    <a href="#"><img src="{{asset('images/pngegg (1).png')}}" alt="Coupe"></a>
                    <span>Coupe</span>
                </div>
                <div class="brands-grid-item">
                    <a href="#"><img src="{{asset('images/g2.jpg')}}" alt="SUV"></a>
                    <span>SUV</span>
                </div>
                <div class="brands-grid-item">
                    <a href="#"><img src="{{asset('images/pngegg (2).png')}}" alt="Hybride"></a>
                    <span>Hybride</span>
                </div>
            </div>

            <div class="brands-grid brands-grid_2col">
                <div class="brands-grid-item">
                    <a href="#"><img src="{{asset('images/pngegg.png')}}" alt="Berline"></a>
                    <span>Berline</span>
                </div>
                <div class="brands-grid-item">
                    <a href="#"><img src="{{asset('images/s3.jpg')}}" alt="Sport"></a>
                    <span>Sport</span>
                </div>
            </div>
        </div>
    </section>

    <section class="section-all-padding main__reviews-bg1">
        <div class="container">

            <div class="carbox__titling titling titling--centered ">
                <p class="titling__suptext">Emmener les trajets à un niveau supérieur</p>
                <h1 class="titling__title text-dark">Nos Clients</h1>
                <p class="titling__text text-dark">
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
                                            <img class="rcslide-slide-top-box__img-image" src="{{asset('images/ava1.jpeg')}}" alt="Andrew Tyson">
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
                                            <img class="rcslide-slide-top-box__img-image" src="{{asset('images/ava2.jpeg')}}" alt="Shane Wilson">
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
                  <div class="articles-card__poster">  <a href="#"><img class="articles-card__img" src="{{asset('images/articles-img-1.jpg')}}" alt="img"> <img class="articles-card__img"> </a></div>
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
                   <div class="articles-card__poster">  <a href="#"><img class="articles-card__img" src="{{asset('images/articles-img-2.jpg')}}" alt="img"> </a></div>
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
                   <div class="articles-card__poster"> <a href="#"> <img class="articles-card__img" src="{{asset('images/articles-img-3.jpg')}}" alt="img"></a> </div>
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
        <img class="articles__bg" src="{{asset('images/articles-bg.png')}}" alt="bg">
     </section>

 </main>
@endsection
