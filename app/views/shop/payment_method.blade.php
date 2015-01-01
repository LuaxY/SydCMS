@extends('layouts.page1')
@include('menus.base')

@section('header')
    {{ HTML::style('css/shop.css') }}
@stop

@section('content')
                <div class="content">
                    <h1 class="content-title">
                        <span class="icon-big icon-shop"></span> Achat d'ogrines
                    </h1>

                    <div class="shop">
                        <form method="POST" action="">
                            <div class="shop-content">
                                <div class="shop-title">
                                    <span class="picto"></span> Choisissez votre mode de paiement &nbsp;<span class="icon-flag flag-{{ $country }}"></span>
                                </div>
@foreach ($starpass as $method => $data)
                                <label>
                                    <div class="shop-element">
                                        <input type="radio" name="payment" value="{{ $method }}" />
                                        <span class="shop-element-description">
                                        <span class="shop-icon"><img src="{{ URL::asset('imgs/shop/payment/' . $method . '.png') }}" /></span>
                                        <span class="shop-name">Code {{ $method }} : <span>1 code</span></span>
                                        </span>
                                    </div>
                                </label>
@endforeach
                            </div>

                            <div class="shop-content cgv">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="cgv" value="1" /> En cochant cette case, vous acceptez expressément que la fourniture du contenu numérique ({{ $points }} ogrines) commence immédiatement après l'envoi de notre mail de confirmation d'achat et renoncez donc expressément à votre droit de rétractation. Vous confirmez avoir pris connaissance des <a href="{{ URL::to('legal/cgv') }}">conditions générales de vente</a> de {{ $server_name }} et vous confirmez que <b>{{ Auth::user()->Nickname }}</b> est le propriétaire du moyen de paiement ou que vous avez reçu l'autorisation du titulaire du moyen de paiement.
                                    </label>
                                </div>
                                <button class="buy">
                                    Payer maintenant
                                    <span>(Commande avec obligation de paiement)</span>
                                </button>
                            </div>
                        </form>
                    </div> <!-- shop -->
                </div> <!-- content -->
@stop
