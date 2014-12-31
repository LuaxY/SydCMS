<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sydoria - Tournois PvP</title>
    <link rel="icon" type="image/png" href="{{ URL::asset('imgs/favicon.png') }}" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald" type="text/css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto" type="text/css">
    {{ HTML::style('css/style.css') }}
    {{ HTML::style('css/icons.css') }}
@yield('header')
</head>
<body>
    <div id="header">
        <div class="container">
            <div id="logo"></div>
            <div id="menu">
                <ul>
                    <li><a href="{{ URL::to('/') }}">Sydoria</a></li>
                    <li><a href="{{ URL::to('register') }}">Rejoindre</a></li>
                    <li><a href="{{ URL::to('/') }}">Serveur</a></li>
                    <li><a href="{{ URL::to('/') }}">Tournois</a></li>
                    <li><a href="http://forum.sydoria.fr/">Forum</a></li>
                    <li><a href="{{ URL::to('/') }}">Support</a></li>
                </ul>
            </div>
        </div>
    </div>

@if (empty($no_carousel))
    <div id="carousel">
        <video class="video" poster="{{ URL::asset('imgs/carousel/nowel2/nowel.png') }}" loop="loop" autoplay="">
            <source src="{{ URL::asset('imgs/carousel/nowel2/nowel.mp4') }}" type="video/mp4"></source>
            <source src="{{ URL::asset('imgs/carousel/nowel2/nowel.webm') }}" type="video/webm"></source>
            <source src="{{ URL::asset('imgs/carousel/nowel2/nowel.ogv') }}" type="video/ogv"></source>
        </video>
    </div>
@endif

@yield('page')

    <div id="footer">
        <div class="container">
            <div class="logo"></div>
            <div class="menu">
                <ul>
                    <li>Sydoria</li>
                    <li><a href="{{ URL::to('/') }}">Actualités</a></li>
                    <li><a href="{{ URL::to('register') }}">Télécharger</a></li>
                    <li><a href="{{ URL::to('register') }}">Créer un compte</a></li>
                    <li><a href="{{ URL::to('/') }}">Mot de passe oublié ?</a></li>
                </ul>
                <ul>
                    <li>Server</li>
                    <li><a href="{{ URL::to('/') }}">Infos serveur</a></li>
                    <li><a href="{{ URL::to('/') }}">Évenemtns</a></li>
                    <li><a href="{{ URL::to('/') }}">Calssement</a></li>
                    <li><a href="{{ URL::to('/') }}">Cadeaux</a></li>
                </ul>
                <ul>
                    <li>Tournois</li>
                    <li><a href="{{ URL::to('/') }}">Combats</a></li>
                    <li><a href="{{ URL::to('/') }}">Champion</a></li>
                    <li><a href="{{ URL::to('/') }}">Résultats</a></li>
                    <li><a href="{{ URL::to('/') }}">Récompenses</a></li>
                </ul>
                <ul>
                    <li>Support</li>
                    <li><a href="{{ URL::to('/') }}">Aide</a></li>
                    <li><a href="http://forum.sydoria.fr/">Forum</a></li>
                    <li><a href="mailto:elon@sydoria.fr">Contact</a></li>
                    <li><a href="{{ URL::to('/') }}">FAQ</a></li>
                </ul>
            </div>
        </div>
        <div class="container copyright">
            <a href="">Sydoria</a> &copy; 2015. Tous droits réservés. <a href="">Conditions d'utilisation</a> - <a href="">Conditions Générales de Vente</a>
        </div>
        <div class="pegi"><img src="{{ URL::asset('imgs/picto_prevention.png') }}" /></div>
    </div>
    @yield('footer')
</body>
</html>
