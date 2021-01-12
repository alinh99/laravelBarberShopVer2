<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Barber</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aguafina+Script" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Akronim" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aldrich" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alfa+Slab+One" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allan" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allura" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Almendra" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100i,300,300i,400,700,900" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,600,800" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" />
    <link rel="stylesheet" href="/assets/fonts/fontawesome5-overrides.min.css?h=18313f04cea0e078412a028c5361bd4e" />
    <link rel="stylesheet" href="/assets/css/styles.min.css?h=cb7eecf014fe373724af5d4ccf8daa65" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/assets/owl.carousel.css" />
    <link rel="stylesheet" href="https://daneden.github.io/animate.css/animate.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

</head>

<body>
    @include('header')
    @include('page\modal-booking')
    <div class="rev-slider">
        @yield('content')
    </div>

    @include('footer')
    @include('script')
</body>

</html>

</html>
