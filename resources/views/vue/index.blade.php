@extends('layouts.vue')

@section('content')
	<p>@{{ message }}</p>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<table class="table table-striped">
				<tr>
					<td>ID</td>
					<td>书名</td>
					<td>作者</td>
					<td>价格</td>
				</tr>
				<tr v-for="book in books">
					<td>@{{book.id}}</td>
					<td>@{{book.name}}</td>
					<td>@{{book.author}}</td>
					<td>@{{book.price}}</td>
				</tr>	
			</table>
		</div>
	</div>
@stop

@section('script')
	new Vue({
		el:'#app',
		data:{
			"message": "{{$message}}",
			"books": [
				{
					"id": 1,
					"author": "曹雪芹",
					"name": "红楼梦",
					"price": 32
				},
				{
					"id": 2,
					"author": "施耐庵",
					"name": "水浒传",
					"price": 30
				},
				{
					"id": "3",
					"author": "罗贯中",
					"name": "三国演义",
					"price": 24
				},
				{
					"id": 4,
					"author": "吴承恩",
					"name": "西游记",
					"price": 20
				}
			]
		}
	});
@stop