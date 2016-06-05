<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
 <title>Корзина</title>
    
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
<!--header-->
	@include('header.header')
<!--header-->
<!--banner-->
<div class="banner-top">
	<div class="container">
		<h1>Корзина</h1>
		<em></em>
		
	</div>
</div>
<!--login-->
	<script>$(document).ready(function(c) {
					$('.close1').on('click', function(c){
						$('.cart-header').fadeOut('slow', function(c){
							$('.cart-header').remove();
						});
						});	  
					});
			   </script>
<script>$(document).ready(function(c) {
					$('.close2').on('click', function(c){
						$('.cart-header1').fadeOut('slow', function(c){
							$('.cart-header1').remove();
						});
						});	  
					});
			   </script>
			   <script>$(document).ready(function(c) {
					$('.close3').on('click', function(c){
						$('.cart-header2').fadeOut('slow', function(c){
							$('.cart-header2').remove();
						});
						});	  
					});
			   </script>
<div class="container">
	<div class="check-out">
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
			<td class="add-check"><a class="item_add hvr-skew-backward" href="{{ url('purchase/'.$product->{'product_id'}) }}">Купить</a></td>
		  </tr>
				@endforeach
		  @endif
		  
	</table>
	</div>
	</div>
	<div class="produced">
	<a href="{{ url('/')}}" class="hvr-skew-backward">На главную</a>
	 </div>
    </div>
</div>

<!--//login-->
<!--brand-->
		<div class="container">
			<div class="brand">
				<div class="col-md-3 brand-grid">
					<img src="{{ url('images/ic.png')}}" class="img-responsive" alt="">
				</div>
				<div class="col-md-3 brand-grid">
					<img src="{{ url('images/ic1.png')}}" class="img-responsive" alt="">
				</div>
				<div class="col-md-3 brand-grid">
					<img src="{{ url('images/ic2.png')}}" class="img-responsive" alt="">
				</div>
				<div class="col-md-3 brand-grid">
					<img src="{{ url('images/ic3.png')}}" class="img-responsive" alt="">
				</div>
				<div class="clearfix"></div>
			</div>
			</div>
			<!--//brand-->
			</div>
			
		</div>
	<!--//content-->
	<!--//footer-->
	@include('footer.footer')
 
</body>
</html>