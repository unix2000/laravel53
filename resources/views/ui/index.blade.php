@extends('layouts.zui')

@section('style')
	{!! Charts::assets() !!}
@stop
@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			{!! $chart->render() !!}				
		</div>	
	</div> 
@stop