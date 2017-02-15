@extends('layouts.uikit')

@section('css')
<link href="{{ asset('static/easyui/themes/bootstrap/easyui.css') }}" rel="stylesheet">
<link href="{{ asset('static/easyui/themes/icon.css') }}" rel="stylesheet">
<link href="{{ asset('static/validator/dist/jquery.validator.css') }}" rel="stylesheet">
@endsection

@section('content')
	<div class="uk-grid">
		<div class="uk-width-1-5">
			<div class="uk-grid">
				<ul class="easyui-tree">					
					<li iconCls="icon-layout"><span>Layout</span>
						<ul>
							<li iconCls="icon-gears"><a href="#" onclick="opentab('panel')">panel</a></li>
							<li iconCls="icon-gears"><a href="#" onclick="opentab('accordion')">accordion</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<div class="uk-width-4-5">
			<div id="tabs" class="easyui-tabs" fit="false" border="true" plain="true">
				<div title="welcome" href="{{ URL::to('easyui/welcome') }}" class="uk-article"></div>
			</div>
		</div>
	</div>
@endsection

@section('script')
<script src="{{ asset('static/validator/dist/jquery.validator.min.js') }}"></script>
<script src="{{ asset('static/validator/dist/local/zh-CN.js') }}"></script>
<script src="{{ asset('static/easyui/jquery.easyui.min.js') }}"></script>
<script type="text/javascript">
	function opentab(plugin){
		if ($('#tabs').tabs('exists',plugin)){
			$('#tabs').tabs('select', plugin);
		} else {
			$('#tabs').tabs('add',{
				title:plugin,
				href:'/easyui/'+ plugin,
				closable:true
			});
		}
	}
	$('form').submit(function(){
		var self = $(this);
        var validator = self.validator();
        alert(validator.isValid());
        if (!validator.isValid())
            return false;
	});
</script>
@endsection