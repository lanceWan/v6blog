@extends('web.layouts.app')

@push('css')
<link href="https://cdn.bootcss.com/highlight.js/9.13.1/styles/monokai-sublime.min.css" rel="stylesheet">
@endpush

@section('content')
<div class="container">
    @section('sub')
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <h2 class="title text-center">留言</h2>
            </div>
        </div>
    @endsection
    <div class="section section-blog-info">
        <div class="row">
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