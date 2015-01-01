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
                        <div class="shop-content">
                            <div class="shop-title">
                                <span class="picto"></span> Paiement par {{ $method }} &nbsp;<span class="icon-flag flag-{{ $country }}"></span>
                            </div>
                            {{ var_dump($starpass) }}
                        </div>
                    </div> <!-- shop -->
                </div> <!-- content -->
@stop
