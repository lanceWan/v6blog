@extends('web.layouts.app')

@section('content')
<div class="container">
    @isset($attribute)
        @section('sub')
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <h2 class="title text-center">标签查找：{{ $attribute->name }}</h2>
                </div>
            </div>
        @endsection
    @endisset
    <div class="row">
        <div class="row col-md-9">
            @isset($posts)
            @foreach ($posts as $post)
            <div class="col-md-6">
                <div class="card card-blog card-animation">
                    <div class="card-header card-header-image">
                        <a href="{{url('post', [$post->id])}}">
                            <img class="img" style="height:196px" src="{{asset($post->image ? 'storage/'.$post->image : 'assets/web/img/default.png')}}">
                        </a>
                        <div class="colored-shadow"
                            style="background-image: url('{{asset($post->image ? 'storage/'.$post->image : 'assets/web/img/default.png')}}'); opacity: 1;">
                        </div>
                    </div>
                    <div class="card-body ">
                        <h6 class="card-category text-danger">
                            <i class="fa fa-send"> <a href="{{ url('category', $post->category->id) }}">{{$post->category->name}}</a></i>
                        </h6>

                        <h4 class="card-title">
                        <a href="{{url('post', [$post->id])}}" class="over-hidden" title="{{$post->title}}">{{$post->title}}</a>
                        </h4>
                    </div>
                    <div class="card-footer ">
                        <div class="author">
                        <i class="fa fa-eye"> {{$post->view}} ℃</i>
                        </div>
                        <div class="stats ml-auto">
                            <i class="fa fa-clock-o">{{$post->created_at}}</i>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endisset
        </div>
        <div class="col-md-3">
            <hr>
            <h4 class="title">交流学习</h4>
            <ul class="list-unstyled">
                <li>
                    <b>QQ 群</b> {{$settings['QQ'] ?? '暂无'}}
                </li>
            </ul>
            <hr>
            <h4 class="title">最新福利</h4>
            <p class="description">
                @if (isset($settings['adv_image']) && $settings['adv_image'])
                <a href="{{$settings['adv_url'] ?? '/'}}">
                    <img src="{{asset('storage/'.$settings['adv_image'])}}" class="img-raised rounded img-fluid">
                </a>
                @endif
                <a href="{{$settings['adv_url'] ?? '/'}}">{{$settings['adv_title'] ?? 'Laravel 6.x blog'}}</a>
            </p>
            <hr>
            @isset($links)
                <h4 class="title">友情链接</h4>
                <ul class="list-unstyled">
                    @foreach ($links as $link)
                        <li>
                            <h4><a href="{{$link->url}}" target="_blank">{{$link->name}}</a></h4>
                        </li>
                    @endforeach
                </ul>
            @endisset
            <hr>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                {{ $posts->fragment('scoll')->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
