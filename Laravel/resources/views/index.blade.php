<!DOCTYPE html>
<html>
<head>
	<title>Shopin</title>
    
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
	<div class="banner">
		<div class="container">
			<section class="rw-wrapper">
				<h1 class="rw-sentence">
					<span>Мода и Красота</span>
					<div class="rw-words rw-words-2">
						<span>Бесплатная доставка</span>
						<span>Примерка перед покупкой</span>
						<span>Только брендовые товары</span>
						<span>Акции и скидки до 30%</span>
						<span>Shopin.ru</span>
					</div>
				</h1>
			</section>
		</div>
	</div>
	<!--banner-->
	
	<!--content-->
	<div class="content">
		<div class="container">
			<div class="content-top">
				<div class="col-md-6 col-md">
					<div class="col-1">
						<a class="b-link-stroke b-animate-go  thickbox">
						<img src="{{ url('images/pi.jpg') }}" class="img-responsive" alt=""/><div class="b-wrapper1 long-img"><p class="b-animate b-from-right    b-delay03 ">Скидки до 30%</p><label class="b-animate b-from-right    b-delay03 "></label><h3 class="b-animate b-from-left    b-delay03 ">Акции</h3></div></a>
					</div>
					<div class="col-2">
						<span>Shopin.ru</span>

						<p>Интернет-магазин "Shopin" рад предложить вам постоянно обновляющийся огромный ассортимент модной одежды и аксессуаров от ведущих мировых производителей. Наш большой выбор доставит настоящее удовольствие ценителям качественных и элегантных модных изделий, а также поможет грамотно сформировать имидж успешного, не лишенного вкуса, человека.</p>
						
					</div>
				</div>
				<div class="col-md-6 col-md1">
					<div class="col-3">
						<a ><img src="{{ url('images/pi1.jpg') }}" class="img-responsive" alt="">
						<div class="col-pic">
							<h5>Мужчинам</h5>
							<label></label>

						</div></a>
					</div>
					<div class="col-3">
						<a ><img src="{{ url('images/pi2.jpg') }}" class="img-responsive" alt="">
						<div class="col-pic">


							<h5>Детям</h5>
							<label></label>
						</div></a>
					</div>
					<div class="col-3">
						<a><img src="{{ url('images/pi3.jpg') }}" class="img-responsive" alt="">
						<div class="col-pic">
							<h5>Женщинам</h5>
							<label></label>
						</div></a>
					</div>
				</div>
					
				<div class="clearfix"></div>
			</div>

				
			<!--brand-->
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
			<!--brand-->
				
		</div>
	</div>
	<!--content-->

	<!--footer-->
	@include('footer.footer')
	<!--footer-->

	<!--light-box-files -->
	<script type="text/javascript" charset="utf-8">
	$(function() {
		$('a.picture').Chocolat();
	});
	</script>
	<!--light-box-files -->

</body>
</html>