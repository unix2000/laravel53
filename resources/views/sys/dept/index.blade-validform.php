@extends('layouts.uikit')

@section('css')
<link href="{{ asset('static/bui/css/bs3/dpl.css') }}" rel="stylesheet">
<link href="{{ asset('static/bui/css/bs3/bui.css') }}" rel="stylesheet">
<link href="//cdn.bootcss.com/toastr.js/2.1.3/toastr.min.css" rel="stylesheet">
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
							<input type="text" id="show" class="uk-form-large" datatype="*" nullmsg="请选择上级部门" aria-required="true" />
							<input type="text" id="dept_parent" value="" name="dept_parent">
						</div>
					</div>
				</div>
				<div class="uk-form-row">
					<button class="uk-button uk-button-primary ajax-commit">提交</button>
				</div>
			</form>
		</div>
	</div>
@endsection

@section('script')
<script src="{{ asset('static/bui/seed-min.js') }}"></script>
<script src="{{ asset('static/validform/Validform.min.js') }}"></script>
<script src="//cdn.bootcss.com/toastr.js/2.1.3/toastr.min.js"></script>
<script type="text/javascript">
/**
$("#d_form").Validform({
	tiptype:3,
	//postonce:true,
	ajaxPost:true,
	callback: function(data) {
		if (data.status == 1) {
			toastr.success('success!', '添加成功');			
		}
	}
});
**/
var s = $('#d_form').Validform({
	//tiptype:3,
	//ignoreHidden:true,
	/**
	callback: function(data) {
		toastr.success('success!', '添加成功');
	} **/
});
s.config({
	tiptype:3,
	ignoreHidden:true,
	callback: function(data) {
		if (data.message == 'success' && data.status == 200) {
			toastr.success('success!', '添加成功');
		} else if (data.status == 500) {
			toastr.error('error!', '服务器错误');
		}
	}
});

//todo 
//ajax commit box友好
//通用ajax提交方式 common.js
//整合vue-element ui 2.0
$(".ajax-commit").click(function(){
	//flag为true时，跳过验证直接提交，sync为true时将以同步的方式进行ajax提交
	//ajaxPost(flag,sync,url) //返回值：Validform
	var ajax_form = s.ajaxPost();
	//s.check(true); //仅验证不显示信息
	//console.log(ajax_form);
	if (s.getStatus() == 'posted') {
		//tree no refresh todo
		toastr.success('success!', '添加成功');
	}
	alert(s.getStatus());
	//s.eq(0).resetForm(); //第一个元素
	s.resetForm();
	return false;
});


BUI.use(['bui/picker','bui/tree','bui/data'],function (Picker,Tree,Data) {
	var data = {!! $json !!};
	var store = new Data.TreeStore({
		data : data,
        autoLoad : true
	});
	var tree_a = new Tree.TreeList({
		//nodes : data,
        store : store,
        //dirSelectable : false,//阻止树节点选中
        showLine : true //显示连接线
	});
	//左边
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
	tree.on('itemclick',function(ev){
        var item = ev.item;
		alert(item.id);
        alert(item.text);
	});
	var picker = new Picker.ListPicker({
		trigger : '#show',  
		valueField : '#dept_parent',
        width:150, 
		height:180,
        children : [tree_a]
	});
    picker.render();
});
</script>
@endsection