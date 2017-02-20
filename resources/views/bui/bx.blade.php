@extends('layouts.uikit')

@section('css')
<link href="{{ asset('static/bui/css/bs3/dpl.css') }}" rel="stylesheet">
<link href="{{ asset('static/bui/css/bs3/bui.css') }}" rel="stylesheet">
@endsection

@section('content')
	<h1>票据报销表</h1>
	<div class="uk-grid">
		<div class="uk-width-4-5 uk-container-center">
			<div id="grid"></div>
		</div>
		<div class="uk-width-4-5 uk-container-center">
			<button type="sumbmit" class="uk-button uk-button-primary" id="bSubmit">提交</button>
		</div>
	</div>
@endsection

@section('script')
<script src="{{ asset('static/bui/seed-min.js') }}"></script>
<script type="text/javascript">
BUI.use(['bui/extensions/treepicker','bui/grid','bui/data','bui/picker','bui/tree'],function(TreePicker,Grid,Data,Picker,Tree){
	var nodes = {!! $json !!},
	tree = new Tree.TreeList({
		nodes : nodes,
		dirSelectable : false,//阻止树节点选中
		showLine : false //显示连接线
	});
 
	var picker = new Picker.ListPicker({
		width:150,  //指定宽度
		children : [tree] //配置picker内的列表
	});
	var columns = [
		{title : '内容摘要',width:180,dataIndex :'zydes',editor : {xtype : 'select',select : {picker : picker},rules : {required : true}}},
		{title : '金额', dataIndex :'jsums',summary : true,editor : {xtype : 'number',rules : {required : true}}},
		{title : '规格',dataIndex :'guige',editor : {xtype : 'text',rules : {required : true}}},
		{title : '数量',dataIndex :'sums',editor : {xtype : 'number',rules : {required : true}}},
		{title : '票据张数',dataIndex :'pjsum',editor : {xtype : 'number',rules : {required : true}}},
		{title : '票据日期',dataIndex :'pjdate',editor : {xtype : 'date',rules : {required : true}},renderer : Grid.Format.dateRenderer},
		{title : '票据性质',dataIndex :'pjxz',editor : {xtype : 'text',rules : {required : true}}},
		{title : '票据号码',width:180,dataIndex :'pjnums',editor : {xtype : 'textarea',rules : {required : true}}},
		{title : '证明人',dataIndex :'zmr',editor : {xtype : 'text',rules : {required : true}}},
		{title : '备注',dataIndex :'desc',editor : {xtype : 'textarea',rules : {required : true}}}
	];
	var data = [];
	var Store = Data.Store;
	var editing = new Grid.Plugins.CellEditing(),
		store = new Store({
			data : data,
			autoLoad:true
		});
	var grid = new Grid.Grid({
		render:'#grid',
		columns : columns,
		width : 860,
		forceFit : true,
		tbar:{
			items : [{
				btnCls : 'uk-button uk-button-primary uk-button-small',
				text : '<i class="icon-plus"></i>添加',
				listeners : {
					'click' : addRow
				}
			},
			{
				btnCls : 'uk-button uk-button-primary uk-button-small',
				text : '<i class="icon-remove"></i>删除',
				listeners : {
					'click' : delRow
				}
			}]
		},
		plugins : [editing,Grid.Plugins.CheckSelection,Grid.Plugins.Summary],
		//plugins : [editing],
		store : store
	});

	grid.render();
	$('#bSubmit').on('click',function(e){
		console.log(grid.getItems());
	});
	function addRow(){
		var newData = {jsums : 0};
		store.addAt(newData,0);
		editing.edit(newData,'jsums'); //添加记录后，直接编辑
	}
	//删除选中的记录
	function delRow(){
		var selections = grid.getSelection();
		store.remove(selections);
	}          
});
</script>
@endsection