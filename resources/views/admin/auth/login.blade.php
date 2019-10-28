<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Laravel6.x Blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="{{asset('assets/web/css/material-kit.min.css')}}" rel="stylesheet" />
</head>

<body class="signup-page sidebar-collapse">
    <div class="page-header header-filter" filter-color="purple"
        style="background-image: url('{{asset('assets/web/img/bg.jpg')}}'); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <div class="card card-signup">
                        <h2 class="card-title text-center">Login</h2>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5 ml-auto mr-auto">
                                    <form class="form" method="post" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group @error('name') has-danger @enderror">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-envelope-o"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="name" placeholder="用户名" ..." value="{{ old('name') }}">
                                            </div>
                                            @error('name')
                                                <span class="text-danger" role="alert" style="padding-left:20px">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group @error('password') has-danger @enderror"">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-lock"></i>
                                                    </span>
                                                </div>
                                                <input type="password" placeholder="密码..." class="form-control" name="password"/>
                                            </div>
                                            @error('password')
                                            <span class="text-danger" role="alert" style="padding-left:20px">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                                Remember Me
                                            </label>
                                        </div>
                                        <div class="text-center">
                                            <button class="btn btn-primary btn-round">Lets Go<div class="ripple-container"></div></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer footer-white">
            <div class="container">
                <div class="copyright pull-center">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, made with Laravel 6.x by
                    <a href="" target="blank" class="text-primary">晚黎</a> for a better web.
                </div>
            </div>
        </footer>
    </div>
    <script src="{{asset('assets/web/js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/web/js/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/web/js/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/web/js/material-kit.min.js')}}" type="text/javascript"></script>
</body>

</html>
