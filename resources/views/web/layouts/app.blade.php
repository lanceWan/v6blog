<!DOCTYPE html>
<html lang="en">
<head>
	<title>Laravel6.x Blog</title>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
	<link href="{{asset("assets/web/css/material-kit.min.css")}}" rel="stylesheet" />
	@stack('css')
</head>

<body class="index-page sidebar-collapse">
    @include('web.layouts.nav')
	<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('assets/web/img/bg.jpg')}}')">
		<div class="container">
			<div class="row">
				<div class="col-md-8 ml-auto mr-auto">
					<div class="brand text-center">
						<h1 id="scoll">{{$settings['site_title'] ?? 'My Laravel6.x Blog'}}</h1>
						<h3 class="title text-center">{{$settings['site_sub_title'] ?? ''}}</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="main main-raised">
		<div class="container">
			@section('sub')
				<div class="row">
					<div class="col-md-8 ml-auto mr-auto">
						<h2 class="title text-center">{{$settings['aphorism'] ?? 'Better for me'}}</h2>
						<h5 class="description">{{$settings['aphorism_desc'] ?? ''}}</h5>
					</div>
				</div>
			@show
			@yield('content')
		</div>
		<br>
		<br>
    </div>
    @include('web.layouts.footer')
	<script src="{{asset('assets/web/js/jquery.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/web/js/popper.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/web/js/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/web/js/material-kit.min.js')}}" type="text/javascript"></script>
	@stack('scripts')
</body>
</html>
