<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sydoria - Tournois PvP</title>
    <link rel="icon" type="image/png" href="imgs/favicon.png" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald" type="text/css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto" type="text/css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/shop.css">
</head>
<body>
    <div id="header">
        <div class="container">
            <div id="logo"></div>
            <div id="menu">
                <ul>
                    <li>Sydoria</li>
                    <li>Rejoindre</li>
                    <li>Serveur</li>
                    <li>Tournois</li>
                    <li>Forum</li>
                    <li>Support</li>
                </ul>
            </div>
        </div>
    </div>

    <div id="carroussel">
        <video class="video" poster="imgs/carroussel/nowel2/nowel.png" loop="loop" autoplay="">
            <source src="imgs/carroussel/nowel2/nowel.mp4" type="video/mp4"></source>
            <source src="imgs/carroussel/nowel2/nowel.webm" type="video/webm"></source>
            <source src="imgs/carroussel/nowel2/nowel.ogv" type="video/ogv"></source>
        </video>
    </div>
    
    <div class="container">
        <div id="play">
            <a href="#">Jouer !</a>
        </div>

        <div id="main">
            <div class="left">
                @yield('menu')
            </div> <!-- left -->

            <div class="right">
                @yield('content')
            </div> <!-- right -->
        </div> <!-- main-->
    </div> <!-- container -->

    <div id="footer">
        <div class="container">
            <div class="logo"></div>
            <div class="menu">
                <ul>
                    <li>Sydoria</li>
                    <li>Actualités</li>
                    <li>Télécharger</li>
                    <li>Créer un compte</li>
                    <li>Mot de passe oublié ?</li>
                </ul>
                <ul>
                    <li>Server</li>
                    <li>Infos serveur</li>
                    <li>Évenemtns</li>
                    <li>Calssement</li>
                    <li>Cadeaux</li>
                </ul>
                <ul>
                    <li>Tournois</li>
                    <li>Combats</li>
                    <li>Champion</li>
                    <li>Résultats</li>
                    <li>Récompenses</li>
                </ul>
                <ul>
                    <li>Support</li>
                    <li>Forum</li>
                    <li>Contact</li>
                    <li>FAQ</li>
                </ul>
            </div>
        </div>
        <div class="container copyright">
            <a href="">Sydoria</a> &copy; 2015. Tous droits réservés. <a href="">Conditions d'utilisation</a> - <a href="">Conditions Générales de Vente</a>
        </div>
        <div class="pegi"><img src="imgs/picto_prevention.png" /></div>
    </div>
</body>
</html>
