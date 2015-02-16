@extends('layouts.page1')
@include('menus.base')

@section('header')
    {{ HTML::style('css/news.css') }}
@stop

@section('content')
                <div class="content">
                    <h1 class="content-title">
                        <span class="icon-big icon-news"></span> {{ $post->title }}
                        <span class="subtitle"><span>@lang('categories.' . $post->type)</span> - {{ date('d F Y', strtotime($post->date)) }}</span>
                    </h1>

                    <article>
                        {{ $post->preview }}
                        <img class="big-image" src="{{ URL::asset($post->image) }}" alt="{{ $post->title }}" width="100%" />
                        {{ $post->content }}
                    </article>
                </div> <!-- content -->

                <div class="content comments">
                    <div class="title title-arrow">Commentaires (3)</div>
                    <div class="comments-list">

                        <div class="comment">
                            <div class="comment-avatar">
                                <div class="author-image"><img src="{{ URL::asset('imgs/avatar/default.jpg') }}" /></div>
                                <div class="author-tag">Joueur</div>
                            </div>
                            <div class="comment-content">
                                <div class="author-name">
                                    <strong>Luax</strong>
                                    <small>16 Février 2015 16:03</small>
                                </div>
                                <div class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In iaculis elementum elit, a condimentum dui convallis et. Sed aliquam aliquet libero, non iaculis ante venenatis dignissim. Curabitur eu felis ac eros auctor auctor quis ut est. Mauris et vehicula velit, eget tincidunt nulla. Pellentesque commodo dolor id mollis dictum. Donec ultrices eleifend dignissim. Fusce finibus, diam vitae molestie posuere, tellus nisi viverra quam, a cursus ligula lorem eu tellus. Duis a magna nisi. Donec ac arcu id metus mollis ultrices. Mauris sodales eleifend enim, at consequat felis. Integer rutrum dapibus nibh, eu bibendum justo ultricies quis. Nam cursus ultricies sapien sed laoreet. Nam nisl elit, aliquet nec sapien at, mattis pharetra sapien.</div>
                            </div>
                        </div>

                        <div class="comment dev">
                            <div class="comment-avatar">
                                <div class="author-image"><img src="{{ URL::asset('imgs/avatar/Kerubim.png') }}" /></div>
                                <div class="author-tag">Dev</div>
                            </div>
                            <div class="comment-content">
                                <div class="author-name">
                                    <strong>Luax</strong>
                                    <small>16 Février 2015 16:03</small>
                                </div>
                                <div class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In iaculis elementum elit, a condimentum dui convallis et. Sed aliquam aliquet libero, non iaculis ante venenatis dignissim. Curabitur eu felis ac eros auctor auctor quis ut est. Mauris et vehicula velit, eget tincidunt nulla. Pellentesque commodo dolor id mollis dictum. Donec ultrices eleifend dignissim. Fusce finibus, diam vitae molestie posuere, tellus nisi viverra quam, a cursus ligula lorem eu tellus.</div>
                            </div>
                        </div>

                        <div class="comment">
                            <div class="comment-avatar">
                                <div class="author-image"><img src="{{ URL::asset('imgs/avatar/default.jpg') }}" /></div>
                                <div class="author-tag">Joueur</div>
                            </div>
                            <div class="comment-content">
                                <div class="author-name">
                                    <strong>Luax</strong>
                                    <small>16 Février 2015 16:03</small>
                                </div>
                                <div class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In iaculis elementum elit, a condimentum dui convallis et. Sed aliquam aliquet libero, non iaculis ante venenatis dignissim. Curabitur eu felis ac eros auctor auctor quis ut est. Mauris et vehicula velit, eget tincidunt nulla. Pellentesque commodo dolor id mollis dictum. Donec ultrices eleifend dignissim. Fusce finibus, diam vitae molestie posuere, tellus nisi viverra quam, a cursus ligula lorem eu tellus. Duis a magna nisi. Donec ac arcu id metus mollis ultrices. Mauris sodales eleifend enim, at consequat felis. Integer rutrum dapibus nibh, eu bibendum justo ultricies quis. Nam cursus ultricies sapien sed laoreet. Nam nisl elit, aliquet nec sapien at, mattis pharetra sapien.</div>
                            </div>
                        </div>

                        <div class="comment admin">
                            <div class="comment-avatar">
                                <div class="author-image"><img src="{{ URL::asset('imgs/avatar/Kerubim.png') }}" /></div>
                                <div class="author-tag">Admin</div>
                            </div>
                            <div class="comment-content">
                                <div class="author-name">
                                    <strong>Luax</strong>
                                    <small>16 Février 2015 16:03</small>
                                </div>
                                <div class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In iaculis elementum elit, a condimentum dui convallis et. Sed aliquam aliquet libero, non iaculis ante venenatis dignissim. Curabitur eu felis ac eros auctor auctor quis ut est. Mauris et vehicula velit, eget tincidunt nulla. Pellentesque commodo dolor id mollis dictum. Donec ultrices eleifend dignissim. Fusce finibus, diam vitae molestie posuere, tellus nisi viverra quam, a cursus ligula lorem eu tellus. Duis a magna nisi. Donec ac arcu id metus mollis ultrices. Mauris sodales eleifend enim, at consequat felis. Integer rutrum dapibus nibh, eu bibendum justo ultricies quis. Nam cursus ultricies sapien sed laoreet. Nam nisl elit, aliquet nec sapien at, mattis pharetra sapien.</div>
                            </div>
                        </div>

                        <div class="comment">
                            <div class="comment-avatar">
                                <div class="author-image"><img src="{{ URL::asset('imgs/avatar/default.jpg') }}" /></div>
                                <div class="author-tag">Joueur</div>
                            </div>
                            <div class="comment-content">
                                <div class="author-name">
                                    <strong>Luax</strong>
                                    <small>16 Février 2015 16:03</small>
                                </div>
                                <div class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In iaculis elementum elit, a condimentum dui convallis et. Sed aliquam aliquet libero, non iaculis ante venenatis dignissim. Curabitur eu felis ac eros auctor auctor quis ut est. Mauris et vehicula velit, eget tincidunt nulla. Pellentesque commodo dolor id mollis dictum. Donec ultrices eleifend dignissim. Fusce finibus, diam vitae molestie posuere, tellus nisi viverra quam, a cursus ligula lorem eu tellus. Duis a magna nisi. Donec ac arcu id metus mollis ultrices. Mauris sodales eleifend enim, at consequat felis. Integer rutrum dapibus nibh, eu bibendum justo ultricies quis. Nam cursus ultricies sapien sed laoreet. Nam nisl elit, aliquet nec sapien at, mattis pharetra sapien.</div>
                            </div>
                        </div>

                        <div class="comment staff">
                            <div class="comment-avatar">
                                <div class="author-image"><img src="{{ URL::asset('imgs/avatar/Kerubim.png') }}" /></div>
                                <div class="author-tag">Staff</div>
                            </div>
                            <div class="comment-content">
                                <div class="author-name">
                                    <strong>Luax</strong>
                                    <small>16 Février 2015 16:03</small>
                                </div>
                                <div class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In iaculis elementum elit, a condimentum dui convallis et. Sed aliquam aliquet libero, non iaculis ante venenatis dignissim. Curabitur eu felis ac eros auctor auctor quis ut est. Mauris et vehicula velit, eget tincidunt nulla. Pellentesque commodo dolor id mollis dictum. Donec ultrices eleifend dignissim. Fusce finibus, diam vitae molestie posuere, tellus nisi viverra quam, a cursus ligula lorem eu tellus. Duis a magna nisi. Donec ac arcu id metus mollis ultrices. Mauris sodales eleifend enim, at consequat felis. Integer rutrum dapibus nibh, eu bibendum justo ultricies quis. Nam cursus ultricies sapien sed laoreet. Nam nisl elit, aliquet nec sapien at, mattis pharetra sapien.</div>
                            </div>
                        </div>

                        <div class="comment">
                            <div class="comment-avatar">
                                <div class="author-image"><img src="{{ URL::asset('imgs/avatar/default.jpg') }}" /></div>
                                <div class="author-tag">Joueur</div>
                            </div>
                            <div class="comment-content">
                                <div class="author-name">
                                    <strong>Luax</strong>
                                    <small>16 Février 2015 16:03</small>
                                </div>
                                <div class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In iaculis elementum elit, a condimentum dui convallis et. Sed aliquam aliquet libero, non iaculis ante venenatis dignissim. Curabitur eu felis ac eros auctor auctor quis ut est. Mauris et vehicula velit, eget tincidunt nulla. Pellentesque commodo dolor id mollis dictum. Donec ultrices eleifend dignissim. Fusce finibus, diam vitae molestie posuere, tellus nisi viverra quam, a cursus ligula lorem eu tellus. Duis a magna nisi. Donec ac arcu id metus mollis ultrices. Mauris sodales eleifend enim, at consequat felis. Integer rutrum dapibus nibh, eu bibendum justo ultricies quis. Nam cursus ultricies sapien sed laoreet. Nam nisl elit, aliquet nec sapien at, mattis pharetra sapien.</div>
                            </div>
                        </div>

                    </div>
                    &nbsp;
                </div> <!-- content -->
@stop
