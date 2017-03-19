@extends('layouts.uikit')

@section('css')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('content')
	<div id="app">
		<div class="grid">
			<div class="uk-width-4-5 uk-container-center">
				<data-viewer source="/vue/api" title="Data组件" />
			</div>
		</div>
	</div>
@endsection

@section('script')
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">

</script>
@endsection