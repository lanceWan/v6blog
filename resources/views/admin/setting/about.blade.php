@extends('admin.layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        @include('flash::message')
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <div class="card">
                    <div class="card-header card-header-rose card-header-text">
                        <div class="card-text">
                            <h4 class="card-title"><i class="fa fa-pencil"></i> 关于我</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" id="postForm" action="{{url('admin/about')}}" class="form-horizontal">
                            @csrf
                            <div id="editormd">
                                <textarea name="editormd" style="display:none;">{{old('about', $about->content)}}</textarea>
                            </div>
                            @include('markdown::encode',['editors'=>['editormd']])
                        </form>
                    </div>
                    <div class="card-footer ">
                        <button type="submit" form="postForm" class="btn btn-fill btn-rose">提交</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{asset('assets/admin/js/bootstrap-selectpicker.js')}}"></script>
<script src="{{asset('assets/admin/js/jasny-bootstrap.min.js')}}"></script>
<script src="{{asset('assets/admin/js/bootstrap-tagsinput.js')}}"></script>
<script>
    $('.selectpicker').selectpicker('val', '{{old('category_id')}}');
</script>
@endpush@extends('admin.layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        @if ($errors->any())
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="material-icons">clear</i></span>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-header-rose card-header-text">
                        <div class="card-text">
                            <h4 class="card-title"><i class="fa fa-pencil"></i> 添加文章</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" id="postForm" action="{{url('admin/post')}}" class="form-horizontal"
                            enctype="multipart/form-data">
                            @csrf
                            <div id="editormd">
                                <textarea name="editormd" form="postForm" style="display:none;"></textarea>
                            </div>
                            @include('markdown::encode',['editors'=>['editormd']])
                        </form>
                    </div>
                    <div class="card-footer ">
                        <button type="submit" form="postForm" class="btn btn-fill btn-rose">提交</button>
                    </div>
                </div>
            </div>
            <div class="col-md-8 card">
                <div class="card-body">
                    <div id="editormd">
                        <textarea name="editormd" form="postForm" style="display:none;"></textarea>
                    </div>
                    @include('markdown::encode',['editors'=>['editormd']])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{asset('assets/admin/js/bootstrap-selectpicker.js')}}"></script>
<script src="{{asset('assets/admin/js/jasny-bootstrap.min.js')}}"></script>
<script src="{{asset('assets/admin/js/bootstrap-tagsinput.js')}}"></script>
<script>
    $('.selectpicker').selectpicker('val', '{{old('category_id')}}');
</script>
@endpush