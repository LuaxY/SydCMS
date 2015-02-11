<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $server_name }} - Serveur 2.27</title>
    <link rel="icon" type="image/png" href="{{ URL::asset('imgs/favicon.png') }}" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald" type="text/css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto" type="text/css">
    {{ HTML::style('css/style.css') }}
    {{ HTML::style('css/icons.css') }}
    @if ($theme){{ HTML::style('imgs/carousel/'.$theme.'/style.css') }}@endif
@yield('header')
</head>
<body>
    <div id="header">
        <div class="container">
            <div id="menu">
                <ul>
                    <li><a href="{{ URL::route('home') }}">{{ $server_name }}</a></li>
                    <li><a href="{{ URL::route('register') }}">Rejoindre</a></li>
                    <li><a href="{{ URL::to('server') }}">Serveur</a></li>
                    <li><a href="{{ URL::to('events') }}">Tournois</a></li>
                    <li><a href="http://forum.erezia.net/">Forum</a></li>
                    <li><a href="{{ URL::to('support') }}">Support</a></li>
                </ul>
            </div>
            <a href="{{ URL::route('home') }}"><div id="logo"></div></a>
        </div>
    </div>

@if (empty($no_carousel))
    <div id="carousel">
@if ($theme)
        <video class="video" poster="{{ URL::asset('imgs/carousel/'.$theme.'/preview.png') }}" loop="loop" autoplay="">
            <source src="{{ URL::asset('imgs/carousel/'.$theme.'/video.mp4') }}" type="video/mp4">
            <source src="{{ URL::asset('imgs/carousel/'.$theme.'/video.webm') }}" type="video/webm">
            <source src="{{ URL::asset('imgs/carousel/'.$theme.'/video.ogv') }}" type="video/ogv">
        </video>
@endif
    </div>
@endif

@yield('page')

    <div id="footer">
        <div class="container">
            <div class="logo"></div>
            <div class="menu">
                <ul>
                    <li>{{ $server_name }}</li>
                    <li><a href="{{ URL::route('news') }}">Actualités</a></li>
                    <li><a href="{{ URL::route('register') }}">Télécharger</a></li>
                    <li><a href="{{ URL::route('register') }}">Créer un compte</a></li>
                    <li><a href="{{ URL::to('password-lost') }}">Mot de passe oublié ?</a></li>
                </ul>
                <ul>
                    <li>Serveur</li>
                    <li><a href="{{ URL::to('server/list') }}">Infos serveurs</a></li>
                    <li><a href="{{ URL::to('events') }}">Évenemtns</a></li>
                    <li><a href="{{ URL::to('ladder') }}">Calssement</a></li>
                    <li><a href="{{ URL::to('gifts') }}">Cadeaux</a></li>
                </ul>
                <ul>
                    <li>Tournois</li>
                    <li><a href="{{ URL::to('pvp/fights') }}">Combats</a></li>
                    <li><a href="{{ URL::to('pvp/champions') }}">Champion</a></li>
                    <li><a href="{{ URL::to('pvp/result') }}">Résultats</a></li>
                    <li><a href="{{ URL::to('pvp/reward') }}">Récompenses</a></li>
                </ul>
                <ul>
                    <li>Support</li>
                    <li><a href="{{ URL::to('support/help') }}">Aide</a></li>
                    <li><a href="http://forum.erezia.net/">Forum</a></li>
                    <li><a href="mailto:contactn@erezia.net">Contact</a></li>
                    <li><a href="{{ URL::to('support/faq') }}">FAQ</a></li>
                </ul>
            </div>
        </div>
        <div class="container copyright">
            <a href="">{{ $server_name }}</a> &copy; {{ date('Y') }}. Tous droits réservés. <a href="{{ URL::to('legal/cu') }}">Conditions d'utilisation</a> - <a href="{{ URL::to('legal/cgv') }}">Conditions Générales de Vente</a>
        </div>
        <div class="pegi"><img src="{{ URL::asset('imgs/picto_prevention.png') }}" /></div>
    </div>
    @yield('footer')
</body>
</html>
