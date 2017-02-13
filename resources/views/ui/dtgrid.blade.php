@extends('layouts.vue')

@section('css')
<link rel="stylesheet" type="text/css" href="/static/grid/dlshouwen.grid.min.css">
<style>  
/**
.col-center {  
	margin-left: auto;  
    margin-right: auto;
	display: block; 
    float: none;      
}  
**/
</style>  
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div id="grid" class="dlshouwen-grid-container"></div>
			<div id="toolbar" class="dlshouwen-grid-toolbar-container"></div>
		</div>
	</div>
@endsection

@section('script')
<script src="/static/grid/dlshouwen.grid.min.js"></script>
<script src="/static/grid/i18n/zh-cn.js"></script>
<script type="text/javascript">
	var gridColumns = [
		{id:'id', title:'用户编号', type:'string', columnClass:'text-center', fastQuery:true, fastQueryType:'eq'},
		{id:'name', title:'用户姓名', type:'string', columnClass:'text-center', fastQuery:true, fastQueryType:'lk'},
		{id:'email', title:'Email', type:'string', columnClass:'text-center', hideType:'xs', fastQuery:true, fastQueryType:'range'},
		{id:'address', title:'地址', type:'string', columnClass:'text-center', hideType:'sm|xs', fastQuery:true, fastQueryType:'eq'},
	];
	var gridOption = {
		lang : 'zh-cn',
		ajaxLoad : true,
		// loadAll : true,
		loadURL : '/ui/get-datas',
		exportFileName : '数据列表',
		// datas : datas,
		check : true,
		columns : gridColumns,
		pageSize : 10,
		pageSizeLimit : [10, 20, 50],
		gridContainer : 'grid',
		toolbarContainer : 'toolbar'
	};
	var grid = $.fn.dlshouwen.grid.init(gridOption);
	$(function(){
		//grid.parameters = new Object();
		//grid.parameters['X-CSRF-TOKEN'] = '{{ csrf_token() }}';
		grid.load();
	});
</script>
@endsection