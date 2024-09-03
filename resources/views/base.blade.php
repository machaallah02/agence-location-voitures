<!DOCTYPE html>
 <html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>MyCar</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">

    <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/swiper-bundle.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/fancybox.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/nouislider.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/uikit.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/ion.rangeSlider.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    {{-- lien bootstrap cdn--}}
    {{--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> --}}



        <!-- SWITCHER-->
      <link href="{{asset('assets/js/switcher/css/switcher.css')}}" rel="stylesheet" id="switcher-css" />
     <link href="{{asset('assets/js/switcher/css/color1.css')}}" rel="alternate stylesheet" title="color1" />
     <link href="{{asset('assets/js/switcher/css/color2.css')}}" rel="alternate stylesheet" title="color2" />
      <link href="{{asset('assets/js/switcher/css/color3.css')}}" rel="alternate stylesheet" title="color3" />
    <link href="{{asset('assets/js/switcher/css/color4.css')}}" rel="alternate stylesheet" title="color4" />
    <style>
        .section__all_vehicles {
    padding: 40px 0;
}

.section__title {
    text-align: center;
    margin-bottom: 40px;
}

.section__title h1 {
    font-size: 2.5rem;
    margin-bottom: 10px;
}

.section__title p {
    font-size: 1.2rem;
    color: #666;
}

.vehicles-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.vehicle-card {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease;
}

.vehicle-card:hover {
    transform: translateY(-5px);
}

.vehicle-card__preview img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.vehicle-card__info {
    padding: 15px;
}

.vehicle-card__title {
    font-size: 1.5rem;
    margin-bottom: 10px;
}

.vehicle-card__details {
    font-size: 1rem;
    color: #333;
    margin-bottom: 10px;
}

.vehicle-card__description {
    font-size: 0.9rem;
    color: #666;
}

.vehicle-card__price {
    font-size: 1.2rem;
    font-weight: bold;
    color: #007bff;
}


    </style>
</head>

<body>
    @include('home.navbar')
      <div class="wrapper">
        @yield('content')
    @include('home.footer')
</body>

</html>
