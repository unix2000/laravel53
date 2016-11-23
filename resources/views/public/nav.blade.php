<nav class="navbar navbar-default navbar-inverse">
  <div class="container-fluid">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
		<span class="sr-only">自适应导航</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="#">laravel53.dev-logo</a>
	</div>

	<div class="collapse navbar-collapse" id="navbar-collapse-1">
	  <ul class="nav navbar-nav">
		<li class="active"><a href="#">顶部菜单 <span class="sr-only">(current)</span></a></li>
		<li><a href="#">菜单1</a></li>
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">菜单2 <span class="caret"></span></a>
		  <ul class="dropdown-menu">
			<li><a href="#">子菜单2_1</a></li>
			<li><a href="#">子菜单2_2</a></li>
		  </ul>
		</li>
	  </ul>
	  <form class="navbar-form navbar-left" role="search">
		<div class="form-group">
		  <input type="text" class="form-control" placeholder="Search">
		</div>
		<button type="submit" class="btn btn-default btn-primary">全站搜索</button>
	  </form>
	  <ul class="nav navbar-nav navbar-right">
		<li><a href="#">右边菜单</a></li>
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">控制面板 <span class="caret"></span></a>
		  <ul class="dropdown-menu">
			<li><a href="#">个人信息</a></li>
			<li><a href="#">修改密码</a></li>
			<li><a href="#">退出</a></li>
		  </ul>
		</li>
	  </ul>
	</div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>