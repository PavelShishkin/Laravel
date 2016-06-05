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
			<h1>Покупка</h1>
			<em></em>
		</div>
	</div>	
	<!--banner-->
	
	<!--contact-->
	<div class="contact">
		<div class="contact-form">
			<div class="container">
				<?php  isset($flag)? $flag : $flag = ''; ?>
				@if($flag === true)
					<div class="alert alert-success" role="alert">
						<strong>Товар куплен.</strong> 
						Мы перезвоним вам, чтобы подтвердить заказ.
					</div>
				@else
				<div class="bs-example4" data-example-id="simple-responsive-table">
					<div class="table-responsive">
							<table class="table-heading simpleCart_shelfItem">
							  <tr>
								<th class="table-grid">Товар</th>

								<th>Цена</th>
								<th >Бренд</th>
								<th>Аритикул</th>
							  </tr>
							  @if(isset($products))
									@foreach($products as $product)
							  <tr class="cart-header">

								<td class="ring-in"><a href="single.html" class="at-in"><img src="{{ url('image_products/'.$product->{'product_image'}) }}" class="img-responsive" alt=""></a>
								<div class="sed">
									<h5><a href="single.html">{{ $product->{'product_name'} }}</a></h5>
									<p>{{ $product->{'product_text'} }} </p>

								</div>
								<div class="clearfix"> </div>
								</td>
								<td>${{ $product->{'product_price'} }}</td>
								<td>{{ $product->{'product_brand'} }}</td>
								<td class="item_price">{{ $product->{'product_type'} }}</td>
							  </tr>
									@endforeach
							  @endif	  
							</table>
					</div>
				 </div>
				  
				<div class="col-md-12 contact-top">
					@if($flag === false)
					 <div class="alert alert-danger"  role="alert">
					 @foreach($errors as $error )
						<strong>
							{{$error}} <br>
						</strong>
					 @endforeach
					 </div>
					@endif
					<form action="/purchase" method="post">
						<div>
							<input type="hidden" name="product_id" value="{{ $product_id }}" >
							<span>Ваше имя </span>		
							<input type="text" name="name" value="{{ isset($name)? $name :'' }}" >						
						</div>
						<div>
							<span>Телефон</span>		
							<input type="text" name="phone" value="{{ isset($phone)? $phone : '' }}" >						
						</div>
						<div>
							<span>Адресс доставки</span>		
							<textarea name="adress">
								{{ isset($adress)? $adress : '' }}
							</textarea>	
						</div>
						<label class="hvr-skew-backward">
								<input type="submit" value="Оформить" >
						</label>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>						
				</div>
				@endif
				<div class="clearfix"></div>
			</div>
		</div>
		
		
		
	</div>
	<!--contact-->
	
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