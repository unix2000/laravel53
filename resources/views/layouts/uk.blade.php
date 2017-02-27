<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>a web based erp system</title>
    {!! Html::style('static/uikit/css/uikit.almost-flat.min.css') !!}
	{!! Html::style('css/style.css') !!}
    @yield('css')
</head>
<body>
<div class="uk-container">
    @yield('content')
</div>
{!! Html::script('static/jquery.min.js') !!}
{!! Html::script('static/uikit/js/uikit.min.js') !!}
@yield('script')
</body>
</html>