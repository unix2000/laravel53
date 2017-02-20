@extends('layouts.uikit')
@section('content')
	<div id="navbar" data-uk-sticky>
	  <div class="uk-container uk-container-center">
		<nav class="uk-navbar uk-hidden-small">     
		  <ul class="uk-navbar-nav">
			<li><a href="#"><i class="uk-icon-indent uk-icon-justify uk-margin-small-right"></i>Plays</a></li>
			<li><a href="#"><i class="uk-icon-th uk-icon-justify uk-margin-small-right"></i>Collections</a></li>
			<li class="uk-parent" data-uk-dropdown="{mode:'click', justify:'#navbar'}">
			  <a><i class="uk-icon-search uk-icon-justify uk-margin-small-right"></i>Search</a>
			  <div class="uk-dropdown">
				
			  </div>
			</li>
		  </ul>    
		</nav>    
	  </div>
	</div>

	<!-- 这是开关抽屉式边栏的锚 -->
	<a href="#my-id" data-uk-offcanvas>打开</a>

	<!-- 这是开关抽屉式边栏的按钮 -->
	<button class="uk-button" data-uk-offcanvas="{target:'#my-id'}">左边</button>
	<button class="uk-button" data-uk-offcanvas="{target:'#my-id-right'}">右边</button>

	<!-- 抽屉式边栏 -->
	<div id="my-id" class="uk-offcanvas">
		<div class="uk-offcanvas-bar">抽屉内容</div>
	</div>

	<div id="my-id-right" class="uk-offcanvas">
		<div class="uk-offcanvas-bar uk-offcanvas-bar-flip">抽屉右边内容</div>
	</div>

	<div class="uk-accordion" data-uk-accordion>
		<span class="uk-accordion-title">个人信息</span>
		<div class="uk-accordion-content">
		  <ul id="menu">
			<li><a href="#"><i class="uk-icon-large uk-icon-github"></i>界面主题</a></li>
			<li><a href="#"><i class="uk-icon-medium uk-icon-automobile"></i>门户设置</a></li>
			<li><a href="#"><i class="uk-icon-small uk-icon-bar-chart"></i>信息中心设置</a></li>
			<li><a href="#"><i class="uk-icon-large uk-icon-battery-3"></i>页面收藏夹</a></li>
			<li><a href="#"><i class="uk-icon-justify uk-icon-camera"></i>个人网址</a></li>
		  </ul>
		</div>

		<span class="uk-accordion-title">界面设置</span>
		<div class="uk-accordion-content">
		  <ul>
			<li><a href="#"><i class="uk-icon-large uk-icon-github"></i>界面主题</a></li>
			<li><a href="#"><i class="uk-icon-medium uk-icon-automobile"></i>门户设置</a></li>
			<li><a href="#"><i class="uk-icon-small uk-icon-bar-chart"></i>信息中心设置</a></li>
			<li><a href="#"><i class="uk-icon-large uk-icon-battery-3"></i>页面收藏夹</a></li>
			<li><a href="#"><i class="uk-icon-justify uk-icon-camera"></i>个人网址</a></li>
		  </ul>
		</div>

		<span class="uk-accordion-title">系统安全</span>
		<div class="uk-accordion-content">
		  <ul>
			<li><a href="#"><i class="uk-icon-large uk-icon-github"></i>界面主题</a></li>
			<li><a href="#"><i class="uk-icon-medium uk-icon-automobile"></i>门户设置</a></li>
			<li><a href="#"><i class="uk-icon-small uk-icon-bar-chart"></i>信息中心设置</a></li>
			<li><a href="#"><i class="uk-icon-large uk-icon-battery-3"></i>页面收藏夹</a></li>
			<li><a href="#"><i class="uk-icon-justify uk-icon-camera"></i>个人网址</a></li>
		  </ul>
		</div>
	</div>

	<div class="uk-grid">
		<div class="uk-width-1-1">
			<div class="uk-tab-center">
				<ul class="uk-tab" data-uk-tab>
					<li class="uk-active"><a href="#">Active</a></li>
					<li><a href="#">Item</a></li>
					<li><a href="#">Item</a></li>
					<li><a href="/ui/bui">Item</a></li>
					<li><a href="#">Item</a></li>
					<li><a href="/ui/bui">Item</a></li>
					<li><a href="#">Item</a></li>
					<li><a href="/ui/bui">Item</a></li>
					<li><a href="#">Item</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="uk-grid">
		<div class="uk-width-1-1">
			<ul class="uk-grid" data-uk-grid-margin>
				<li class="uk-width-medium-1-3">
					<figure class="uk-overlay uk-overlay-hover">
						<img src="/assets/images/placeholder_600x400.svg" width="600" height="400" alt="Image">
						<figcaption class="uk-overlay-panel uk-overlay-background  uk-overlay-bottom uk-overlay-slide-bottom">
							<p>第一张说明.</p>
						</figcaption>
					</figure>
				</li>

				<li class="uk-width-medium-1-3">
					<figure class="uk-overlay uk-overlay-hover">
						<img class="uk-overlay-scale" src="/assets/images/placeholder_600x400.svg" width="600" height="400" alt="Image">
						<figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom uk-ignore">
							<p>第二张说明.</p>
						</figcaption>
					</figure>
				</li>

				<li class="uk-width-medium-1-3">
					<figure class="uk-overlay uk-overlay-hover">
						<img class="uk-overlay-spin" src="/assets/images/placeholder_600x400.svg" width="600" height="400" alt="Image">
						<figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom uk-overlay-slide-bottom">
							<p>第三张说明.</p>
						</figcaption>
					</figure>
				</li>
			</ul>
		</div>
	</div>

	<div class="uk-grid">
		<div class="uk-width-1-1">
			<ul class="uk-thumbnav uk-grid-width-1-5"">
				<li class="uk-active"><a href="#"><img src="/assets/images/placeholder_200x100.svg" alt=""></a></li>
				<li><a href="#"><img src="/assets/images/placeholder_200x100.svg" alt=""></a></li>
				<li><a href="#"><img src="/assets/images/placeholder_200x100.svg" alt=""></a></li>
				<li><a href="#"><img src="/assets/images/placeholder_200x100.svg" alt=""></a></li>
				<li><a href="#"><img src="/assets/images/placeholder_200x100.svg" alt=""></a></li>
			</ul>
		</div>
	</div>

	<div class="uk-grid">
		<div class="uk-width-1-1">
			<h3>Example</h3>
			<div class="uk-block uk-block-primary uk-contrast">
				<div class="uk-container">
					<h3>Primary</h3>
					<div class="uk-grid uk-grid-match" data-uk-grid-margin>
						<div class="uk-width-medium-1-3">
							<div class="uk-panel">
								<p>第一块内容.</p>
							</div>
						</div>
						<div class="uk-width-medium-1-3">
							<div class="uk-panel">
								<p>第二块内容.</p>
							</div>
						</div>
						<div class="uk-width-medium-1-3">
							<div class="uk-panel">
								<p>第三块内容.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="uk-grid" data-uk-grid-margin>
		<div class="uk-width-medium-1-2">
			<div class="uk-grid">
				<div class="uk-width-medium-1-2">
					<ul class="uk-tab uk-tab-left" data-uk-tab="{connect:'#tab-left-content'}">
						<li class="uk-active"><a href="#">Tab</a></li>
						<li><a href="#">Tab</a></li>
						<li><a href="#">Tab</a></li>
					</ul>
				</div>
				<div class="uk-width-medium-1-2">
					<div id="tab-left-content" class="uk-switcher">
						<div class="uk-active">Hello div</div>
						<div>Hello again!</div>
						<div>Bazinga</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="uk-width-medium-1-2">
			<div class="uk-grid" data-uk-grid-margin>
				<div class="uk-width-medium-1-2 uk-push-1-2">
					<ul class="uk-tab uk-tab-right" data-uk-tab="{connect:'#tab-right-content'}">
						<li class="uk-active"><a href="#">Tab</a></li>
						<li><a href="#">Tab</a></li>
						<li><a href="#">Tab</a></li>
					</ul>
				</div>
				<div class="uk-width-medium-1-2 uk-pull-1-2">
					<ul id="tab-right-content" class="uk-switcher">
						<li class="uk-active">Hello!</li>
						<li>Hello again!</li>
						<li>Bazinga!</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="uk-grid">
		<div class="uk-width-1-3">
			<button class="uk-button" data-uk-modal="{target:'#modal'}">Open</button>
			<a href="#modal" data-uk-modal>Open</a>
			<div id="modal" class="uk-modal">
				<div class="uk-modal-dialog">
					<a href="" class="uk-modal-close uk-close"></a>
					<h1>公告主题</h1>
					<p>公告内容.</p>
					<p>公告内容.</p>
					<p>公告内容.</p>
					<p>公告内容.</p>
				</div>
			</div>
		</div>
		<div class="uk-width-1-3"><div class="uk-panel uk-panel-box"><code>.uk-width-1-3</code></div></div>
		<div class="uk-width-1-3">
			<figure class="uk-overlay uk-overlay-hover">
				<img src="/assets/images/placeholder_600x400.svg" width="600" height="400" alt="">
				<img class="uk-overlay-panel uk-overlay-image uk-overlay-fade" src="/assets/images/placeholder_600x400_2.svg" width="600" height="400" alt="">
			</figure>
		</div>
	</div>

	<div class="uk-grid">
		<div class="uk-width-1-4">
			<div class="uk-article">
				<h1 class="uk-article-title">文章标题</h1>
				<p class="uk-article-meta">由 xxx 撰写于 xxxx年xx月xx日 | 发表在 博客</p>
				<p class="uk-article-lead">内容：</p>
				<hr class="uk-article-divider">
				<p>分段内容</p>
				<a href="#">继续阅读</a>
			</div>
		</div>
		<div class="uk-width-1-4"><code>.uk-width-1-4</code></div>
		<div class="uk-width-1-4"><code>.uk-width-1-4</code></div>
		<div class="uk-width-1-4">
			<code>.uk-width-1-4</code>
			<code>.uk-width-1-4</code>
			<code>.uk-width-1-4</code>
			<code>.uk-width-1-4</code>
			<code>.uk-width-1-4</code>
		</div>
	</div>


	<div class="uk-grid">
		<div class="uk-width-1-5"><code>.uk-width-1-5</code></div>
		<div class="uk-width-4-5">
			<code>.uk-width-4-5</code>
			<code>.uk-width-4-5</code>
			<code>.uk-width-4-5</code>
		</div>
	</div>

	<div class="uk-grid">
		<div class="uk-width-1-6"><code>.uk-width-1-6</code></div>
		<div class="uk-width-5-6"><code>.uk-width-5-6</code></div>
	</div>

	<div class="uk-grid">
		<div class="uk-width-1-10"><code>.uk-width-1-10</code></div>
		<div class="uk-width-1-10"><code>.uk-width-1-10</code></div>
		<div class="uk-width-1-10"><code>.uk-width-1-10</code></div>
		<div class="uk-width-1-10"><code>.uk-width-1-10</code></div>
		<div class="uk-width-1-10"><code>.uk-width-1-10</code></div>
		<div class="uk-width-1-10"><code>.uk-width-1-10</code></div>
		<div class="uk-width-1-10"><code>.uk-width-1-10</code></div>
		<div class="uk-width-1-10"><code>.uk-width-1-10</code></div>
		<div class="uk-width-1-10"><code>.uk-width-1-10</code></div>
		<div class="uk-width-1-10"><code>.uk-width-1-10</code></div>
	</div>

	<div class="uk-grid">
		<div class="uk-width-1-1">
			<code>.uk-width-1-1</code>
			<div class="uk-grid">
				<div class="uk-width-medium-1-2">
					<ul class="uk-tab uk-tab-left uk-width-medium-1-2" data-uk-tab>
						<li class="uk-active"><a href="#">Active</a></li>
						<li><a href="/ui/bui">Item</a></li>
						<li><a href="#">Item</a></li>
					</ul>
				</div>
				<div class="uk-width-medium-1-2">
					<ul class="uk-tab uk-tab-right uk-width-medium-1-2" data-uk-tab>
						<li class="uk-active"><a href="#">Active</a></li>
						<li><a href="#">Item</a></li>
						<li><a href="#">Item</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="uk-grid">
		<div class="uk-width-1-2">
			
		</div>
		<div class="uk-width-1-2">
			<ul class="uk-pagination uk-pagination-right">
				<li><a href="#">1</a></li>
				<li><span>...</span></li>
				<li><a href="#">8</a></li>
				<li><a href="#">9</a></li>
				<li class="uk-active"><span>10</span></li>
				<li><a href="#">11</a></li>
				<li><a href="#">12</a></li>
				<li><span>...</span></li>
				<li><a href="#">20</a></li>
			</ul>
		</div>
	</div>

	<div class="uk-grid">
		<div class="uk-width-3-10"><div class="uk-panel uk-panel-box"><code>.uk-width-3-10</code></div></div>
		<div class="uk-width-7-10"><div class="uk-panel uk-panel-box"><code>.uk-width-7-10</code></div></div>
	</div>

@endsection

@section('script')
	<script src="{{ asset('static/jquery.sticky.js') }}"></script>
	<script src="{{ asset('static/uikit/js/components/accordion.min.js') }}"></script>
	<script>
		$("#navbar").sticky({ topSpacing: 0, center:true, className:"hey" });
	</script>
@endsection