@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/gitalk@1/dist/gitalk.css">
@endpush

<div id="gitalk-container"></div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/gitalk@1/dist/gitalk.min.js"></script>
<script>
    var gitalk = new Gitalk({
        clientID: '{{env('GitALK_CLIENTID')}}',
        clientSecret: '{{env('GitALK_CLIENTID_SECRET')}}',
        repo: '{{env('GitALK_REPO')}}',
        owner: '{{env('GitALK_OWNER')}}',
        admin: @json(explode(',', env('GitALK_ADMIN'))),
        id: '{{'v6blog-message'}}',
        distractionFreeMode: {{env('GitALK_DISTRACTION_FREE_MODE')}}
    });
    gitalk.render('gitalk-container');
</script>
@endpush