@extends('layouts.uikit')
@section('css')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection

@section('content')
	<div class="uk-grid">
		<div class="uk-width-3-5 uk-container-center">
			<h1>系统登陆</h1>
			@if (count($errors) > 0)
				<div class="uk-alert uk-alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<form action="{{ URL::to('/form/validatorForm')}}" class="uk-form" method="post" id="form1">
				<div class="uk-form-row">
					<div class="uk-grid">
						{{ csrf_field() }}
						<div class="uk-width-1-5">
							<lable>用户名：</lable>
						</div>
						<div class="uk-width-4-5">
							<input type="text" name="username" class="uk-form-large"  nullmsg="请输入用户名" datatype="*5-5" aria-required="true" />
						</div>
					</div>
				</div>
				<div class="uk-form-row">
					<div class="uk-grid">
						<div class="uk-width-1-5">
							<lable>密  码：</lable>
						</div>
						<div class="uk-width-4-5">
							<input type="text" name="passwd" class="uk-form-large" nullmsg="请输入密码" datatype="*5-5" aria-required="true" />
						</div>
					</div>
				</div>
				<div class="uk-form-row">
					<div class="uk-grid">
						<div class="uk-width-1-5">
							<lable>验证码：</lable>
						</div>
						<div class="uk-width-4-5">
							<input type="text" name="captcha" class="uk-form-large" nullmsg="请输入验证码" datatype="*5-5" aria-required="true" />
							<a href="JavaScript:void(0);" onclick="javascript:document.getElementById('verify').src='/captcha/default&t=' + Math.random();" class="change" title="看不清，换一张">
							<img src="{{ captcha_src('flat') }}" name="verify" id="verify" border="0" />
							</a>
						</div>
					</div>
					{{captcha_src()}}
				</div>
				<div class="uk-form-row">
					<button class="uk-button uk-button-primary">提交</button>
				</div>
			</form>
		</div>
	</div>
@endsection

@section('script')
<script src="{{ asset('static/validform/Validform.min.js') }}"></script>
<script>
	$("#form1").Validform({
		tiptype:3
	});
</script>
@endsection