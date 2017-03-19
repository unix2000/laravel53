@extends('layouts.v4')

@section('css')
<style>
	.sidebar {
		height:520px; 
		position: fixed;
		overflow:auto;
		/**overflow-y: visible; **/
	}
</style>
@endsection

@section('content')
	<div class="row">
        <div class="col-md-3">
			<div class="sidebar">
				<ol class="breadcrumb">
				  <li class="breadcrumb-item active">Home</li>
				</ol>
				<ol class="breadcrumb">
				  <li class="breadcrumb-item"><a href="#">Home</a></li>
				  <li class="breadcrumb-item active">Library</li>
				</ol>
				<ol class="breadcrumb">
				  <li class="breadcrumb-item"><a href="#">Home</a></li>
				  <li class="breadcrumb-item"><a href="#">Library</a></li>
				  <li class="breadcrumb-item active">Data</li>
				</ol>
			</div>
        </div>
		<div class="col-md-9">
			<form>
			  <fieldset disabled>
				<div class="form-group">
				  <label for="disabledTextInput">Disabled input</label>
				  <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input">
				</div>
				<div class="form-group">
				  <label for="disabledSelect">Disabled select menu</label>
				  <select id="disabledSelect" class="form-control">
					<option>Disabled select</option>
				  </select>
				</div>
				<div class="checkbox">
				  <label>
					<input type="checkbox"> Can't check this
				  </label>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			  </fieldset>
			</form>
			<h1>Nav tabs</h1>
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
			  <li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#home" role="tab">Home</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#profile" role="tab">Profile</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#messages" role="tab">Messages</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a>
			  </li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
			  <div class="tab-pane active" id="home" role="tabpanel">...home</div>
			  <div class="tab-pane" id="profile" role="tabpanel">...profile</div>
			  <div class="tab-pane" id="messages" role="tabpanel">...messages</div>
			  <div class="tab-pane" id="settings" role="tabpanel">...settings</div>
			</div>
			<h1>Jquery.marquee</h1>
			<div class="marquee">
				<div class="alert alert-success" role="alert">
				  <strong>Well done!</strong> You successfully read.
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
<script src="{{ asset('static/jQuery.marquee.min.js') }}"></script>
<script>
$(".marquee").marquee({direction:'left'});
</script>
@endsection