@extends('base')

@section('title', 'Home')

@section('content')



<div class="hero-wrap ftco-degree-bg" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
      <div class="col-lg-8 ftco-animate">
        <div class="text w-100 text-center mb-md-5 pb-md-5">
          <h1 class="mb-4">Louez une Voiture Facilement et Rapidement</h1>
          <p style="font-size: 18px;">Un petit fleuve nommé Duden passe par leur village et lui fournit les ressources nécessaires. C'est un pays paradisiaque où les parties rôties abondent.</p>
          <a href="" class="icon-wrap popup-vimeo d-flex align-items-center mt-4 justify-content-center">
            <div class="icon d-flex align-items-center justify-content-center">
              <span class="ion-ios-play"></span>
            </div>
            <div class="heading-title ml-5">
              <span>Étapes simples pour louer une voiture</span>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>


 <section class="ftco-section ftco-no-pt bg-light">
  <div class="container">
    <div class="row no-gutters">
      <div class="col-md-12 featured-top">
        <div class="row no-gutters">
          <div class="col-md-12 d-flex align-items-center">
            <form action="{{ route('vehicules.search') }}" method="GET" class="request-form ftco-animate bg-primary">
              <h2>Recherchez votre véhicule</h2>

              <div class="form-group">
                <label for="marque" class="label">Marque</label>
                <input type="text" name="marque" class="form-control" placeholder="Marque du véhicule" value="{{ request('marque') }}">
              </div>

              <div class="form-group">
                <label for="modele" class="label">Modèle</label>
                <input type="text" name="modele" class="form-control" placeholder="Modèle du véhicule" value="{{ request('modele') }}">
              </div>

              <div class="form-group">
                <label for="année" class="label">Année</label>
                <input type="number" name="année" class="form-control" placeholder="Année du véhicule" value="{{ request('année') }}">
              </div>

              <div class="form-group">
                <label for="tarif_location" class="label">Tarif maximum par jour</label>
                <input type="number" name="tarif_location" class="form-control" placeholder="Tarif maximum" value="{{ request('tarif_location') }}">
              </div>

              <div class="form-group">
                <input type="submit" value="Rechercher" class="btn btn-secondary py-3 px-4">
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Résultats de la recherche -->
      @if(isset($vehiculess) && $vehicules->count() > 0)
        <div class="col-md-12 mt-5">
          <h3 class="text-center mb-4">Résultats de la recherche</h3>
          <div class="row">
            @foreach($vehiculess as $vehicule)
              <div class="col-md-4 mb-4">
                <div class="car-wrap rounded ftco-animate">
                  <div class="img rounded d-flex align-items-end" style="background-image: url('{{ asset('images/'.$vehicule->image) }}');">
                  </div>
                  <div class="text">
                    <h2 class="mb-0"><a href="#">{{ $vehicule->marque }} {{ $vehicule->modele }}</a></h2>
                    <div class="d-flex mb-3">
                      <span class="cat">{{ $vehicule->marque }}</span>
                      <p class="price ml-auto">${{ $vehicule->tarif_location }} <span>/jour</span></p>
                    </div>
                    <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Réserver maintenant</a> <a href="#" class="btn btn-secondary py-2 ml-1">Détails</a></p>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      @else
        <div class="col-md-12 mt-5">
          <h3 class="text-center mb-4">Aucun véhicule trouvé</h3>
        </div>
      @endif
    </div>
  </div>
</section>





