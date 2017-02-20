@extends('layouts.uikit')

@section('css')
<link href="{{ asset('static/uikit/css/components/slider.almost-flat.min.css') }}" rel="stylesheet">
<link href="{{ asset('static/uikit/css/components/slideshow.almost-flat.min.css') }}" rel="stylesheet">
<link href="{{ asset('static/uikit/css/components/slidenav.almost-flat.min.css') }}" rel="stylesheet">
<link href="{{ asset('static/uikit/css/components/dotnav.almost-flat.min.css') }}" rel="stylesheet">
<style>
.uk-text-light {
   font-weight: 200 !important;
  }
.text-over .uk-text-large {
  text-transform: uppercase;
  letter-spacing: 2px;
  font-size:13px;
  font-weight: 500;
  
}
  
   .uk-slider-container ul.uk-slider > li {
    width: 60%;
    max-width: 880px;
    z-index: 1;
    overflow: hidden;
   }
   .uk-slider-container ul.uk-slider > li > .uk-overlay > .uk-overlay-panel {
    opacity: 0;
    -webkit-transition:opacity .7s 0.6s ease-in-out;
    transition:opacity .7s 0.6s ease-in-out;
   }
   .uk-slider-container ul.uk-slider > li > .uk-overlay > .uk-overlay-panel > .text-over > .uk-text-large {
    opacity: 0;
    -webkit-transform: translateY(50px);
    transform: translateY(50px);
    -webkit-transition:all .7s 1s cubic-bezier(.29,.99,.53,.97);
    transition:all .7s 1s cubic-bezier(.29,.99,.53,.97);
   }
   .uk-slider-container ul.uk-slider > li.uk-active > .uk-overlay > .uk-overlay-panel > .text-over > .uk-text-large {
    opacity: .7;
    -webkit-transform: translateY(0px);
    transform: translateY(0px);
    
   }
   .uk-slider-container ul.uk-slider > li > .uk-overlay > .uk-overlay-panel > .text-over > h1 {
    opacity: 0;
     font-size:48px;
    -webkit-transform: translateY(-50px);
    transform: translateY(-50px);
    -webkit-transition:all .7s 1s cubic-bezier(.29,.99,.53,.97);
    transition:all .7s 1s cubic-bezier(.29,.99,.53,.97);
   }
   .uk-slider-container ul.uk-slider > li.uk-active > .uk-overlay > .uk-overlay-panel > .text-over > h1 {
    opacity: 1;
    -webkit-transform: translateY(0px);
    transform: translateY(0px);
    
   }
   .uk-slider-container ul.uk-slider > li.uk-active .uk-overlay > .uk-overlay-panel {
    opacity: 1;
   }
   ul.uk-slider {
    width:100%;
   }
   .uk-slider-container ul.uk-slider > li > div {
    margin-left: 3%;
    margin-right: 3%;
   }
   .uk-slider > li > div > img {
   max-width: 100%;
   border: none;
   -webkit-filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0\'/></filter></svg>#grayscale");
   filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0\'/></filter></svg>#grayscale");
   -webkit-filter: grayscale(100%);
   filter: gray;
   opacity: .3;
   -webkit-transition:opacity .5s ease-in-out;
   transition:opacity .5s ease-in-out;
}
.uk-slider > li.uk-active > div > img {
   -webkit-filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'1 0 0 0 0, 0 1 0 0 0, 0 0 1 0 0, 0 0 0 1 0\'/></filter></svg>#grayscale");
   filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'1 0 0 0 0, 0 1 0 0 0, 0 0 1 0 0, 0 0 0 1 0\'/></filter></svg>#grayscale");
   -webkit-filter: grayscale(0%);
   filter: alpha(Opacity=100);
   opacity: 1;
}
.uk-overlay-background {
  background: rgba(0, 0, 0, 0.4);
}
@media (max-width: 760px) {
    .uk-slider-container ul.uk-slider > li > .uk-overlay > .uk-overlay-panel > .text-over > h1 {
     font-size: 18px;
     line-height: 1em;
     margin:0;
     padding:0;
    }
}
</style>
@endsection

