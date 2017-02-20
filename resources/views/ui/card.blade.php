@extends('layouts.uikit')

@section('css')
<link href="{{ asset('static/uikit/css/components/slider.almost-flat.min.css') }}" rel="stylesheet">
<link href="{{ asset('static/uikit/css/components/slideshow.almost-flat.min.css') }}" rel="stylesheet">
<link href="{{ asset('static/uikit/css/components/slidenav.almost-flat.min.css') }}" rel="stylesheet">
<link href="{{ asset('static/uikit/css/components/dotnav.almost-flat.min.css') }}" rel="stylesheet">
<style>

</style>
@endsection

@section('content')	
	<div class="uk-grid uk-grid-match" data-uk-grid-match="{target:'.uk-panel'}" data-uk-grid-margin>
		<div class="uk-width-medium-1-3">
			<div class="uk-panel uk-panel-box">panel 1.</div>
		</div>
		<div class="uk-width-medium-1-3">
			<div class="uk-panel uk-panel-box">panel 2.</div>
		</div>
		<div class="uk-width-medium-1-3">
			<div class="uk-panel uk-panel-box">panel 3.</div>
		</div>
	</div>
@endsection

@section('script')
<script src="{{ asset('static/uikit/js/components/slider.min.js') }}"></script>
<script src="{{ asset('static/uikit/js/components/slideshow.min.js') }}"></script>
<script src="{{ asset('static/uikit/js/components/slideshow-fx.min.js') }}"></script>
<script type="text/javascript">

</script>
@endsection