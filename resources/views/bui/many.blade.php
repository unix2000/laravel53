@extends('layouts.uikit')

@section('css')
<link href="{{ asset('static/bui/css/bs3/dpl.css') }}" rel="stylesheet">
<link href="{{ asset('static/bui/css/bs3/bui.css') }}" rel="stylesheet">
@endsection

@section('content')
	<div class="uk-grid">
		<div class="uk-width-3-5 uk-container-center">
			<form id ="J_Form" class="form-horizontal" method="post">
				<h2>产品采购单</h2>
				<div class="row">
					<div class="control-group span12">
						<label class="control-label"><s>*</s>其他信息：</label>
						<div class="controls">
							<input name="others" type="text" class="control-text" data-rules="{required:true}">
						</div>
					</div>
					<div class="control-group span12">
						<label class="control-label"><s>*</s>采购信息：</label>
						<div class="controls">
							<input name="anothers" type="text" class="control-text" data-rules="{required:true}">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="span21 offset3 control-row-auto">
						<div id="grid"></div>
						<input type="hidden" name="infos">
					</div>
				</div>
				<div class="row">
					<div class="form-actions offset3">
						<button type="submit" class="button button-primary">提交数据</button>
						<button type="reset" class="button button-primary">重置</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div id="content" class="hide">
		<div class="row">
			<div id="dialog_grid"></div>
		</div>		
	</div>
@endsection

@section('script')
<script src="{{ asset('static/bui/seed-min.js') }}"></script>
<script type="text/javascript">
BUI.use(['bui/grid','bui/data','bui/form','bui/overlay','bui/toolbar'],function (Grid,Data,Form,Overlay,Toolbar) {
	//dialog grid 定义
	var store_dialog = new Data.Store({
		url : '{{ URL::to('bui/gridJson') }}',
		autoLoad:true,
		pageSize:6	
	}),
	dialog_columns = [
		{title : 'ID',dataIndex :'id', width:50},
		{title : '用户姓名',dataIndex :'name', width:100},
		{title : '电子邮件',dataIndex :'email', width:150},
		{title : '地址',dataIndex : 'address',width:200}
	],
	dialog_grid = new Grid.Grid({
		render:'#dialog_grid',
		columns : dialog_columns,
		forceFit : true,
		loadMask: true,
		store: store_dialog,
		plugins : [Grid.Plugins.CheckSelection],
		tbar: {
						
		},
		bbar:{
			pagingBar:true
		}
	});
	/**
	var bar = new Toolbar.NumberPagingBar({
		render : '#bar',
		elCls : 'pagination pull-right',
		store : store_dialog
	});
	bar.render();
	**/
	dialog_grid.render();
	
	var tbar = dialog_grid.get('tbar'),
	searchBar = new Toolbar.Bar({
		elCls : 'pull-right',
		items:[
			{
				content : '<input type="text" name="name" id="search"/>'
			}, 
			{
				xclass: 'bar-item-button',
				btnCls : 'button button-small button-primary',
				text: '搜索',
				listeners: {
					'click': search
				}
			}
		]
	});
	tbar.addChild(searchBar);

	var columns = [{title : '产品名称',dataIndex :'name',width:180},
		{title : '产品单位',dataIndex :'unit',width:80},
		{title : '产品价格',dataIndex :'price',width:80},
		{title : '产品数量',dataIndex :'num',width:80,editor:{xtype:'number',rules:{required:true}}},
		{title : '产品总价',dataIndex : 'sums',width:80,summary : true}
	],
	//默认的数据
	data = [],
	store = new Data.Store({
		data:data
	}),
	editing = new Grid.Plugins.CellEditing(),
	dialog = new Overlay.Dialog({
		title: '选择产品',
		width:600,
        height:450,
		contentId:'content',
		success:function () {
			//alert('确认');
			//至少选择一个验证
			//根据需要生成相关json,与grid对象columns属性相对应
			var arr = dialog_grid.getSelection();
			//console.log(arr);
			var arr_new = [];
			arr.map(function(e,i,a){
				console.log(e);
				var obj = Object();
				obj.name = e.name;
				arr_new[i] = obj;
			});
			//console.log(arr_new);
			store.addAt(arr_new,0);
            this.close();
		}
	});
	grid = new Grid.Grid({
		render: '#grid',
		columns : columns,
        width : 520,
        forceFit : true,
        store : store,
		plugins : [editing,Grid.Plugins.CheckSelection,Grid.Plugins.Summary],
		tbar:{
			items : [
				{
					btnCls : 'button button-primary button-small',
					text : '<i class="icon-plus"></i>添加',
					listeners : {
						'click' : adds
					}
				},
				{
					btnCls : 'button button-primary button-small',
					text : '<i class="icon-remove"></i>删除',
					listeners : {
						'click' : dels
					}
				}
			]
		}
	})
	
	grid.render();
	function adds(){
		//Grid.Plugins.DialogEditing插件必须用form接收
		//var newData = {};
		//dialog.add(newData);
		
		//清空dialog_grid已选择项
		dialog_grid.clearSelection();
		dialog.show();
    }
    function dels(){
		var selections = grid.getSelection();
		store.remove(selections);
    }
	function search(){
		//var search = $('#search').val(); 
		alert();
		//ajax reload dialog_grid
	}
	var form = new Form.HForm({
		srcNode : '#J_Form'
    });
	form.render();
    var infos = form.getField('infos');
    form.on('beforesubmit',function(){
		var records = store.getResult();
		infos.set('value',BUI.JSON.stringify(records));
    });
});
</script>
@endsection