<section class="ftco-section ftco-no-pt bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 heading-section text-center ftco-animate mb-5">
        <span class="subheading">Ce que nous offrons</span>
          <h2 class="mb-2">Véhicules en vedette</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="carousel-car owl-carousel">
          @foreach($vehicules as $vehicule)
            <div class="item">
              <div class="car-wrap rounded ftco-animate">
                <div class="img rounded d-flex align-items-end" style="background-image: url('{{ asset('storage/' . $vehicule->image) }}');">
                </div>
                <div class="text">
                  <h2 class="mb-0"><a href="#"> {{ $vehicule->modele }}</a></h2>
                  <div class="d-flex mb-3">
                    <span class="cat">{{ $vehicule->marque }}</span>
                    <p class="price ml-auto">${{ $vehicule->tarif_location }} <span>/jour</span></p>
                  </div>
                  <p class="d-flex mb-0 d-block">
                    <a href="{{ route('reservation', ['vehicule' => $vehicule->id]) }}" class="btn btn-primary py-2 mr-1">Réservez</a>
                    <a href="{{ route('vehicule.details', ['id' => $vehicule->id]) }}" class="btn btn-secondary py-2 ml-1">Details</a>
                </p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>


<section class="ftco-section ftco-about">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/about.jpg);">
        </div>
        <div class="col-md-6 wrap-about ftco-animate">
          <div class="heading-section heading-section-white pl-md-5">
            <span class="subheading">À propos de nous</span>
            <h2 class="mb-4">Bienvenue chez Carbook</h2>

            <p>Une petite rivière nommée Duden coule près de chez eux et leur fournit les nécessaires regelialia. C'est un pays paradisiaque où les parties rôties des phrases volent dans votre bouche.</p>
            <p>En chemin, elle rencontra une copie. La copie avertit le Petit Texte Aveugle, que là d'où elle venait, elle aurait été réécrite mille fois et que tout ce qui restait de son origine serait le mot "et" et que le Petit Texte Aveugle devait faire demi-tour et retourner dans son propre pays sûr. Une petite rivière nommée Duden coule près de chez eux et leur fournit les nécessaires regelialia. C'est un pays paradisiaque où les parties rôties des phrases volent dans votre bouche.</p>
            <p><a href="#" class="btn btn-primary py-3 px-4">Rechercher un véhicule</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center heading-section ftco-animate">
          <span class="subheading">Services</span>
          <h2 class="mb-3">Nos Derniers Services</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="services services-2 w-100 text-center">
            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-wedding-car"></span></div>
            <div class="text w-100">
              <h3 class="heading mb-2">Cérémonie de Mariage</h3>
              <p>Une petite rivière nommée Duden coule près de chez eux et leur fournit les nécessaires regelialia.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="services services-2 w-100 text-center">
            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
            <div class="text w-100">
              <h3 class="heading mb-2">Transfert en Ville</h3>
              <p>Une petite rivière nommée Duden coule près de chez eux et leur fournit les nécessaires regelialia.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="services services-2 w-100 text-center">
            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car"></span></div>
            <div class="text w-100">
              <h3 class="heading mb-2">Transfert Aéroport</h3>
              <p>Une petite rivière nommée Duden coule près de chez eux et leur fournit les nécessaires regelialia.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="services services-2 w-100 text-center">
            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
            <div class="text w-100">
              <h3 class="heading mb-2">Tour de la Ville Complet</h3>
              <p>Une petite rivière nommée Duden coule près de chez eux et leur fournit les nécessaires regelialia.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-intro" style="background-image: url(images/bg_3.jpg);">
    <div class="overlay"></div>
    <div class="container">
      <div class="row justify-content-end">
        <div class="col-md-6 heading-section heading-section-white ftco-animate">
          <h2 class="mb-3">Vous Voulez Gagner Avec Nous ? Alors Ne Soyez Pas En Retard.</h2>
          <a href="#" class="btn btn-primary btn-lg">Devenez Chauffeur</a>
        </div>
      </div>
    </div>
  </section>


