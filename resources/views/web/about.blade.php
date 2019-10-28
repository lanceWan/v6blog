@extends('web.layouts.app')

@push('css')
<link href="https://cdn.bootcss.com/highlight.js/9.13.1/styles/monokai-sublime.min.css" rel="stylesheet">
@endpush

@section('content')
<div class="container">
    <div class="section section-text">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto md-font">{!! MarkdownEditor::parse(optional($about)->content) !!}</div>
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