@section('menu')
                <div class="panel blue">
                    <div class="panel-title">
                        <span class="icon-med sprite sprite-chacha"></span>Connexion
                    </div>
                    <div class="panel-content login">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="username">Nom de compte</label>
                                <input id="username" type="text" autocorrect="off" autocapitalize="off" placeholder="Nom de compte" name="useranme" />
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input id="password" type="password" placeholder="Mot de passe" name="password" />
                            </div>
                            <div class="block-submit">
                                <input id="login" class="btn-medium" type="submit" value="Connexion" />
                            </div>
                        </form>
                    </div>
                </div>

                <div class="panel blue">
                    <div class="panel-title">
                        <span class="icon-med sprite sprite-chacha"></span>Mon compte
                    </div>
                    <div class="panel-content account">
                        <div class="account-avatar"><img src="{{ URL::asset('imgs/avatar/94.png') }}" /></div>
                        <div class="account-details">
                            <div class="account-name">Luax</div>
                            <div class="account-info">
                                <a href="">Modifier mon compte</a>
                                <div style="margin-top: 10px;">
                                    Ogrines: 0 <span class="icon-small money money-ogrines"></span><br />
                                    <a href=""><i>Acheter des ogrines</i></a>
                                </div>
                            </div>
                        </div>
                        <div class="logout">
                            <a href="">Déconnexion<a>
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-title">
                        <span class="icon-med sprite sprite-champion"></span>Événements
                    </div>
                    <div class="panel-content">
                        <div class="level-1">
                            <a href="#" class="title">Tournois</a>
                        </div>
                        <ul class="level-2">
                            <li><img src="{{ URL::asset('imgs/icons/tournois.png') }}"> Combats</li>
                            <li><img src="{{ URL::asset('imgs/icons/champions.png') }}"> Champions</li>
                            <li><img src="{{ URL::asset('imgs/icons/kamas.png') }}"> Résultas</li>
                        </ul>
                        <div class="level-1">
                            <a href="#" class="title">Divers</a>
                        </div>
                        <ul class="level-2">
                            <li><img src="{{ URL::asset('imgs/icons/alliance.png') }}"> Alliances versus Alliances</li>
                            <li><img src="{{ URL::asset('imgs/icons/fee.png') }}"> Nowel</li>
                        </ul>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-title">
                        <span class="icon-med sprite sprite-shop"></span>Boutique
                    </div>
                    <div class="panel-content">
                        <div class="level-1">
                            <a href="#" class="title">Objets</a>
                        </div>
                        <ul class="level-2">
                            <li>Object 1</li>
                            <li>Object 2</li>
                        </ul>
                        <div class="level-1">
                            <a href="#" class="title">Booster</a>
                        </div>
                        <ul class="level-2">
                            <li>Starter Pack</li>
                            <li>Pro Pack</li>
                        </ul>
                    </div>
                </div>
@stop
