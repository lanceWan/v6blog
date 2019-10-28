@extends('admin.layouts.app')

@section('content')
<div class="content">
    <div class="col-md-8 ml-auto mr-auto">
        @include('flash::message')
        <div class="card">
            <div class="card-header card-header-rose card-header-text">
                <div class="card-text">
                    <h4 class="card-title"><i class="fa fa-cogs"></i> 系统设置</h4>
                </div>
            </div>
            <div class="card-body">
                <form method="post" id="postForm" action="{{route('admin.system')}}" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <label class="col-sm-2 col-form-label">网站名称</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="site_name" class="form-control" value="{{$settings['site_name']}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">主标题</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="site_title" class="form-control" value="{{$settings['site_title']}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">副标题</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="site_sub_title" class="form-control" value="{{$settings['site_sub_title']}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">格言</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="aphorism" class="form-control" value="{{$settings['aphorism']}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">格言内容</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="aphorism_desc" class="form-control" value="{{$settings['aphorism_desc']}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">QQ交流群</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="QQ" class="form-control" value="{{$settings['QQ']}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">广告图片</label>
                        <div class="col-sm-10">
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img src="{{asset($settings['adv_image'] ? 'storage/'.$settings['adv_image'] : 'assets/admin/img/image_placeholder.jpg')}}">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <div>
                                    <span class="btn btn-rose btn-round btn-file">
                                        <span class="fileinput-new">选择图片</span>
                                        <span class="fileinput-exists">更换图片</span>
                                        <input type="file" name="adv_image" value="">
                                    </span>
                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i
                                            class="fa fa-times"></i> 移除</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">广告标题</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="adv_title" class="form-control" value="{{$settings['adv_title']}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">广告地址</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="adv_url" class="form-control" value="{{$settings['adv_url']}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">github连接</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="github" class="form-control" value="{{$settings['github']}}">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button type="submit" form="postForm" class="btn btn-fill btn-rose">提交</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{asset('assets/admin/js/jasny-bootstrap.min.js')}}"></script>
@endpush