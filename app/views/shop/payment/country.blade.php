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
                            <div class="title">
                                <span class="picto"></span> Choisissez votre pays
                            </div>
                            <div class="shop-country">
@foreach ($starpass as $country => $data)
                                <a href="{{ URL::route('shop.payment.method', $country) }}" title="{{ $country }}"><span class="icon-flag flag-{{ $country }}"></span></a>
@endforeach
                            </div>
                        </div>
                    </div> <!-- shop -->
                </div> <!-- content -->
@stop
