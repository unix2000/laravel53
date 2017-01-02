@extends('layouts.zui')

@section('style')
	<link href="/static/zui/lib/datatable/zui.datatable.min.css" rel="stylesheet">
@stop
@section('content')

	<div class="row">
		<div class="col-md-3 col-md-offset-2">
			<ul class="tree tree-folders" data-ride="tree" id="myTree"></ul>
		</div>
		<div class="col-md-7">
			<div class="datatable" data-checkable="true" data-sortable="true"></div>
		</div>
	</div>
@stop

@section('script')
	<script src="/js/hello.js"></script>
	<script src="/static/zui/lib/datatable/zui.datatable.min.js"></script>
	<script>
		$('div.datatable').datatable({
			// checkable: true,
			data: {
		        cols: [
			        {width: 80, text: '#', type: 'number', flex: false, colClass: 'text-center'},
			        {width: 260, text: '时间', type: 'date', flex: true, sort: 'down'},
			        {width: 80, text: '名称', type: 'string', flex: true, colClass: ''}
			    ],

		        rows: [
		            {checked: false, data: [1, '2016-01-18 11:05:15', '名称示例1']},
		            {checked: false, data: [2, '2016-01-20 12:06:16', '名称示例2']},
		            {checked: false, data: [3, '2016-01-22 13:06:16', '名称示例3']},
		        ]
		    }
		});

		var myTreeData = [{
		    title: '水果',
		    url: 'http://zui.sexy',
		    open: true,
		    children: [
		        {title: '橘子'},
		        {
		            title: '瓜',
		            children: [
		              {title: '西瓜'},
		              {title: '黄瓜'}
		            ]
		        }
		    ]
		}, {
		    title: '坚果',
		    children: [
		        {title: '向日葵'},
		        {title: '瓜子'}
		    ]
		}, {
		    title: '蔬菜'
		}];

		$('#myTree').tree({data: myTreeData});
	</script>
@stop