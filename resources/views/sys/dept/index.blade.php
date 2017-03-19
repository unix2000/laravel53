@extends('layouts.v3')

@section('css')
<link href="{{ asset('static/bui/css/bs3/dpl.css') }}" rel="stylesheet">
<link href="{{ asset('static/bui/css/bs3/bui.css') }}" rel="stylesheet">
<link href="//cdn.bootcss.com/toastr.js/2.1.3/toastr.min.css" rel="stylesheet">
<link href="{{ asset('static/validator/dist/jquery.validator.css') }}" rel="stylesheet">
<link href="{{ asset('static/ladda/ladda.min.css') }}" rel="stylesheet">
@endsection

@section('content')
	<div class="row">
		<div class="col-md-3">
			<h1><i class="fa fa-home fa-fw fa-1x" aria-hidden="true"></i>部门管理</h1>
			<div id="tree"></div>
		</div>
		<div class="col-md-6 col-md-offset-2">
			<form id="d_form" class="form-horizontal">
				<div class="form-group">
					<div class="row">
						{{ csrf_field() }}
						<input type="hidden" id="id" name="id" /> 	
						<lable class="control-label">编号：</lable>	
						<input type="text" id="dept_no" name="dept_no" class="form-control input-lg" data-rule="required" data-msg-required="请输入编号" />		
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<lable class="control-label">部门名称：</lable>
						<input type="text" id="dept_name" name="dept_name" class="form-control input-lg" data-rule="required" data-msg-required="请输入部门名称" />	
					</div>
				</div>
				<div class="form-group">
					<div class="row">	
						<lable class="control-label">上级部门：</lable>		
						<input type="text" id="show" class="form-control input-lg" data-rule="required" data-msg-required="请选择上级部门" readonly />
						<input type="hidden" id="dept_parent" value="0" name="dept_parent">	
					</div>
				</div>
				<div class="form-group">
					<button class="button button-primary ajax-commit ladda-button" data-color="green" data-style="expand-right" data-size="s">
						<span class="ladda-label" id="btn">提交</span>
					</button>
					<button id="r" type="button" class="uk-button uk-button-primary ladda-button" data-color="green" data-size="s">复位</button>
				</div>
			</form>
			
		</div>
	</div>
@endsection

@section('script')
<script src="{{ asset('static/bui/seed-min.js') }}"></script>
<script src="//cdn.bootcss.com/toastr.js/2.1.3/toastr.min.js"></script>
<script src="{{ asset('static/validator/dist/jquery.validator.min.js') }}"></script>
<script src="{{ asset('static/validator/dist/local/zh-CN.js') }}"></script>
<script src="{{ asset('static/ladda/spin.min.js') }}"></script>
<script src="{{ asset('static/ladda/ladda.min.js') }}"></script>
<script type="text/javascript">
/**
$('#d_form').submit(function(){
	var self = $(this);
    var validator = self.validator();
    alert(validator.isValid());
    if (!validator.isValid())
        return false;
}); **/

//Ladda.bind('.ajax-commit', { timeout: 2000 });
var la = Ladda.create(document.querySelector('.ajax-commit'));
// la.start();
// la.stop();
// la.toggle();
// la.isLoading();
// la.setProgress( 0-1 );
$('#d_form').validator({
	timely: 2,
	//theme:'yellow_right',
	valid: function(form) {
		//开始ajax提交button mask
		la.start();
		var me = this;
		me.holdSubmit();
		$.post("/sys/dept",$(form).serialize())
			.done(function(data) {
				alert('done');
			})
			.success(function(data) {  
				//me.destroy();
				//console.log(me);
				//me.validator("destroy");
				la.stop();
				//form里面不能有reset,否则报错
				$('#d_form')[0].reset();
				//document.getElementById("#d_form").reset(); 
				//console.log($('#d_form'));
				me.holdSubmit(false);
				if(data.u == 1 ) {
					toastr.success('success!', '更新成功');
					$('#btn').text('添加');

				} else {
					toastr.success('success!', '添加成功');
				}
				
			})
			.error(function() {  
				toastr.error('error!', '服务器内部错误');
			})
			.complete(function() { 
				//alert("complete"); 
			});
			
	}
});

BUI.use(['bui/picker','bui/tree','bui/data','bui/editor'],function (Picker,Tree,Data,Editor) {
	var data = {!! $json !!};
	var store = new Data.TreeStore({
		data : data,
        autoLoad : true
	});
	var tree_a = new Tree.TreeList({
		height:180,
		//nodes : data,
        store : store,
        //dirSelectable : false,//阻止树节点选中
        showLine : true //显示连接线
	});
	//左边
    var tree = new Tree.TreeList({
		height:320,
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
		//另外方式 ajax获取
		var item = ev.item;
		if ( item.id == '-1')
		{
			return false;
		}
		//alert(item.id);
        //alert(item.text);
		$('#id').val(item.id);  
		$('#dept_no').val(item.num);
		$('#dept_name').val(item.text);
		$('#dept_parent').val(item.pid);
		//alert(item.pid);
		//expanded选必须为true才能正常获取
		picker.setSelectedValue(item.pid);
		$('#btn').text('编辑');
	});
	$('#r').click(function(){
		$('#d_form')[0].reset();
		$('#btn').text('提交');
	});
	var picker = new Picker.ListPicker({
		trigger : '#show',  
		valueField : '#dept_parent',
        width:150, 
        children : [tree_a]
	});
    picker.render();
});
</script>
@endsection