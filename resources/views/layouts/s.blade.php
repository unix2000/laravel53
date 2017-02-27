<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>superui layouts</title>
    {!! Html::style('static/content/ui/global/bootstrap/css/bootstrap.min.css') !!}
	{!! Html::style('static/content/ui/global/font-awesome/css/font-awesome.css') !!}
	{!! Html::style('static/content/adminlte/dist/css/AdminLTE.css') !!}
	{!! Html::style('static/content/adminlte/dist/css/skins/_all-skins.css') !!}
	{!! Html::style('static/content/min/css/supershopui.common.min.css') !!}
    @yield('css')
</head>
<body>
<div class="wrapper">
	@include('public.header')
    @yield('content')
	@include('public.footer')
</div>

{!! Html::script('static/content/ui/global/jQuery/jquery.min.js') !!}
{!! Html::script('static/content/ui/global/bootstrap/js/bootstrap.min.js') !!}
{!! Html::script('static/content/min/js/supershopui.common.js') !!}
@yield('script')
</body>
</html>