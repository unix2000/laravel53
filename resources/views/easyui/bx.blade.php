@extends('layouts.uikit')

@section('css')
<link href="{{ asset('static/easyui/themes/gray/easyui.css') }}" rel="stylesheet">
<link href="{{ asset('static/easyui/themes/icon.css') }}" rel="stylesheet">
@endsection
	
@section('content')
	<div class="uk-grid">
		<div class="uk-width-4-6 uk-container-center">
			<h1>票据报销</h1>
			<button class="uk-button uk-button-primary" onclick="addRow();">添加</button>
			<button class="uk-button uk-button-primary" onclick="delRow();">删除</button>
			<button class="uk-button uk-button-primary" onclick="getAllRows();">获取数据</button>
			<div class="uk-form-row">
				<table id="grid"></table>
			</div>
			<div class="uk-form-row">
				<button class="uk-button uk-button-primary">提交</button>
			</div>
		</div>
	</div>
@endsection

@section('script')
<script src="{{ asset('static/easyui/jquery.easyui.min.js') }}"></script>
<script src="{{ asset('static/easyui/datagrid-cellediting.js') }}"></script>
<script type="text/javascript">
	var grid = $('#grid').datagrid({
		rownumbers:true,
		singleSelect:true,
		width:760,
		height:220,
		columns:[
			[
				{field:'ck',checkbox:true,width:50},
				{
					field:'bxtype',
					title:'报销内容',
					width:180,
					editor:{
						type:'combotree',
						options: {
							required:true,
							data:{!! $json !!},
							valueField:'id'  
							//textField:'text'
						}
					}
				},
				{field:'bxsum',title:'报销金额',width:60,editor:'numberbox'},
				{field:'bxdate',title:'报销日期',width:100,editor:'datebox'},
				{field:'zmr',title:'证明人',width:80,editor:'text'},
				{field:'bxdes',title:'备注',width:180,editor:'textarea'}
			]
		]
	});
	
	grid.datagrid('enableCellEditing').datagrid('gotoCell', {
		index: 0,
		field: 'bxtype'
	});
	
	grid.datagrid({
		onCellEdit: function(index,field,value) {
			//onCellEdit事件优先于enableCellEditing
			//console.log(index,field,value);
			//编辑前触发,value为初始值(空置为undefined) 比如combotree还未触发
			alert('onCellEdit');
			if (field == 'bxtype') {
				alert('bxtype');
				//alert(value);

			}
		},
		onAfterEdit: function(index,row,changes) {
			//编辑完cell后触发
			alert('onAfterEdit');
			//var ed = $(this).datagrid('getEditor', {index:index,field:'bxtype'});
			//alert(ed); //null

			//$(ed.target).combotree('setValue', '设置值');
		},
		onClickCell: function(index,field,value){
			//onClickCell触发后onCellEdit,onAfterEdit全部失效
			//beginEdit整行编辑
			$(this).datagrid('beginEdit', index);
			console.log(index,field,value);

			var ed = $(this).datagrid('getEditor', {index:index,field:field});
			$(ed.target).focus();
		}
	});
	function addRow() {
		grid.datagrid('appendRow',{
			bxsum: 0			
		});
	}
	function delRow() {
		var row = grid.datagrid('getSelected');
		if(row) {
			var rowIndex = grid.datagrid('getRowIndex', row);
			grid.datagrid('deleteRow',rowIndex);
			//reload解决index重新排序问题
			grid.datagrid('reload'); 
		}
	}
	function getAllRows() {
		console.log(grid.datagrid('getData'));
	}
</script>
@endsection