@extends('admin.layouts.app')

@section('navbar')
<li class="nav-item dropdown">
    <a href="{{route('link.create')}}" class="btn btn-rose btn-raised btn-round text-info"
        style="color:white !important">
        <i class="fa fa-plus"> 添加友链</i>
        <div class="ripple-container"></div>
    </a>
    </a>
</li>
@parent
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                @include('flash::message')
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">友链列表</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>友链名称</th>
                                        <th>链接</th>
                                        <th class="text-center">创建时间</th>
                                        <th class="text-right">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($links)
                                    @foreach ($links as $link)
                                    <tr>
                                        <td class="text-center">{{$link->id}}</td>
                                        <td>{{$link->name}}</td>
                                        <td>{{$link->url}}</td>
                                        <td class="text-center">{{$link->created_at}}</td>
                                        <td class="td-actions text-right" style="color:white !important">
                                            <a data-placement="left" rel="tooltip" class="btn btn-success"
                                                data-original-title="修改" href="{{route('link.edit', $link->id)}}">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a data-placement="left" rel="tooltip" class="btn btn-danger"
                                                data-original-title="删除" href="{{ route('link.destroy', $link->id) }}"
                                                onclick="event.preventDefault();
                                                    document.getElementById('{{'destroy-form-'.$link->id}}').submit();">
                                                <i class="material-icons">close</i>
                                                <form id="{{'destroy-form-'.$link->id}}"
                                                    action="{{ route('link.destroy', $link->id) }}" method="POST"
                                                    style="display: none;">
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
                                {{$links->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection