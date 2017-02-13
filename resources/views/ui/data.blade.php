@foreach($datas as $v)
<div>
	<h3><a href="">{{ $v->name }}</a></h3>
	<p>{{ str_limit($v->address, 400) }}</p>

	<div class="text-right">
		<button class="btn btn-success">Read More</button>
	</div>

	<hr style="margin-top:5px;">
</div>
@endforeach