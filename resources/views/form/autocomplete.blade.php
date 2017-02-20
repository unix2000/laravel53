@extends('layouts.uikit')

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
	<h1>form autocomplete</h1>
	<div class="uk-grid">
		<div class="uk-width-1-3 uk-container-center">
			<select class="itemName uk-form-large" style="width:320px;" name="itemName"></select>
		</div>
	</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
	$('.itemName').select2({
        placeholder: '请选择',
        ajax: {
          url: '/form/dataAjax',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results:  $.map(data, function (item) {
                    return {
                        text: item.name,
                        id: item.id
                    }
                })
            };
          },
          cache: true
        }
	});
</script>
@endsection