@extends('home.layout')

@section('title')
    {{ !empty($row->title)? $row->title:(!empty($type->title)? $type->title:'') }}
@stop

@section('content')

    <div id="content" class="container">

    <div class="row breadcrumbs">
        
        <span class="loc page" data-link="/">Главная </span>
        @if(!empty($type->name))
            <span class="loc page" data-link="/{{$type->type}}"> > {{ $type->name }} </span>
        @endif
        @if(!empty($row->parent_title))
            <span class="loc page" data-link="/{{$row->parent_slug}}"> > {{ $row->parent_title }} </span>
        @endif
        @if(!empty($row->name))
            <span class="loc page" data-link="/{{$row->slug}}"> > {{ $row->name }} </span>
        @endif

    </div>

    <div class="row row-content">

        @if(isset($posts)&&count($posts)>0)
            <div class="col-xs-12 col-sm-3">

                <ul class="menu-page nav nav-pills nav-stacked ">
                    @foreach($posts as $post)
                        <li {{ (Request::is( $type->type.'/'.$post->slug)) || (!empty($row)&&$row->parent==$post->id)? 'class="active"' : '' }} >
                        {{ HTML::link('/'.$type->type.'/'.$post->slug, $post->name) }}
                            
                            @if(isset($posts_child)&&count($posts_child)>0)
                                <ul>
                                    @foreach($posts_child as $post_ch)
                                        @if(($post_ch->parent == $post->id) )
                                            <li {{ (Request::is( $type->type.'/'.$post_ch->slug)) ? 'class="active"' : '' }}>
                                                {{ HTML::link('/'.$type->type.'/'.$post_ch->slug, $post_ch->name) }}
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>



            </div>


            <div class="col-xs-12 col-sm-9">

        @elseif(!isset($posts)||count($posts)==0)

            <div class="col-xs-12">

        @endif


            @if(!empty($type->text) && empty($row))
                {{ $type->text }}
            @endif

            @if(isset($posts)&&count($posts)>0)
               
                @if(!empty($row->text))
                    {{ $row->text }}
                @endif

            @else
                @if(!empty($row->text))
                    {{ $row->text }}
                @endif
            @endif
        </div>

    </div>

<script type="text/javascript">(function() {
  if (window.pluso)if (typeof window.pluso.start == "function") return;
  if (window.ifpluso==undefined) { window.ifpluso = 1;
    var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
    s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
    var h=d[g]('body')[0];
    h.appendChild(s);
  }})();</script>

<div class="pluso pluso-txt-right" data-background="transparent" data-options="medium,square,line,horizontal,nocounter,theme=04" data-services="vkontakte,linkedin,facebook,twitter,odnoklassniki,google,moimir"></div>
<br>
    </div>

@stop


@section('scripts')

@stop
