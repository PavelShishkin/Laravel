<!DOCTYPE html>
<html>
<head>
	<title>Страница не найдена</title>
	<!-- Подключаю css --> 
	{{ Html::style('css/bootstrap.css')}}
	{{ Html::style('css/style.css')    }}
	{{ Html::style('css/style4.css')   }}
	{{ Html::style('css/jstarbox.css') }}
	{{ Html::style('css/form.css')     }}
	{{ Html::style('css/chocolat.css') }}
	{{ Html::style('css/popuo-box.css')}}

	<!-- Подключаю js -->     
	{{ Html::script('js/jquery.min.js')     }} 
	{{ Html::script('js/jstarbox.js')       }}
	{{ Html::script('js/simpleCart.min.js') }}
	{{ Html::script('js/bootstrap.min.js')  }}
	{{ Html::script('js/jquery.chocolat.js')}}
	{{ Html::script('js/jquery.magnific-popup.js')}}
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
	<!--login-->
	<div class="container">
		<div class="four">
		<h3>404</h3>
		<p>Сожалею! Очевидно, что страница, которую вы искали была перемещена или больше не существует.</p>
		<a href="{{ url('/') }}" class="hvr-skew-backward">Вернутся на главную</a>
		</div>
	</div>
	<!--login-->
</body>
</html>