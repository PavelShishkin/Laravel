<!DOCTYPE html>
<html>
<head>
	<title>Вход</title>
	
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
    
	<script type="application/x-javascript"> 
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); 
		function hideURLbar(){ window.scrollTo(0,1); } 
	</script>

	<script type="text/javascript">
		jQuery(function() {
		jQuery('.starbox').each(function() {
			var starbox = jQuery(this);
				starbox.starbox({
				average: starbox.attr('data-start-value'),
				changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
				ghosting: starbox.hasClass('ghosting'),
				autoUpdateAverage: starbox.hasClass('autoupdate'),
				buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
				stars: starbox.attr('data-star-count') || 5
				}).bind('starbox-value-changed', function(event, value) {
				if(starbox.hasClass('random')) {
				var val = Math.random();
				starbox.next().text(' '+val);
				return val;
				} 
			})});});
	</script>
</head>
	
<body>
	<!--header-->
	@include('header.header')
	<!--header-->

	<!--banner-->
	<div class="banner-top">
		<div class="container">
			<h1>Вход</h1>
			<em></em>
			<h2>Пройдите регистрацию и получите скидку 10%</h2>
		</div>
	</div>
	

	<div class="container">
		<div class="login">

			@if(isset($flag))
				<div class="alert alert-danger"  role="alert">
					<strong>
					@foreach($errors as $error)
						{{ $error }} <br>
					@endforeach
					</strong>
				</div>
			@endif

			<form action="login" method="post"> 
				<div class="col-md-6 login-do">

					<div class="login-mail">
						<input type="text" name="email" value="{{ isset($email)? $email: '' }}" placeholder="Email">
						<i  class="glyphicon glyphicon-envelope"></i>
					</div>

					<div class="login-mail">
						<input type="password" name="password" value="{{ isset($password)? $password: '' }}" placeholder="Password">
						<i class="glyphicon glyphicon-lock"></i>
					</div>

					<br><br>

					<label class="hvr-skew-backward">
						<input type="submit" value="Вход">
					</label>

					<input type="hidden" name="_token" value="{{ csrf_token() }}">

				</div>
			</form>

			<div class="col-md-6 login-right">
				<h3>Регистрация нового пользователя </h3><br>
				<strong>Быстро, удобно, легко!</strong>
				<li>Используйте введённые ранее данные</li>
				<li>Отслеживайте статус заказа</li>
				<li>Получайте персонализированные предложения</li>
				<li>Накапливайте и тратьте бонусные рубли</li><br>

				<a href="/registration" class=" hvr-skew-backward">Регистрация</a>
			</div>

			<div class="clearfix"> </div>
		</div>
	</div>
	
	<!--brand-->
	<div class="container">
		<div class="brand">
			<div class="col-md-3 brand-grid">
				<img src="{{ url('images/ic.png') }}" class="img-responsive" alt="">
			</div>
			<div class="col-md-3 brand-grid">
				<img src="{{ url('images/ic1.png') }}" class="img-responsive" alt="">
			</div>
			<div class="col-md-3 brand-grid">
				<img src="{{ url('images/ic2.png') }}" class="img-responsive" alt="">
			</div>
			<div class="col-md-3 brand-grid">
				<img src="{{ url('images/ic3.png') }}" class="img-responsive" alt="">
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!--brand-->
	
	<!--footer-->
	@include('footer.footer')
	<!--footer-->
	
</body>
</html>