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
                            Vous avez déjà voté <span class="nb-vote">{{ $votesCount }}</span> fois !
                        </div>
                        <div class="right">
                            <div class="vote-gift-win">
                                <div class="vote-icon">
                                    <img src="{{ URL::asset('imgs/icons/gift.jpg') }}" />
                                </div>
                                <span>Cadeaux gagnés</span>
                                {{ $giftsCount }}
                            </div>
                            <div class="vote-separator"></div>
                            <div class="vote-next-gift">
                                <div class="vote-icon">
                                    <img src="{{ URL::asset('imgs/icons/gift.jpg') }}" />
                                </div>
                                <span>Prochain cadeau</span>
                                dans {{ $nextGifts }} votes
                            </div>
                        </div>
                    </div>
                    <div id="vote-process">
                        <div class="left">
                            <a class="vote-link" href="{{ URL::route('vote.process') }}">Voter</a>
                        </div>
                        <div class="right">
                            Chaque vote permet d'obtenir {{ Config::get('dofus.vote') }} ogrines.<br>Touts les 10 votes vous gagnez un nouveau cadeau.
                        </div>
                    </div>
                    <div id="vote-gifts">
                        <div class="left">
                            <div data="1">1<sup>er</sup> Palier</div>
                            <div data="2">2<sup>ème</sup> Palier</div>
                            <div data="3">3<sup>ème</sup> Palier</div>
                            <div data="4">4<sup>ème</sup> Palier</div>
                            <div data="5">5<sup>ème</sup> Palier</div>
                        </div>
                        <div class="right">
@include('vote.palier')
                        </div>
                        <div class="loadmask"></div>
                        <div class="loading">
                            <img src="{{ URL::asset('imgs/loader.gif') }}" />
                        </div>
                    </div>
@endif
                </div> <!-- content -->

                <script>
                    $("#vote-gifts .left div[data={{ $palierId }}]").addClass("selected");
                    progress();

                    $("#vote-gifts .left div").on("click", function() {
                        var self = $(this);
                        var palierId = self.attr("data");

                        $("#vote-gifts").addClass("mask-relative masked");
                        $("#vote-gifts .left .selected").removeClass("selected");
                        $(".loadmask").show();
                        $(".loading").show();

                        $.ajax({
                            type: "GET",
                            url: "{{ URL::route('vote.palier') }}/" + palierId,
                        })
                        .done(function(res) {
                            $("#vote-gifts .right").html(res);

                            $(".loadmask").hide();
                            $(".loading").hide();
                            self.addClass("selected");
                            $("#vote-gifts").removeClass("mask-relative masked");

                            progress();
                        });
                    });

                    function progress()
                    {
                        var percent = $(".progress-bar").attr("data");
                        $(".progress-bar").animate({width: percent +'%'}, 0, "linear");
                    }
                </script>
@stop
