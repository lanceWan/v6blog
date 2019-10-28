@extends('web.layouts.app')

@push('css')
    <link href="https://cdn.bootcss.com/highlight.js/9.13.1/styles/monokai-sublime.min.css" rel="stylesheet">
@endpush

@section('content')
<div class="container">
    @section('sub')
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <h2 class="title text-center">{{$post->title}}</h2>
            </div>
        </div>
    @endsection
    <div class="section section-text">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto md-font">{!! MarkdownEditor::parse($post->body) !!}</div>
        </div>
    </div>
    <div class="section section-blog-info">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <div class="row">
                    <div class="col-md-6">
                        <div class="blog-tags">
                            Tags:
                            @isset($post->tags)
                            @foreach ($post->tags as $tag)
                            <span class="badge badge-primary badge-pill">{{$tag->name}}</span>
                            @endforeach
                            @endisset
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-google btn-round float-right">
                            <i class="fa fa-eye"></i> {{$post->view}} ℃
                        </button>
                        <button class="btn btn-google btn-round float-right">
                            <i class="fa fa-list"></i> {{$post->category->name}}
                        </button>
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-md-8 ml-auto mr-auto">
                @include('web.layouts.gitalk')
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://cdn.bootcss.com/highlight.js/9.15.10/highlight.min.js"></script>
    <script>
        hljs.initHighlightingOnLoad();
    </script>
@endpush