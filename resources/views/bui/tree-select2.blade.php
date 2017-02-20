@extends('layouts.uikit')

@section('css')
<link href="{{ asset('static/bui/css/bs3/dpl.css') }}" rel="stylesheet">
<link href="{{ asset('static/bui/css/bs3/bui.css') }}" rel="stylesheet">
@endsection

@section('content')
	<div class="uk-grid">
		<div class="uk-width-2-5 uk-container-center">
			<input type="text" id="show" name="show">
			<input type="text" id="hide" value="4" name="hide">
		</div>
	</div>
@endsection

@section('script')
<script src="{{ asset('static/bui/seed-min.js') }}"></script>
<script type="text/javascript">
BUI.use(['bui/extensions/treepicker','bui/tree','bui/data'],function(TreePicker,Tree,Data){
     
      //树节点数据，
      //text : 文本，
      //id : 节点的id,
      //leaf ：标示是否叶子节点，可以不提供，根据childern,是否为空判断
      //expanded ： 是否默认展开
    var data = {!! $json !!},
      /**/
      store = new Data.TreeStore({
          data : data,
          autoLoad : true/**/
        }),
	//由于这个树，不显示根节点，所以可以不指定根节点
    tree = new Tree.TreeList({
		//nodes : data,
        store : store,
        //dirSelectable : false,//阻止树节点选中
        showLine : true //显示连接线
	});
 
    var picker = new TreePicker({
		trigger : '#show',  
		valueField : '#hide', //如果需要列表返回的value，放在隐藏域，那么指定隐藏域
        width:150,  //指定宽度
        children : [tree] //配置picker内的列表
	});
    picker.render();
});
</script>
@endsection