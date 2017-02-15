@extends('layouts.uikit')

@section('css')
<link href="{{ asset('static/easyui/themes/gray/easyui.css') }}" rel="stylesheet">
<link href="{{ asset('static/easyui/themes/icon.css') }}" rel="stylesheet">
@endsection

@section('content')
	<div class="uk-grid">
		<div class="uk-width-3-5 uk-container-center">
			<h2>easyui DataGrid Selection</h2>
			<div style="margin:20px 0;">
				<a href="#" class="easyui-linkbutton" onclick="getSelected()">获取选中-单选</a>
				<a href="#" class="easyui-linkbutton" onclick="getSelections()">获取选中-多选</a>
			</div>
			<table id="dg" class="easyui-datagrid" title="2万条数据" style="width:700px;height:360px"
				data-options="rownumbers:true,singleSelect:true,pagination:true,url:'{{ URL::to('easyui/data') }}',method:'get'">
				<thead>
					<tr>
						<th data-options="field:'ck',checkbox:true"></th>
						<th data-options="field:'name',width:100">用户名</th>
						<th data-options="field:'email',width:180,align:'right'">电子邮件</th>
						<th data-options="field:'address',width:180,align:'right'">家庭住址</th>
					</tr>
				</thead>
			</table>
			<div style="margin:10px 0;">
				<span>Selection Mode: </span>
				<select onchange="$('#dg').datagrid({singleSelect:(this.value==0)})">
					<option value="0">单行</option>
					<option value="1">多行</option>
				</select>
			</div>
		</div>
	</div>
@endsection

@section('script')
<script src="{{ asset('static/easyui/jquery.easyui.min.js') }}"></script>
<script type="text/javascript">
	function getSelected(){
		var row = $('#dg').datagrid('getSelected');
		if (row){
			$.messager.alert('Info', row.id+":"+row.name+":"+row.email);
		}
	}
	function getSelections(){
		var ss = [];
		var rows = $('#dg').datagrid('getSelections');
		for(var i=0; i<rows.length; i++){
			var row = rows[i];
			ss.push('<span>'+row.id+":"+row.name+":"+row.address+'</span>');
		}
		$.messager.alert('Info', ss.join('<br/>'));
	}
</script>
@endsection