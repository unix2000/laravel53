@extends('layouts.uikit')

@section('css')
<link href="{{ asset('static/easyui/themes/material/easyui.css') }}" rel="stylesheet">
<link href="{{ asset('static/easyui/themes/icon.css') }}" rel="stylesheet">
@endsection

@section('content')
	<div class="uk-grid">
		<h1>easyui Tree demo</h1>
	</div>
	<div class="uk-grid">
		<div class="uk-width-1-4">
			<div style="margin:20px 0;"></div>
			<div class="easyui-panel" style="padding:5px">
				<ul class="easyui-tree" data-options="url:'{{ URL::to('easyui/treeJson') }}',method:'get',animate:true,lines:true"></ul>
			</div>
		</div>
		<div class="uk-width-1-4">
			<div style="margin:20px 0">
				<a href="javascript:void(0)" class="easyui-linkbutton" onclick="getValue()">GetValues</a>
				<a href="javascript:void(0)" class="easyui-linkbutton" onclick="setValue()">SetValue</a>
				<a href="javascript:void(0)" class="easyui-linkbutton" onclick="disable()">Disable</a>
				<a href="javascript:void(0)" class="easyui-linkbutton" onclick="enable()">Enable</a>
			</div>
			<input id="cc" class="easyui-combotree" data-options="url:'{{ URL::to('easyui/treeJson') }}',method:'get',required:true" multiple style="width:200px;">
		</div>
	</div>
@endsection

@section('script')
<script src="{{ asset('static/easyui/jquery.easyui.min.js') }}"></script>
<script type="text/javascript">
	function getValue(){
		//单选getValue 复选getValues
		//var val = $('#cc').combotree('getValue');
		var val = $('#cc').combotree('getValues');
		alert(val);
	}
	function setValue(){
		$('#cc').combotree('setValue', '68');
	}
	function disable(){
		$('#cc').combotree('disable');
	}
	function enable(){
		$('#cc').combotree('enable');
	}
</script>
@endsection