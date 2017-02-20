@extends('layouts.uikit')

@section('css')
<link href="{{ asset('static/bui/css/bs3/dpl.css') }}" rel="stylesheet">
<link href="{{ asset('static/bui/css/bs3/bui.css') }}" rel="stylesheet">
@endsection

@section('content')
	<h1>bui grid</h1>
	<div class="uk-grid">
		<div class="uk-width-4-6 uk-container-center">
			<div id="grid"></div>
		</div>
		<div class="uk-width-4-6 uk-container-center">
			<div id="bar"></div>
		</div>
	</div>
@endsection

@section('script')
<script src="{{ asset('static/bui/seed-min.js') }}"></script>
<script type="text/javascript">
	BUI.use(['bui/grid','bui/data','bui/toolbar','bui/mask'],function(Grid,Data,Toolbar,Mask){
            var Grid = Grid,
          Store = Data.Store,
          columns = [
			{title : 'ID',dataIndex :'id', width:80},
            {title : '用户姓名',dataIndex :'name', width:160},
            {title : '电子邮件',dataIndex :'email', width:180},
            {title : '地址',dataIndex : 'address',width:200}
          ];
 
        /**
         * 自动发送的数据格式：
         *  1. start: 开始记录的起始数，如第 20 条,从0开始
         *  2. limit : 单页多少条记录
         *  3. pageIndex : 第几页，同start参数重复，可以选择其中一个使用
         *
         * 返回的数据格式：
         *  {
         *     "rows" : [{},{}], //数据集合
         *     "results" : 100, //记录总数
         *     "hasError" : false, //是否存在错误
         *     "error" : "" // 仅在 hasError : true 时使用
         *   }
         * 
         */
        var store = new Store({
            url : '{{ URL::to('bui/gridJson') }}',
            autoLoad:true, //自动加载数据
			
		    //params : { //配置初始请求的参数
              //a : 'a1',
              //b : 'b1'
            //},
            pageSize:10	// 配置分页数目
          }),
        //simpleGrid
//         grid = new Grid.SimpleGrid({
//             render: '#grid',
//             columns: columns,
//             store: store,
//             loadMask: true,
//             innerBorder : false,
//             tableCls:'uk-table uk-table-bordered uk-table-striped'
//         });
          grid = new Grid.Grid({
            render:'#grid',
            columns : columns,
            loadMask: true, //加载数据时显示屏蔽层
			store: store,
			//plugins : [Grid.Plugins.RadioSelection]
			plugins : [Grid.Plugins.CheckSelection]
            // 底部工具栏
            //bbar:{
                // pagingBar:表明包含分页栏
                //pagingBar:true
           // }
          });
		var bar = new Toolbar.NumberPagingBar({
          render : '#bar',
          elCls : 'pagination pull-right',
          store : store
        });
        bar.render();
        grid.render();
	});
</script>
@endsection