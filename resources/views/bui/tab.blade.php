@extends('layouts.uikit')

@section('css')
<link href="{{ asset('static/bui/css/bs3/dpl.css') }}" rel="stylesheet">
<link href="{{ asset('static/bui/css/bs3/bui.css') }}" rel="stylesheet">
<link href="{{ asset('static/validator/dist/jquery.validator.css') }}" rel="stylesheet">
@endsection

@section('content')
	<div class="uk-grid">
		<ul class="uk-navbar-nav">
			<li class="uk-active" >
				<a href="/">首页</a>				
			</li>
			<li>
				<a href="/product">企业产品</a>			
			</li>
			<li>
				<a href="/enterprise">企业服务</a>				
			</li>
			<li>
				<a href="/service">客户服务</a>				
			</li>
			<li>
				<a href="/about">关于我们</a>				
			</li>
			<li>
				<a href="/contact">联系我们</a>				
			</li>			
		</ul>
	</div>
	<div class="uk-grid">
		<div class="uk-width-2-5">
			<div id="tab"></div>
			<div id="panel" style="padding:10px;">
				<div>第一个面板</div>
				<div>第二个面板</div>
				<div>第三个面板</div>
			</div>
		</div>
		<div class="uk-width-1-5">
			<input type="text" id="J_Txt">
			<button class="uk-button uk-button-primary" id="J_Btn">更改标题</button>
		</div>
	</div>
@endsection

@section('script')
<script src="{{ asset('static/validator/dist/jquery.validator.min.js') }}"></script>
<script src="{{ asset('static/validator/dist/local/zh-CN.js') }}"></script>
<script src="{{ asset('static/bui/seed-min.js') }}"></script>
<script type="text/javascript">
BUI.use(['bui/tab','bui/mask'],function(Tab){
      
	var tab = new Tab.TabPanel({
		render : '#tab',
		elCls : 'nav-tabs',
		panelContainer : '#panel',//如果内部有容器，那么会跟标签项一一对应，如果没有会自动生成
		//selectedEvent : 'mouseenter',//默认为click,可以更改事件
		autoRender: true,
		children:[
			{title:'源代码',value:'1',selected : true},
			{title:'HTML',value:'2',panelContent : '<p>自定义内部信息</p>'},
			{title:'JS',value:'3',loader : {url : '{{ URL::to('easyui/panel') }}'}} //此处为ajax load get
		]
	});
	
	//tab.setSelected(tab.getItemAt(0));
	//更改选中的标题
	$('#J_Btn').on('click',function(){
		var txt = $('#J_Txt').val();
		if(txt){
			var item = tab.getSelected();
			item.set('title',txt);
		}
	});
 }); 
</script>
@endsection