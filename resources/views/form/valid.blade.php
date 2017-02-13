@extends('layouts.uikit')
@section('css')
<link href="{{ asset('static/validator/dist/jquery.validator.css') }}" rel="stylesheet">
@endsection
@section('content')
	<div class="uk-grid">
		<div class="uk-width-1-2 uk-container-center">
			<form action="{{ URL::to('validForm') }}" class="uk-form" method="post">
				@if (count($errors) > 0)
					<div class="uk-alert uk-alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				<div class="uk-form-row">
					{{ csrf_field() }}
					<input type="text" name="title" class="uk-form-large" data-rule="required" placeholder="请输入偶数个字母" />
				</div>
				<div class="uk-form-row">
					<button class="uk-button uk-button-primary">提交</button>
				</div>
			</form>
		</div>
	</div>
@endsection
@section('script')
<script src="{{ asset('static/validator/dist/jquery.validator.min.js') }}"></script>
<script src="{{ asset('static/validator/dist/local/zh-CN.js') }}"></script>
<script>
$(function(){
	$('form').submit(function(){
		var self = $(this);
        var validator = self.validator();
        alert(validator.isValid());
        if (!validator.isValid())
            return false;
	});
});
</script>
@endsection