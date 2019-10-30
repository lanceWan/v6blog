@extends('admin.layouts.app')

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
                        <form method="post" id="postForm" action="{{url('admin/post')}}" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <label class="col-sm-2 col-form-label">分类</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group">
                                        <select class="selectpicker form-control" name="category_id" data-style="btn btn-rose btn-round">
                                            @isset($categories)
                                                @foreach ($categories as $category)
                                                    <option value="{{$category->id}}" {{old('category_id') == $category->id  ? 'cehcked' : ''}}>{{$category->name}}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">标题</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group">
                                        <input type="text" name="title" class="form-control" value="{{old('title')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">文章封面</label>
                                <div class="col-sm-10">
                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">
                                            <img src="{{asset('assets/admin/img/image_placeholder.jpg')}}">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                        <div>
                                            <span class="btn btn-rose btn-round btn-file">
                                                <span class="fileinput-new">选择图片</span>
                                                <span class="fileinput-exists">更换图片</span>
                                                <input type="file" name="image" value="{{old('image')}}">
                                            </span>
                                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i
                                                    class="fa fa-times"></i> 移除</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">标签</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group">
                                        <input type="text" name="tags" class="form-control tagsinput" data-role="tagsinput" data-color="info" value="{{old('tags')}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label label-checkbox">状态</label>
                                <div class="col-sm-10 checkbox-radios">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="status" type="radio" value="1" {{old('status') == 1 ? 'checked':''}}> 发布
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="status" type="radio" value="2" {{old('status') == 2 ? 'checked':''}}> 草稿
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
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
                        <textarea name="body" form="postForm" style="display:none;">{{old('body')}}</textarea>
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