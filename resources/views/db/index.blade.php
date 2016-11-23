@extends('layouts.zui')

@section('style')
	<link href="/static/zui/lib/datatable/zui.datatable.min.css" rel="stylesheet">
@stop
@section('content')
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="form-group">
			    <label>验证码</label>
			    <input class="form-control" name="captcha">
			    <img src="{{captcha_src('flat')}}">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<table class="table datatable">
				<thead>
					<tr>
				    	<th>ID</th>
				      	<th>名字</th>
				      	<th>电子邮件</th> 
				      	<th>联系地址</th>
				    </tr>
				</thead>
				<tbody>
					@foreach ($data as $i)
					<tr>
						<td>{{ $i->id }}</td>
						<td>{{ $i->name }}</td>
						<td>{{ $i->email }}</td>
						<td>{{ $i->address }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{-- <ul>
				@foreach ($data as $i)
				<li>{{ $i->id }} --- {{ $i->name }} --- {{ $i->email }} --- {{ $i->address }}</li>
				@endforeach
			</ul> --}}
		</div>
		<div class="row pull-right">
			{{ $data->links() }}
		</div>
	</div>
@stop

@section('script')
	<script src="/static/zui/lib/datatable/zui.datatable.min.js"></script>
	<script>
		$('table.datatable').datatable({
			checkable: true
		});
	</script>
@stop