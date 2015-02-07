@extends('layouts.page1')
@include('menus.base')

@section('header')
    {{ HTML::style('css/news.css') }}
@stop

@section('content')
                <div class="content">
                    <h1 class="content-title">
                        <span class="icon-big icon-news"></span> {{ $post->title }}
                        <span class="subtitle"><span>{{ Lang::get('categories.' . $post->type) }}</span> - {{ date('d F Y', strtotime($post->date)) }}</span>
                    </h1>

                    <article>
                        {{ $post->preview }}
                        <img class="big-image" src="{{ URL::asset($post->image) }}" alt="{{ $post->title }}" width="100%" />
                        {{ $post->content }}
                    </article>
                </div> <!-- content -->
@stop
