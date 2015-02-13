@extends('layouts.page1')
@include('menus.base')

@section('header')
    {{ HTML::style('css/vote.css') }}
@stop

@section('content')
                <div class="content">
                    <h1 class="content-title">
                        <span class="icon-big icon-gift"></span> Votez pour le serveur
                    </h1>
@if (Auth::guest())
                    <div id="vote-process">
                        <div class="left">
                            <a class="vote-link" href="{{ URL::route('vote.process') }}">Voter</a>
                        </div>
                        <div class="right">
                            Vous n'êtes pas identifié, votre vote ne rapporteras aucun points. <a href="{{ URL::route('login') }}">S'identifier</a>
                        </div>
                    </div>
@else
                    <div id="vote-stats">
                        <div class="left">
                            Vous avez déjà voté <span class="nb-vote">0</span> fois !
                        </div>
                        <div class="right">
                            <div class="vote-gift-win">
                                <div class="vote-icon">
                                    <img src="{{ URL::asset('imgs/icons/gift.jpg') }}" />
                                </div>
                                <span>Cadeaux gagnés</span>
                                0
                            </div>
                            <div class="vote-separator"></div>
                            <div class="vote-next-gift">
                                <div class="vote-icon">
                                    <img src="{{ URL::asset('imgs/icons/gift.jpg') }}" />
                                </div>
                                <span>Prochain cadeau</span>
                                dans 0 votes
                            </div>
                        </div>
                    </div>
                    <div id="vote-process">
                        <div class="left">
                            <a class="vote-link" href="{{ URL::route('vote.process') }}">Voter</a>
                        </div>
                        <div class="right">
                            Chaque vote permet d'obtenir {{ Config::get('dofus.vote') }} points.<br>Touts les 10 votes vous gagnez un nouveau cadeau.
                        </div>
                    </div>
                    <div id="vote-gifts">
                        <div class="left">
                            <a href="" class="selected">1<sup>er</sup> Palier</a>
                            <a href="">2<sup>ème</sup> Palier</a>
                            <a href="">3<sup>ème</sup> Palier</a>
                            <a href="">4<sup>ème</sup> Palier</a>
                            <a href="">5<sup>ème</sup> Palier</a>
                        </div>
                        <div class="right">
                            <div class="vote-palier-name">Palier : 1</div>
                            <div class="vote-progress">
                                <div class="progress-bar" style="width: 20%"></div>
                            </div>
                            <div class="vote-time-line">
                                <div class="vote-reward vote-block-1">
                                    <span class="arrow"></span>
                                    <a href="" class="selected">
                                        <span class="vote-reward-text">
                                            <span>10</span>
                                            votes
                                        </span>
                                        <span class="vote-reward-icon"></span>
                                    </a>
                                </div>
                                <div class="vote-reward vote-block-2">
                                    <span class="arrow"></span>
                                    <a href="">
                                        <span class="vote-reward-text">
                                            <span>20</span>
                                            votes
                                        </span>
                                        <span class="vote-reward-icon"></span>
                                    </a>
                                </div>
                                <div class="vote-reward vote-block-3">
                                    <span class="arrow"></span>
                                    <a href="">
                                        <span class="vote-reward-text">
                                            <span>30</span>
                                            votes
                                        </span>
                                        <span class="vote-reward-icon"></span>
                                    </a>
                                </div>
                                <div class="vote-reward vote-block-4">
                                    <span class="arrow"></span>
                                    <a href="">
                                        <span class="vote-reward-text">
                                            <span>40</span>
                                            votes
                                        </span>
                                        <span class="vote-reward-icon"></span>
                                    </a>
                                </div>
                                <div class="vote-reward vote-block-5">
                                    <span class="arrow"></span>
                                    <a href="">
                                        <span class="vote-reward-text">
                                            <span>50</span>
                                            votes
                                        </span>
                                        <span class="vote-reward-icon big"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="vote-gift-details vote-block-1">
                                <div class="vote-gift-title-block">
                                    <span class="vote-reward-text">
                                        <span>10</span>
                                        votes
                                    </span>
                                    <div class="vote-gift-title">
                                        <span class="vote-gift-title-next">Cadeau à obtenir :</span>
                                        <span class="vote-gift-title-object">Object</span>
                                    </div>
                                </di>
                            </div>
                        </div>
                    </div>
@endif
                </div> <!-- content -->
@stop
