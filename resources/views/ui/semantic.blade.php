@extends('layouts.uikit')

@section('css')
<link href="{{ asset('static/ui/semantic.min.css') }}" rel="stylesheet">
@endsection

@section('content')
	<div class="uk-grid">
		<h1>semantic ui</h1>
	</div>
	<div class="uk-grid">
		<div class="uk-width-3-5 uk-container-center">
			<div class="ui steps">
			  <div class="ui step">
				Shipping
			  </div>
			  <div class="ui active step">
				Billing
			  </div>
			  <div class="ui disabled step">
				Confirm Order
			  </div>
			  <div class="ui disabled step">
				Complete
			  </div>
			</div>
		</div>
	</div>
	
	<div class="ui grid">
	  <div class="column">1</div>
	  <div class="column">2</div>
	  <div class="column">3</div>
	  <div class="column">4</div>
	  <div class="column">5</div>
	  <div class="column">6</div>
	  <div class="column">7</div>
	  <div class="column">8</div>
	  <div class="column">9</div>
	  <div class="column">10</div>
	  <div class="column">11</div>
	  <div class="column">12</div>
	  <div class="column">13</div>
	  <div class="column">14</div>
	  <div class="column">15</div>
	  <div class="column">16</div>
	</div>
	
	<div class="ui red inverted menu">
	  <a class="active item">
		<i class="home icon"></i> Home
	  </a>
	  <a class="item">
		<i class="mail icon"></i> Messages
	  </a>
	  <a class="item">
		<i class="user icon"></i> Friends
	  </a>
	</div>

	<div class="ui labeled icon menu">
	  <a class="red item"><i class="mail icon"></i>Mail</a>
	  <a class="teal item"><i class="lab icon"></i>Lab</a>
	  <a class="green item"><i class="star icon"></i>Favorites</a>
	</div>

	<div class="ui top attached tabular menu">
	  <a class="item active" data-tab="first">First</a>
	  <a class="item" data-tab="second">Second</a>
	  <a class="item" data-tab="third">Third</a>
	</div>
	<div class="ui bottom attached tab segment active" data-tab="first">
	  First
	</div>
	<div class="ui bottom attached tab segment" data-tab="second">
	  Second
	</div>
	<div class="ui bottom attached tab segment" data-tab="third">
	  Third
	</div>
@endsection

@section('script')
<script src="{{ asset('static/ui/semantic.min.js') }}"></script>
<script type="text/javascript">
  $('.menu .item').tab();
</script>
@endsection