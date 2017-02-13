@extends('layouts.uikit')
@section('css')
<link href="{{ asset('static/ztree/css/zTreeStyle/zTreeStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
	<div class="uk-grid">
		<div class="uk-width-1-3">
			<h1>企业组织结构树</h1>
			<div id="ztree" class="ztree"></div>
		</div>
		<div class="uk-width-2-3"></div>
	</div>
@endsection

@section('script')
<script src="{{ asset('static/ztree/js/jquery.ztree.all.min.js') }}"></script>
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