@extends('layouts.uikit')

@section('css')
<link href="{{ asset('static/easyui/themes/gray/easyui.css') }}" rel="stylesheet">
<link href="{{ asset('static/easyui/themes/icon.css') }}" rel="stylesheet">
@endsection

@section('content')
	<h1>票据报销表</h1>
	<div class="uk-grid">
		<div class="uk-width-1-1 uk-container-center">
			<!--<a href="#" class="easyui-linkbutton" onclick="insert()">新增行</a>-->
			<button class="uk-button uk-button-primary" onclick="addrows()">新增行</button>
			<table id="dg"></table>
		</div>
	</div>
@endsection

@section('script')
<script src="{{ asset('static/easyui/jquery.easyui.min.js') }}"></script>
<script type="text/javascript">
	var $dg = $('#dg');
	function addrows(){
		/**返回所有行**/
		var index;
		var columns = $dg.datagrid('getRows');
		//alert(columns.length);
		if(columns.length==0){
			index = 0;
		} else {
			index = columns.length;
		}
		$('#dg').datagrid('insertRow', {
			index: index,
			row:{}
		});
		//$('#dg').datagrid('selectRow',index);
		$('#dg').datagrid('beginEdit',index);
	}

	$("#dg").datagrid({
		width:1024,
		height:360,
		//fit:true,
		fitColumns:true,
		//nowrap: true,
		singleSelect:true,
		rownumbers: true,
		columns:[[
			/* {field:'id',checkbox:true},*/
			{field:'zydes',title:'内容摘要',width:180,
				editor:{
					type:'combotree',
					options:{
						//url:"",
						data:{!! $json !!},
						required:true
					}
				}},
			{field:'jsums',title:'金额',width:60,editor:{type:'numberbox',options:{precision:2}}},
			{field:'guige',title:'规格',width:60,editor:'text'},
			{field:'sums',title:'数量',width:60,editor:'numberbox'},
			{field:'pjsum',title:'票据张数',width:60,editor:'numberbox'},
			{field:'pjdate',title:'票据日期',width:120,editor:'datebox'},
			{field:'pjxz',title:'票据性质',width:80,editor:'text'},
			{field:'pjnums',title:'票据号码',width:260,editor:'textarea'},
			{field:'zmr',title:'证明人',width:100,editor:'text'},
			{field:'desc',title:'备注',width:120,editor:'text'}
		]]
	});

	function dels(id)
	{
		alert(id);
		//var columns = $dg.datagrid('getRows');
		//alert(columns.length);
		$dg.datagrid('deleteRow',id);
		/**自动初始化索引**/
	}
</script>
@endsection