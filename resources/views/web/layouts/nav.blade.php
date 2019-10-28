<nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100"
    id="sectionsNav">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="/">
                Laravel6.x Blog </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        <i class="fa fa-home"></i> 首页
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('tag')}}">
                        <i class="fa fa-tags"></i> 标签
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('message')}}">
                        <i class="fa fa-wechat"></i> 留言
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('about#scoll')}}">
                        <i class="fa fa-user-circle-o"></i> 关于我
                    </a>
                </li>
                @if (Route::has('login'))
                @auth
                    <li class="dropdown nav-item">
                        <a href="#pablo" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <i class="fa fa-user-circle"></i> {{ Auth::user()->name }}
                            <b class="caret"></b>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <h6 class="dropdown-header">常用</h6>
                            <a href="{{url('admin')}}" class="dropdown-item"><i class="fa fa-tasks"> 后台首页</i></a>
                            <a href="{{url('admin/post/create')}}" class="dropdown-item"><i class="fa fa-pencil"> 添加文章</i></a>
                            <div class="dropdown-divider"></div>
                            <a href="{{route('admin.system')}}" class="dropdown-item"><i class="fa fa-cogs"> 博客设置</i></a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item"><i class="fa fa-tasks" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();"> 退出登录</i></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-rose btn-raised btn-round ">
                            登录
                        </a>
                    </li>
                @endauth
                @endif
                <li class="nav-item">
                    <a class="btn btn-just-icon btn-link text-danger" rel="tooltip" title="" data-placement="bottom"
                        href="{{$settings['github'] ?? '/'}}" target="_blank"
                        data-original-title="Follow us on github">
                        <i class="fa fa-github"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
