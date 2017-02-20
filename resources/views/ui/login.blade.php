@extends('layouts.uikit')

@section('css')
<link href="{{ asset('static/validator/dist/jquery.validator.css') }}" rel="stylesheet">
@endsection

@section('content')
	<div class="uk-grid">
		<div class="uk-width-2-6 uk-container-center">
			<h1 class="uk-text-center">登陆表单</h1>
			<form class="uk-form uk-form-stacked" method="post">
				{{ csrf_field() }}
				<div class="uk-panel uk-panel-box">
					<div class="uk-form-row">
						<input class="uk-form-large uk-width-1-1" type="text" name="auth[username]" data-rule="required" placeholder="用户名" autofocus>
					</div>
					<div class="uk-form-row">
						<input class="uk-form-large uk-width-1-1" type="password" name="auth[password]" data-rule="required" placeholder="密码">
					</div>
					<p class="uk-form-row">
						<button class="uk-button uk-button-primary uk-button-large uk-width-1-1">登录</button>
					</p>
				</div>
			</form>
		</div>
	</div>
@endsection

@section('script')
<script src="{{ asset('static/validator/dist/jquery.validator.min.js') }}"></script>
<script src="{{ asset('static/validator/dist/local/zh-CN.js') }}"></script>
<script type="text/javascript">
$('form').submit(function(){
	var self = $(this);
	var validator = self.validator();
	alert(validator.isValid());
	if (!validator.isValid())
		return false;
});
</script>
@endsection