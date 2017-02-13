@extends('layouts.uikit')

@section('css')
<link href="{{ asset('static/jquery-ui/themes/smoothness/jquery-ui.css') }}" rel="stylesheet">
<link href="{{ asset('static/fancytree/skin-lion/ui.fancytree.css') }}" rel="stylesheet">
<style>
.customer {
	width: 360px;
	height: 320px;
	overflow: auto;
}
</style>
@endsection

@section('content')
	<div class="uk-grid">
		<h1>fancytree分类树</h1>
	</div>
	<div class="uk-grid">
		<div class="uk-width-1-3">			
			<div id="fancytree" class="customer"></div>
		</div>
		<div class="uk-width-2-3">
			<div>Selected keys: <span id="echoSelection3">-</span></div>
			<div>Selected root keys: <span id="echoSelectionRootKeys3">-</span></div>
			<div>Selected root nodes: <span id="echoSelectionRoots3">-</span></div>
		</div>
	</div>
@endsection

@section('script')
<script src="{{ asset('static/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('static/fancytree/jquery.fancytree-all.min.js') }}"></script>
<script type="text/javascript">
	$('#fancytree').fancytree({
		source: {!! $json !!},
		checkbox: true,
		selectMode: 1,
		select: function(event, data) {
			var selKeys = $.map(data.tree.getSelectedNodes(), function(node){
				return node.key;
			});
			$("#echoSelection3").text(selKeys.join(", "));

			// Get a list of all selected TOP nodes
			var selRootNodes = data.tree.getSelectedNodes(true);
			// ... and convert to a key array:
			var selRootKeys = $.map(selRootNodes, function(node){
				return node.key;
			});
			$("#echoSelectionRootKeys3").text(selRootKeys.join(", "));
			$("#echoSelectionRoots3").text(selRootNodes.join(", "));			
		},
		"extensions":["dnd"],
		"dnd":{
			"preventVoidMoves":true,
			"preventRecursiveMoves":true,
			"autoExpandMS":400,
			"dragStart":function(node, data) {
				return true;
			},
			"dragEnter":function(node, data) {
				return true;
			},
			"dragDrop":function(node, data) {
				data.otherNode.moveTo(node, data.hitMode);
			}
		}
	});
</script>
@endsection