@section('content')	
	<div class="uk-grid">
		<div class="uk-width-3-6 uk-container-center">
		<section id="siteContent" style="margin-top:35px">
			<div class="uk-slidenav-position" data-uk-slider="{center:true,threshold:6,autoplay:true,autoplayInterval:6000}">
			<div class="uk-slider-container">
			 <ul class="uk-slider">
			 <!-- slide -->
			  <li>
			   <div class="uk-overlay">
				<img src="http://cdn.home-designing.com/wp-content/uploads/2015/03/cream-bench-cover.png">
				<div class="uk-overlay-panel uk-overlay-background uk-flex uk-flex-center uk-flex-middle uk-text-center">
				 <div class="text-over">
				  <h1 class="uk-text-light">Donec facilis</h1>
				  <p class="uk-visible-large uk-text-large">Sed diam nonumy eirmod tempor invidunt</p>
				 </div>
				</div>
				
			   </div>
			  </li>
			  <!-- /slide -->
			 <!-- slide -->
			  <li>
			   <div class="uk-overlay">
				<img src="http://cdn.home-designing.com/wp-content/uploads/2015/03/custom-room-divider.png">
				<div class="uk-overlay-panel uk-overlay-background uk-flex uk-flex-center uk-flex-middle uk-text-center">
				 <div class="text-over">
				  <h1 class="uk-text-light">Phasellus vitae</h1>
				  <p class="uk-visible-large uk-text-large">Sed diam nonumy eirmod tempor invidunt</p>
				 </div>
				</div>
				
			   </div>
			  </li>
			  <!-- /slide -->
			 <!-- slide -->
			  <li>
			   <div class="uk-overlay">
				<img src="http://cdn.home-designing.com/wp-content/uploads/2015/03/pitched-roof-design.png">
				<div class="uk-overlay-panel uk-overlay-background uk-flex uk-flex-center uk-flex-middle uk-text-center">
				 <div class="text-over">
				  <h1 class="uk-text-light">Pellentesque habitant</h1>
				  <p class="uk-visible-large uk-text-large">Sed diam nonumy eirmod tempor invidunt</p>
				 </div>
				</div>
				
			   </div>
			  </li>
			  <!-- /slide -->

			  <!-- slide -->
			  <li>
			   <div class="uk-overlay">
				<img src="http://www.2014interiordesign.com/wp-content/uploads/2013/10/modern-interior.jpg">
				<div class="uk-overlay-panel uk-overlay-background uk-flex uk-flex-center uk-flex-middle uk-text-center">
				 <div class="text-over">
				  <h1 class="uk-text-light">Mauris ultrices</h1>
				  <p class="uk-visible-large uk-text-large">Sed diam nonumy eirmod tempor invidunt</p>
				 </div>
				</div>
				
			   </div>
			  </li>
			  <!-- /slide -->
			  <!-- slide -->
			  <li>
			   <div class="uk-overlay">
				<img src="http://static1.squarespace.com/static/552ba422e4b0bad8e30f7418/t/56baccaf2b8dde10567f0810/1446003649525/">
				<div class="uk-overlay-panel uk-overlay-background uk-flex uk-flex-center uk-flex-middle uk-text-center">
				 <div class="text-over">
				  <h1 class="uk-text-light">Phasellus diam</h1>
				  <p class="uk-visible-large uk-text-large">Sed diam nonumy eirmod tempor invidunt</p>
				 </div>
				</div>
				
			   </div>
			  </li>
			  <!-- /slide -->
			  <!-- slide -->
			  <li>
			   <div class="uk-overlay">
				<img src="http://cdn.home-designing.com/wp-content/uploads/2012/09/Floating-staircase.jpeg">
				<div class="uk-overlay-panel uk-overlay-background uk-flex uk-flex-center uk-flex-middle uk-text-center">
				 <div class="text-over">
				  <h1 class="uk-text-light">Vestibulum</h1>
				  <p class="uk-visible-large uk-text-large">Sed diam nonumy eirmod tempor invidunt</p>
				 </div>
				</div>
				
			   </div>
			  </li>
			  <!-- /slide -->		  
			  
			 </ul>
			</div>
			<a href="" class="uk-slidenav uk-slidenav-previous" data-uk-slider-item="previous"></a>
			<a href="" class="uk-slidenav uk-slidenav-next" data-uk-slider-item="next"></a>
			</div>
		</section>
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