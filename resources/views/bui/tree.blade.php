@extends('layouts.uikit')

@section('css')
<link href="{{ asset('static/bui/css/bs3/dpl.css') }}" rel="stylesheet">
<link href="{{ asset('static/bui/css/bs3/bui.css') }}" rel="stylesheet">
<link href="{{ asset('static/uikit/css/components/slideshow.css') }}" rel="stylesheet">
<link href="{{ asset('static/uikit/css/components/slidenav.almost-flat.min.css') }}" rel="stylesheet">
<link href="{{ asset('static/uikit/css/components/dotnav.almost-flat.min.css') }}" rel="stylesheet">
@endsection

@section('content')	
	<div class="uk-grid">
		<div class="uk-width-medium-2-5 uk-container-center">
			<div class="uk-slidenav-position" data-uk-slideshow>
				<ul class="uk-slideshow">
					<li><img src="/uploads/001.jpg" width="480" height="240" alt=""></li>
					<li><img src="/uploads/002.jpg" width="480" height="240" alt=""></li>
					<li><img src="/uploads/003.jpg" width="480" height="240" alt=""></li>
				</ul>
				<a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous" style="color: rgba(255,255,255,0.4)"></a>
				<a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next" style="color: rgba(255,255,255,0.4)"></a>
				<ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
					<li data-uk-slideshow-item="0"><a href="#">Item 1</a></li>
					<li data-uk-slideshow-item="1"><a href="#">Item 2</a></li>
					<li data-uk-slideshow-item="2"><a href="#">Item 3</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="uk-grid">
		<div class="uk-width-1-4">
			<h1>bui tree</h1>
			<div id="tree"></div>
			<h2>点击的节点</h2>
			<div class="result"></div>
		</div>
	</div>
@endsection

@section('script')
<script src="{{ asset('static/uikit/js/components/slideshow.js') }}"></script>
<script src="{{ asset('static/uikit/js/components/slideshow-fx.js') }}"></script>
<script src="{{ asset('static/bui/seed-min.js') }}"></script>
<script type="text/javascript">
BUI.use('bui/tree',function (Tree) {
        
      //树节点数据，
      //text : 文本，
      //id : 节点的id,
      //leaf ：标示是否叶子节点，可以不提供，根据childern,是否为空判断
      //expanded ： 是否默认展开
	var data = {!! $json !!};
    //由于这个树，不显示根节点，所以可以不指定根节点
    var tree = new Tree.TreeList({
        render : '#tree',
		checkType: 'onlyLeaf', //checkType:勾选模式，提供了4中，all,onlyLeaf,none,custom
        //nodes : data
		root : { //由于要显示根节点，所以需要配置根节点
          id : '-1',
          text : 'xxx公司',
          expanded : true,
          children : data
        },
		showRoot : true
    });
    tree.render();
	/*
	tree.on('itemclick',function(ev){
        var item = ev.item;
        $('.result').text(item.text);
	});
	*/
	tree.on('checkedchange',function(ev){
		var checkedNodes = tree.getCheckedNodes();
		var str = '';
		BUI.each(checkedNodes,function(node){
			str += node.id + ',';
		});
		$('.result').text(str);
	});
});
</script>
@endsection