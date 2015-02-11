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
                    Vous n'êtes pas identifié, votre vote ne rapporteras aucun points. <a href="">S'identifier</a>
                    <br>
                    <a href="{{ URL::route('vote.process') }}">Voter</a>
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
                    <a href="{{ URL::route('vote.process') }}">Voter</a>
                    Chaque vote rapporte X points, touts les 10 votes pour gagner un cadeau aillant de plus en plus de valeur.
@endif
                </div> <!-- content -->
@stop
