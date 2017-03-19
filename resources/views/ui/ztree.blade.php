@extends('layouts.uikit')
@section('css')
<link href="{{ asset('static/ztree/css/zTreeStyle/zTreeStyle.css') }}" rel="stylesheet">
<link href="//cdn.bootcss.com/toastr.js/2.1.3/toastr.min.css" rel="stylesheet">
@endsection

@section('content')
	<div class="uk-grid">
		<div class="uk-width-1-3">
			<h1>企业组织结构树</h1>
			<div id="ztree" class="ztree"></div>
		</div>
		<div class="uk-width-2-3">
			<div data-toggle="distpicker">
				<select data-province="---- 选择省 ----"></select>
				<select data-city="---- 选择市 ----"></select>
				<select data-district="---- 选择区 ----"></select>
			</div>
		</div>
	</div>
@endsection

@section('script')
<script src="//cdn.bootcss.com/toastr.js/2.1.3/toastr.min.js"></script>
<script src="{{ asset('static/ztree/js/jquery.ztree.all.min.js') }}"></script>
<script src="{{ asset('static/distpicker.min.js') }}"></script>
<script type="text/javascript">
	var setting = {
		view: {
			//addHoverDom: addHoverDom,
			//removeHoverDom: removeHoverDom,
			//selectedMulti: false
			showLine: false
		},
		check: {
			enable: true,
			chkStyle: "radio"
		},
		data: {
			simpleData: {
				enable: true
			}
		},
		callback: {
			onClick: zTreeOnClick
		}
	};

	var zNodes = {!! $data !!};

	$(document).ready(function(){
		//toastr
		toastr.options = {
		  "closeButton": true,
		  "debug": false,
		  "positionClass": "toast-top-right",
		  "onclick": null,
		  "showDuration": "1000",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		};
		toastr.success('success!', '参数');
		//toastr.warning('warning messages!');
		//toastr.error('error!', '参数!');
		//toastr.info('info!', '参数');
		//toastr.clear();
		$.fn.zTree.init($("#ztree"), setting, zNodes);
	});

	var newCount = 1;
	function addHoverDom(treeId, treeNode) {
		var sObj = $("#" + treeNode.tId + "_span");
		if (treeNode.editNameFlag || $("#addBtn_"+treeNode.tId).length>0) return;
		var addStr = "<span class='button add' id='addBtn_" + treeNode.tId
			+ "' title='add node' onfocus='this.blur();'></span>";
		sObj.after(addStr);
		var btn = $("#addBtn_"+treeNode.tId);
		if (btn) btn.bind("click", function(){
			var zTree = $.fn.zTree.getZTreeObj("ztree");
			zTree.addNodes(treeNode, {id:(100 + newCount), pId:treeNode.id, name:"new node" + (newCount++)});
			return false;
		});
	};
	function removeHoverDom(treeId, treeNode) {
		$("#addBtn_"+treeNode.tId).unbind().remove();
	};
	function zTreeOnClick(event, treeId, treeNode) {
		//alert(treeNode.tId + ", " + treeNode.name);
		alert(treeNode.id + ", " + treeNode.name);
	};
</script>
@endsection