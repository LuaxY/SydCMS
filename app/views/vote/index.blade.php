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
                        <div class="loading"></div>
                    </div>
@endif
                </div> <!-- content -->

                <script>
                    $("#vote-gifts .left div[data={{ $palierId }}]").addClass("selected");
                    progress();
                    showItem({{ $steps[$current]->itemId }}, {{ $current }}, {{ $steps[$current]->votes }});

                    $("#vote-gifts .left div").on("click", function() {
                        var self = $(this);
                        var palierId = self.attr("data");

                        $("#vote-gifts").addClass("mask-relative masked");
                        $("#vote-gifts .left .selected").removeClass("selected");
                        $("#vote-gifts > .loadmask").show();
                        $("#vote-gifts > .loading").show();

                        $.ajax({
                            type: "GET",
                            url: "{{ URL::route('vote.palier') }}/" + palierId,
                        })
                        .done(function(res) {
                            $("#vote-gifts .right").html(res);

                            $("#vote-gifts > .loadmask").hide();
                            $("#vote-gifts > .loading").hide();
                            self.addClass("selected");
                            $("#vote-gifts").removeClass("mask-relative masked");

                            progress();

                            var item = $("#load-item");
                            showItem(item.attr("item"), item.attr("step"), item.attr("votes"))
                        });
                    });

                    $("#vote-gifts .right").on("click", ".vote-reward-step", function() {
                        var parent = $(this).parent(".vote-reward");
                        var item = parent.attr("item");
                        var step = parent.attr("step");
                        var votes = parent.attr("votes");

                        $(".vote-reward-step.selected").removeClass("selected");
                        $(this).addClass("selected");

                        showItem(item, step, votes);
                    });

                    function progress() {
                        var percent = $(".progress-bar").attr("data");
                        $(".progress-bar").animate({width: percent +'%'}, 0, "linear");
                    }

                    function showItem(item, step, votes) {
                        $(".vote-gift-details").removeClass("vote-block-1 vote-block-2 vote-block-3 vote-block-4 vote-block-5");
                        $(".vote-item").addClass("mask-relative masked");
                        $(".vote-item > .loadmask").show();
                        $(".vote-item > .loading").show();

                        $.ajax({
                            type: "GET",
                            url: "http://localhost/test.json?item="+item,
                            dataType: "json",
                        })
                        .done(function(res) {
                            $(".vote-item .vote-gift-title-object").html(res.name);
                            $(".vote-item .vote-gift-description p").html(res.description);
                            $(".vote-item .object-illu img").attr("src", res.image);
                            $(".vote-item .vote-reward-text span").html(votes);
                            $(".vote-item .vote-gift-details").addClass("vote-block-" + step);

                            $(".vote-item").removeClass("mask-relative masked");
                            $(".vote-item > .loadmask").hide();
                            $(".vote-item > .loading").hide();
                        });
                    }
                </script>
@stop
