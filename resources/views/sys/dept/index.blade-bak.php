@extends('layouts.uikit')

@section('css')
<link href="{{ asset('static/bui/css/bs3/dpl.css') }}" rel="stylesheet">
<link href="{{ asset('static/bui/css/bs3/bui.css') }}" rel="stylesheet">
@endsection

@section('content')
	<div class="uk-grid">
		<div class="uk-width-1-4">
			<h1>部门管理</h1>
			<div id="tree"></div>
		</div>
		<div class="uk-width-3-4">
			<form id="d_form" class="uk-form">
				<div class="uk-form-row">
					<div class="uk-grid">
						{{ csrf_field() }}
						<div class="uk-width-1-5">
							<lable>编号：</lable>
						</div>
						<div class="uk-width-4-5">
							<input type="text" name="dept_no" class="uk-form-large" datatype="*" nullmsg="请输入编号"  aria-required="true" />
						</div>
					</div>
				</div>
				<div class="uk-form-row">
					<div class="uk-grid">
						<div class="uk-width-1-5">
							<lable>部门名称：</lable>
						</div>
						<div class="uk-width-4-5">
							<input type="text" name="dept_name" class="uk-form-large" datatype="*" nullmsg="请输入部门名称"  aria-required="true" />
						</div>
					</div>
				</div>
				<div class="uk-form-row">
					<div class="uk-grid">
						<div class="uk-width-1-5">
							<lable>上级部门：</lable>
						</div>
						<div class="uk-width-4-5">
							<input type="text" name="dept_parent" class="uk-form-large" datatype="*" nullmsg="请选择上级部门" aria-required="true" />
							<button id="dept_select" class="uk-button uk-button-primary">选择部门</button>
						</div>
					</div>
				</div>
				<div class="uk-form-row">
					<button class="uk-button uk-button-primary">提交</button>
				</div>
			</form>
		</div>
	</div>
@endsection

@section('script')
<script src="{{ asset('static/bui/seed-min.js') }}"></script>
<script src="{{ asset('static/validform/Validform.min.js') }}"></script>
<script type="text/javascript">
$("#d_form").Validform({
	tiptype:3
});

BUI.use(['bui/tree','bui/overlay'],function (Tree,Overlay) {
	var data = {!! $json !!};
    var tree = new Tree.TreeList({
        render : '#tree',
		checkType: 'none', //checkType:勾选模式，提供了4中，all,onlyLeaf,none,custom
        //nodes : data
		root : {
          id : '-1',
          text : 'xxx公司',
          expanded : true,
          children : data
        },
		showRoot : true
    });
    tree.render();
	
	var select_dialog = new Overlay.Dialog({
		title: '选择部门',
		 width:360,
         height:320
	});
	$('#dept_select').on('click',function () {
		select_dialog.show();
	});
	/*
	tree.on('itemclick',function(ev){
        var item = ev.item;
        $('.result').text(item.text);
	});
	*/
});
</script>
@endsection