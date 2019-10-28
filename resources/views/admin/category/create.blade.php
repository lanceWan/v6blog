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
                    <h4 class="card-title"><i class="fa fa-pencil"></i> 添加分类</h4>
                </div>
            </div>
            <div class="card-body">
                <form method="post" id="postForm" action="{{route('category.store')}}" class="form-horizontal">
                    @csrf
                    <div class="row">
                        <label class="col-sm-2 col-form-label">分类名称</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="name" class="form-control" value="{{old('name')}}">
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