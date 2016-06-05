<head>
	<title>Admin | Shop.ru</title>
	
	{{ Html::style('bootstrap/css/bootstrap.min.css') }}
	{{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') }}
	{{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') }}
	{{ Html::style('dist/css/AdminLTE.min.css') }}
	{{ Html::style('dist/css/skins/_all-skins.min.css') }}
	{{ Html::style('plugins/iCheck/flat/blue.css') }}
	{{ Html::style('plugins/morris/morris.css') }}
	{{ Html::style('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}
	{{ Html::style('plugins/datepicker/datepicker3.css') }}
	{{ Html::style('plugins/daterangepicker/daterangepicker-bs3.css') }}
	{{ Html::style('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}
	{{ Html::style('plugins/datatables/dataTables.bootstrap.css') }}
	{{ Html::style('plugins/datatables/jquery.dataTables_themeroller.css') }}
	{{ Html::style('plugins/datatables/jquery.dataTables.css') }}
	{{ Html::style('plugins/datatables/jquery.dataTables.min.css') }}
	
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<header class="main-header">
    		<a href="{{ url('admin')}}" class="logo">
      			<span class="logo-mini">
					<b>A</b>S
				</span>
      			<span class="logo-lg">
					<b>Admin</b>SHOP
				</span>
    		</a>
    		<nav class="navbar navbar-static-top">
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">
						Toggle navigation
					</span>
				</a>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav"> 
						<li class="dropdown tasks-menu">
							<a href="/">
								<i>
									<strong>
										Вернутся в магазин
									</strong>
								</i>
							</a>
						</li>
						<li class="dropdown tasks-menu">
							<a href="{{ url('admin/exit') }}">
								<i>
									<strong>
										Выход
									</strong>
								</i>
							</a>
						</li>
					</ul>
				</div>
    		</nav>
  		</header>