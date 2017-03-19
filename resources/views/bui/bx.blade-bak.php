@extends('layouts.uikit')

@section('css')
<link href="{{ asset('static/bui/css/bs3/dpl.css') }}" rel="stylesheet">
<link href="{{ asset('static/bui/css/bs3/bui.css') }}" rel="stylesheet">
@endsection

@section('content')
	<div id="content" class="hide">
		<h1>请与财务报销科目对接</h1>
		<div class="span8">
			<input type="text" id="show" name="show">
			<input type="text" id="hide"  name="hide">
		</div>
	</div>
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
BUI.use(['bui/extensions/treepicker','bui/grid','bui/data','bui/picker','bui/tree','bui/overlay'],function(TreePicker,Grid,Data,Picker,Tree,Overlay){
	var nodes = {!! $json !!},
	tree = new Tree.TreeList({
		nodes : nodes,
		dirSelectable : false,//阻止树节点选中
		showLine : false //显示连接线
	});
	
	//editor select仅渲染一次
	var picker = new Picker.ListPicker({
		width:150,
		children : [tree]
	});
	/**
	var picker_types = new TreePicker({
        trigger : '#show',  
        valueField : '#hide', 
        width:150, 
        children : [tree]
	});
	**/
	var picker_types = new Picker.ListPicker({
		trigger : '#show',  
        valueField : '#hide',
        width:150,
        children : [tree]
	});
    picker_types.render();
	
	var columns = [
		{
			width:50,
			dataIndex: 'a',
			editor:{
				xtype: 'plain',
				listeners : {
					'click' : select_caiwu
				}
			},
			renderer : function(){
				return '<i class="icon-plus"></i>'
			}
		},
		{
			dataIndex: 'cw_id',
			editor: {
				xtype: 'hidden'
			}
		},
		{
			title: '内容摘要选择',
			width:'180',
			dataIndex: 'cw_types'
		},
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
	var editing = new Grid.Plugins.CellEditing({
		triggerSelected : false //触发编辑的时候不选中行
	}),
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
		plugins : [editing,Grid.Plugins.Summary],
		//plugins : [editing,Grid.Plugins.CheckSelection,Grid.Plugins.Summary],
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
	//财务对接dialog
	var s_dialog = new Overlay.Dialog({
		title: '财务备注',
		width:420,
        height:280,
		contentId:'content',
		success: function(){
			var id = picker_types.getSelectedValue();
			var text = picker_types.getSelectedText();
			this.close();
		}
	});
	function select_caiwu(){
		s_dialog.show();
	}
});
</script>
@endsection