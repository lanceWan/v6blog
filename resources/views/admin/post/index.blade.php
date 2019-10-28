@extends('admin.layouts.app')

@section('navbar')
    <li class="nav-item dropdown">
        <a href="{{url('/admin/post/create')}}" class="btn btn-rose btn-raised btn-round text-info" style="color:white !important">
            <i class="fa fa-plus"> 添加文章</i>
            <div class="ripple-container"></div></a>
        </a>
    </li>
    @parent
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('flash::message')
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">文章列表</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>标题</th>
                                        <th>分类</th>
                                        <th>浏览数</th>
                                        <th class="text-center">发布时间</th>
                                        <th class="text-right">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($posts)
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td class="text-center">{{$post->id}}</td>
                                            <td>{{$post->title}}</td>
                                            <td>{{$post->category->name}}</td>
                                            <td>{{$post->view}}</td>
                                            <td class="text-center">{{$post->created_at}}</td>
                                            <td class="td-actions text-right" style="color:white !important">
                                                <a data-placement="left" rel="tooltip"
                                                    class="btn btn-info" data-original-title="查看" href="{{url('post', [$post->id])}}" target="_blank">
                                                    <i class="material-icons">visibility</i>
                                                </a>
                                                <a data-placement="left" rel="tooltip"
                                                    class="btn btn-success" data-original-title="修改" href="{{route('post.edit', $post->id)}}">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a data-placement="left" rel="tooltip"
                                                    class="btn btn-danger" data-original-title="删除" href="{{ route('post.destroy', $post->id) }}" onclick="event.preventDefault();
                                                    document.getElementById('{{'destroy-form-'.$post->id}}').submit();">
                                                    <i class="material-icons">close</i>
                                                    <form id="{{'destroy-form-'.$post->id}}" action="{{ route('post.destroy', $post->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach    
                                    @endisset
                                </tbody>
                            </table>
                            <div class="text-right float-right">
                                {{$posts->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection