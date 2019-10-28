@extends('web.layouts.app')

@push('css')
<link href="https://cdn.bootcss.com/highlight.js/9.13.1/styles/monokai-sublime.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/gitalk@1/dist/gitalk.css">
@endpush

@section('content')
<div class="container">
    @section('sub')
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <h2 class="title text-center">标签</h2>
            </div>
        </div>
    @endsection
    <div class="section section-blog-info">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                @isset($tags)
                    <div id="tag-cloud"></div>
                @endisset
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{asset('assets/web/js/jquery.svg3dtagcloud.min.js')}}"></script>
<script>
    var tags = @json($tags);
        if(tags){
            var entries = [];
            tags.forEach(element => {
                entries.push({label: element.name, url: '/tag/' + element.id, target: '_top'});
            });
            var settings = {
                entries: entries,
                width: '100%',//宽度
                radius: '65%',
                radiusMin: 75,
                bgDraw: true,//是否显示背景
                bgColor: '#AFEEEE',//背景颜色
                speed: 0.3,
                fontColor: '#9c27b0',
                fontSize: '24',
            };
            $( '#tag-cloud' ).svg3DTagCloud(settings);
        }
        
</script>
@endpush