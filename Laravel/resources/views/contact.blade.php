<!DOCTYPE html>
<html>
<head>
	<title>Контакты</title>
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
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
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
			<h1>Контакты</h1>
			<em></em>
			<h2>Если у вас есть вопросы - напишите нам! </h2>
		</div>
	</div>	
	<!--banner-->
	
	<!--contact-->
	<div class="contact">
		<div class="contact-form">
			
			@if(isset($flag))
				@if($flag === true)
					<div class="alert alert-success" role="alert">
						<strong>Ваше сообщение отправлено.</strong> 
						Мы его рассмотрим в ближайшее тысячелетие.
					</div>
				@else
					<div class="alert alert-danger"  role="alert">
					@foreach($errors as $error )
						<strong>
							{{$error}} <br>
						</strong>
					 @endforeach
					 </div>
				 @endif
			@endif
			
			<div class="container">
				<div class="col-md-6 contact-left">
					<h3>Задайте вопрос </h3>
					<p>Здесь вы найдете ответы на самые частые вопросы: о товарах на сайте и в магазинах, доставке, оплате, акциях и специальных программах, о сервисе и ремонте, а также о многом другом. </p>
					<div class="address">
						<div class=" address-grid">
							<i class="glyphicon glyphicon-map-marker"></i>
							<div class="address1">
								<h3>Адрес</h3>
								<p>ул. Лермонтова, 126 VI корпус ИГУ</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						
						<div class=" address-grid ">
							<i class="glyphicon glyphicon-phone"></i>
							<div class="address1">
                                <h3>Телефон:</h3>
								<p>426-417</p>
                            </div>
							<div class="clearfix"> </div>
						</div>
						
						<div class=" address-grid ">
							<i class="glyphicon glyphicon-envelope"></i>
							<div class="address1">
							<h3>Email:</h3>
								<p><a href="mailto:info@example.com"> service@sr.isu.ru</a></p>
							</div>
							<div class="clearfix"> </div>
						</div>
						
						<div class=" address-grid ">
							<i class="glyphicon glyphicon-bell"></i>
							<div class="address1">
								<h3>Часы работы:</h3>
								<p>ПН-СБ, 9:00-21:00</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				  
				<div class="col-md-6 contact-top">
					<h3>У вас есть вопросы?</h3>
					<form action="/contact" method="post">
						<div>
							<span>Ваше имя </span>		
							<input type="text" name="name" value="{{ isset($name)? $name :'' }}" >						
						</div>
						<div>
							<span>Email </span>		
							<input type="text" name="email" value="{{ isset($email)? $email : '' }}" >						
						</div>
						<div>
							<span>Ваше сообщение</span>		
							<textarea name="text">
								{{ isset($text)? $text : '' }}
							</textarea>	
						</div>
						<label class="hvr-skew-backward">
								<input type="submit" value="Отправить" >
						</label>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>						
				</div>
				
				<div class="clearfix"></div>
			</div>
		</div>
		
		<div class="map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d37494223.23909492!2d103!3d55!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x453c569a896724fb%3A0x1409fdf86611f613!2sRussia!5e0!3m2!1sen!2sin!4v1415776049771"></iframe>
		</div>
		
	</div>
	<!--contact-->
	
	<!--brand-->
	<div class="container">
		<div class="brand">
			<div class="col-md-3 brand-grid">
				<img src="images/ic.png" class="img-responsive" alt="">
			</div>
			<div class="col-md-3 brand-grid">
				<img src="images/ic1.png" class="img-responsive" alt="">
			</div>
			<div class="col-md-3 brand-grid">
				<img src="images/ic2.png" class="img-responsive" alt="">
			</div>
			<div class="col-md-3 brand-grid">
				<img src="images/ic3.png" class="img-responsive" alt="">
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