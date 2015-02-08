@extends('layouts.page1')
@include('menus.base')

@section('header')
    {{ HTML::style('css/news.css') }}
@stop

@section('content')
                <div class="news">
@foreach ($posts as $post)
                    <div class="post {{ $post->type }}">
                        <div class="post-image">
                            <a href="{{ URL::route('news.post', $post->id, "null") }}"><img src="{{ URL::asset($post->image) }}" alt="{{ $post->title }}" /></a>
                        </div>
                        <div class="post-info">
                            <div class="post-title"><a href="{{ URL::route('news.post', $post->id, "null") }}">{{ $post->title }}</a></div>
                            <div class="post-date"><a href="">@lang('categories.' . $post->type)</a> - {{ date('d F Y', strtotime($post->date)) }}</div>
                        </div>
                        <div class="post-content">{{ $post->preview }}</div>
                        <div class="post-ellipsis"></div>
                        <div class="post-details"></div>
                    </div>
@endforeach
                </div> <!-- content -->
@stop
