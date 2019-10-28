@extends('admin.layouts.app')

@section('content')
<div class="content">
    <div class="col-md-8 ml-auto mr-auto">
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
        <div class="card">
            <div class="card-header card-header-rose card-header-text">
                <div class="card-text">
                    <h4 class="card-title"><i class="fa fa-pencil"></i> 修改友链</h4>
                </div>
            </div>
            <div class="card-body">
                <form method="post" id="postForm" action="{{route('link.update', $link->id)}}" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <label class="col-sm-2 col-form-label">友链名称</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="name" class="form-control" value="{{old('name', $link->name)}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">链接</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="url" class="form-control" value="{{old('url', $link->url)}}">
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