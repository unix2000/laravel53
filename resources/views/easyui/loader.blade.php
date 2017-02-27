@extends('layouts.uikit')

@section('css')
<link href="{{ asset('static/easyui/themes/gray/easyui.css') }}" rel="stylesheet">
<link href="{{ asset('static/easyui/themes/icon.css') }}" rel="stylesheet">
@endsection

@section('content')
	<div class="uk-grid">
		<div class="uk-width-1-3 uk-container-center">
			<a id="btnAlert" class="easyui-linkbutton">弹出框提示</a>
			<button class="easyui-linkbutton" onclick="load()">加载模块</button> 
			<input id="cal" type="text" class="easyui-datebox" required="required">
		</div>
	</div>
@endsection

@section('script')
<script src="{{ asset('static/easyui/easyloader.js') }}"></script>
<script type="text/javascript">
	//easyloader.base = '/static/easyui/';
	//easyloader.load
	$(function(){
		easyloader.locale="zh_CN";
		easyloader.modules = {};
		using(['messager','calendar','dialog'], function () { 
			///alert("加载成功！");
			//$('#cal').datebox();
			//$.messager.alert('Title', 'load ok');
			$("#btnAlert").click(function () {
				$.messager.alert('Warning', 'The warning message','warning');
			});
		}); 
	});
	function load() {
		$.messager.alert('成功', 'load click','info'); 
	}
</script>
@endsection