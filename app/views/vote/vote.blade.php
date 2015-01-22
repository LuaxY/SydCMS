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

                    <a href="{{ URL::route('vote.process') }}">Voter</a>
                </div> <!-- content -->
@stop