<section class="ftco-section testimony-section bg-light">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <span class="subheading">Témoignage</span>
        <h2 class="mb-3">Clients Satisfaits</h2>
      </div>
    </div>
    <div class="row ftco-animate">
      <div class="col-md-12">
        <div class="carousel-testimony owl-carousel ftco-owl">
          <div class="item">
            <div class="testimony-wrap rounded text-center py-4 pb-5">
              <div class="user-img mb-2" style="background-image: url(images/person_1.jpg)">
              </div>
              <div class="text pt-4">
                <p class="mb-4">Très loin, derrière les montagnes de mots, loin des pays de Vokalia et Consonantia, vivent les textes aveugles.</p>
                <p class="name">Roger Scott</p>
                <span class="position">Responsable Marketing</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap rounded text-center py-4 pb-5">
              <div class="user-img mb-2" style="background-image: url(images/person_2.jpg)">
              </div>
              <div class="text pt-4">
                <p class="mb-4">Très loin, derrière les montagnes de mots, loin des pays de Vokalia et Consonantia, vivent les textes aveugles.</p>
                <p class="name">Roger Scott</p>
                <span class="position">Designer Interface</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap rounded text-center py-4 pb-5">
              <div class="user-img mb-2" style="background-image: url(images/person_3.jpg)">
              </div>
              <div class="text pt-4">
                <p class="mb-4">Très loin, derrière les montagnes de mots, loin des pays de Vokalia et Consonantia, vivent les textes aveugles.</p>
                <p class="name">Roger Scott</p>
                <span class="position">Designer UI</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap rounded text-center py-4 pb-5">
              <div class="user-img mb-2" style="background-image: url(images/person_1.jpg)">
              </div>
              <div class="text pt-4">
                <p class="mb-4">Très loin, derrière les montagnes de mots, loin des pays de Vokalia et Consonantia, vivent les textes aveugles.</p>
                <p class="name">Roger Scott</p>
                <span class="position">Développeur Web</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap rounded text-center py-4 pb-5">
              <div class="user-img mb-2" style="background-image: url(images/person_1.jpg)">
              </div>
              <div class="text pt-4">
                <p class="mb-4">Très loin, derrière les montagnes de mots, loin des pays de Vokalia et Consonantia, vivent les textes aveugles.</p>
                <p class="name">Roger Scott</p>
                <span class="position">Analyste Systèmes</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 heading-section text-center ftco-animate">
          <span class="subheading">Blog</span>
          <h2>Articles Récents</h2>
        </div>
      </div>
      <div class="row d-flex">
        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry justify-content-end">
            <a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
            </a>
            <div class="text pt-4">
              <div class="meta mb-3">
                <div><a href="#">29 Oct. 2019</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
              <h3 class="heading mt-2"><a href="#">Pourquoi la génération de leads est essentielle pour la croissance des entreprises</a></h3>
              <p><a href="#" class="btn btn-primary">Lire la suite</a></p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry justify-content-end">
            <a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
            </a>
            <div class="text pt-4">
              <div class="meta mb-3">
                <div><a href="#">29 Oct. 2019</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
              <h3 class="heading mt-2"><a href="#">Pourquoi la génération de leads est essentielle pour la croissance des entreprises</a></h3>
              <p><a href="#" class="btn btn-primary">Lire la suite</a></p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry">
            <a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
            </a>
            <div class="text pt-4">
              <div class="meta mb-3">
                <div><a href="#">29 Oct. 2019</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
              <h3 class="heading mt-2"><a href="#">Pourquoi la génération de leads est essentielle pour la croissance des entreprises</a></h3>
              <p><a href="#" class="btn btn-primary">Lire la suite</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-counter ftco-section img bg-light" id="section-counter">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
          <div class="block-18">
            <div class="text text-border d-flex align-items-center">
              <strong class="number" data-number="60">0</strong>
              <span>Années <br>d'expérience</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
          <div class="block-18">
            <div class="text text-border d-flex align-items-center">
              <strong class="number" data-number="1090">0</strong>
              <span>Total <br>de voitures</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
          <div class="block-18">
            <div class="text text-border d-flex align-items-center">
              <strong class="number" data-number="2590">0</strong>
              <span>Clients <br>satisfaits</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
          <div class="block-18">
            <div class="text d-flex align-items-center">
              <strong class="number" data-number="67">0</strong>
              <span>Total <br>des agences</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection
