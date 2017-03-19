@extends('layouts.uikit')

@section('css')
<link href="{{ asset('static/bui/css/bs3/dpl.css') }}" rel="stylesheet">
<link href="{{ asset('static/bui/css/bs3/bui.css') }}" rel="stylesheet">
@endsection

@section('content')
	<div class="uk-grid">
		<div class="uk-width-2-5 uk-container-center">
			<form id="J_Form1" action="" class="row">
			  <div class="span12">
				<div class="well">
				  <label>编号：</label><input name="a" data-rules="{required:true,length:5}" type="text">
				</div>
				<div id="info" class="well"></div>
			  </div>
			</form>
		</div>
	</div>
@endsection

@section('script')
<script src="{{ asset('static/bui/seed-min.js') }}"></script>
<script type="text/javascript">
BUI.use(['bui/form'],function(Form){
	var f1 = new Form.Form({
		srcNode : '#J_Form1'
	}).render();
	
	//根据name获取字段
	var field = f1.getField('a');
	//设置异步请求配置项
	field.set('remote',{
		url : '/bui/remote-get',
		dataType : 'json',
		callback : function (data) {
			//处理数据，此处也可以根据结果显示请求数据的验证结果，
			// return errorMsg; 即可
			$('#info').text(BUI.JSON.stringify(data));
		}
	});
});
</script>
@endsection