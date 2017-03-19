@extends('layouts.vue')
@section('css')
<style type="text/css">
  	.ajax-load{
  		background: #e1e1e1;
		padding: 10px 0px;
		width: 100%;
  	}
</style>
@endsection
@section('content')
<div class="container">
	<h2 class="text-center">载入更多演示Ajax Load More</h2>
	<br/>
	<div class="col-md-12" id="post-data">
		@include('ui.data')
	</div>
</div>

<div class="ajax-load text-center" style="display:none">
	<p><img src="/static/images/loader.gif">载入更多</p>
</div>
@endsection

@section('script')
<script type="text/javascript">
	var page = 1;
	$(window).scroll(function() {
	    if($(window).scrollTop() + $(window).height() >= $(document).height()) {
	        page++;
	        loadMoreData(page);
	    }
	});

	function loadMoreData(page){
	  $.ajax({
            url: '?page=' + page,
            type: "get",
            beforeSend: function()
            {
                $('.ajax-load').show();
            }
        })
        .done(function(data)
        {
            if(data.html == ""){
                $('.ajax-load').html("No more records found");
                return;
            }
            $('.ajax-load').hide();
            $("#post-data").append(data.html);
        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
              alert('server not responding...');
        });
	}
</script>
@endsection