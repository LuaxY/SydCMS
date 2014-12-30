@extends('layouts.master')

@section('header')
    {{ HTML::style('css/register.css') }}
    {{ HTML::script('https://www.google.com/recaptcha/api.js') }}
@stop

<?php $no_carousel = true; ?>

@section('page')
    <div class="container">
        <div class="register">
            <div class="row">
                <div class="step-1">
                    <div id="main">
                        <div class="block-header">
                            <div class="title">
                                <span>1</span>
                                Créez votre compte
                            </div>
                            <div class="text">
                                Pour figurer en bonne place dans le grand registre des héros,<br />
                                c'est très simple. Prenez votre plus belle plume et remplissez les cases ci-dessous.
                            </div>
                        </div>
                        <div class="block-body">
                            <form method="POST" action="">
                                <div class="form-group">
                                    <label for="username">Nom de compte*</label>
                                    <input id="username" type="text" autocorrect="off" autocapitalize="off" placeholder="Nom de compte" name="useranme" />
                                </div>
                                <div class="form-group">
                                    <label for="password">Mot de passe*</label>
                                    <input id="password" type="password" placeholder="Mot de passe" name="password" />
                                    <div id="passwordpower"></div>
                                </div>
                                <div class="form-group">
                                    <label for="password_confirm">Confirmation*</label>
                                    <input id="password_confirm" type="password" placeholder="Confirmation" name="password_confirm" />
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail*</label>
                                    <input id="email" type="email" placeholder="E-mail" name="email" />
                                </div>
                                <div class="form-group captcha">
                                    <label for="captcha">Code de sécurité*</label>
                                    <div class="g-recaptcha" data-sitekey="6Ld70v0SAAAAAKCdWTSc9PJrDxzoY6bHQG0EYlXI"></div>
                                </div>
                                <div class="form-group">
                                    <label class="checkbox">
                                        <input type="checkbox" name="cg" value="1" />
                                        J'ai lu et j'accepte les <a href="">conditions générales</a> du site.
                                    </label>
                                </div>
                                <div class="block-submit">
                                    <input class="btn-big" type="submit" value="Terminer l'inscription" />
                                </div>
                            </form>
                        </div> <!-- block-body -->
                    </div> <!-- main -->
                </div> <!-- step-1 -->

                <div class="step-2">
                    <div id="main">
                        <div class="block-header">
                            <div class="title">
                                <span>2</span>
                                Téléchargez Sydoria
                            </div>
                            <div class="text">
                                Tofus, wabbits, bouftous, héros, donjons, quêtes et dragons :<br />
                                téléchargez l'intégrale du Monde des Douze !
                            </div>
                        </div>
                        <div class="block-body">
                            <a href="" class="btn-big download">Télécharger le  jeu</a>
                        </div>
                    </div> <!-- main -->
                </div> <!-- step-2 -->
            </div> <!-- row -->

            <div class="step-3">
                <div id="main">
                    <div class="block-header">
                        <div class="title">
                            <span>3</span>
                            En route !
                        </div>
                        <div class="illu"></div>
                        <div class="text">
                            <p>Votre quête peut maintenant<br />
                            commencer. Faites preuve de<br />
                            bravoure, d’intelligence<br />
                            et d’héroïsme.</p>
                            <br />
                            <p>Préparez-vous à vivre une<br />
                            aventure hors du commun,<br />
                            le peuple n’attend que vous !</p>
                        </div>
                    </div>
                    <div class="block-body">
                        <div style="text-align:center;margin-top:50px;">
                            <img src="{{ URL::asset('imgs/wip.png') }}" /><br />
                            Prochainement...
                        </div>
                    </div>
                </div> <!-- main -->
            </div> <!-- step-3 -->
        </div> <!-- register -->
    </div> <!-- container -->
@stop
