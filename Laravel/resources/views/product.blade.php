<!DOCTYPE html>

<html>
<head>
    <title>Продукты</title>
    
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
    <!--//header--> 
    
    <!--banner-->
    <div class="banner-top">
        <div class="container">
            <h1>Продукты</h1>
            <em></em>
            <h2>Платья</h2>
        </div>
    </div>
    <!--//banner-->
    
	<!--content-->
		<div class="product">
			<div class="container">
			<div class="col-md-9">
			<div class="mid-popular">
                 
                @foreach($products as $product)
                
                    <?php 
                
                        if(mb_strlen($product->{'product_name'}) > 17){
                            $product_name  = mb_substr($product->{'product_name'},0,17)."...";
                        }else{
                            $product_name  = $product->{'product_name'};
                        }
                		$product_id    = $product->{'product_id'};
                        $product_image = $product->{'product_image'};
                        $product_price = $product->{'product_price'};
                        $product_brand = $product->{'product_brand'};
                    ?>
                
					<div class="col-md-4 item-grid1 simpleCart_shelfItem">
					<div class=" mid-pop">
					<div class="pro-img">
						<img src="{{ url('image_products/'.$product_image) }}")  class="img-responsive" alt="">
						<div class="zoom-icon ">
						<a class="picture" href="{{ url('images/pc.jpg') }}" rel="title" class="b-link-stripe b-animate-go  thickbox"></a>
						<a href="{{ url('single/'.$product_id)}}"><i class="glyphicon glyphicon-menu-right icon"></i></a>
						</div>
						</div>
						<div class="mid-1">
						<div class="women">
						<div class="women-top">
							<span>{{ $product_brand }}</span>
							<h6><a href="single.html">{{$product_name}}</a></h6>
							</div>
							<div class="img item_add">
								<a href="{{ url('single/'.$product_id ) }}"><img src="{{ url('images/ca.png')}}" alt=""></a>
							</div>
							<div class="clearfix"></div>
							</div>
							<div class="mid-2">
								<p ><em class="item_price">{{$product_price}}</em> $</p>
								<div class="block">
									<div class="starbox small ghosting"> </div>
								</div>
								
								<div class="clearfix"></div>
							</div>
							
						</div>
					</div>
					</div>
                @endforeach
               
					<div class="clearfix"></div>
				</div>
			</div>
            <!--//content-->
                
            <!--Категории-->    
			<div class="col-md-3 product-bottom">
				<div class=" rsidebar span_1_of_left">
						<h4 class="cate">Категория</h4>
							 <ul class="menu-drop">
							<li class="item1"><a href="#">Одежда</a>
								<ul class="cute">
									<li class="subitem1"><a href="product.html">Платья </a></li>
									<li class="subitem2"><a href="product.html">Джинсы </a></li>
									<li class="subitem3"><a href="product.html">Блузы и рубашки </a></li>
                                    <li class="subitem3"><a href="product.html">Шорты и капри </a></li>
								</ul>
							</li>
							<li class="item2"><a href="#">Обувь</a>
								<ul class="cute">
									<li class="subitem1"><a href="product.html">Туфли </a></li>
									<li class="subitem2"><a href="product.html">Кросовки и кеды </a></li>
									<li class="subitem3"><a href="product.html">Сандали </a></li>
                                    <li class="subitem3"><a href="product.html">Слиперы и лоферы </a></li>
                                    <li class="subitem3"><a href="product.html">Босоножки </a></li>
                                    <li class="subitem3"><a href="product.html">Балетки </a></li>
								</ul>
							</li>
							<li class="item3"><a href="#">Сумки</a>
								<ul class="cute">
									<li class="subitem1"><a href="product.html">Сумки </a></li>
									<li class="subitem2"><a href="product.html">Клатчи</a></li>
								</ul>
							</li>
							<li class="item4"><a href="#">Аксессуары</a>
								<ul class="cute">
									<li class="subitem1"><a href="product.html">Подвески и бусы </a></li>
									<li class="subitem2"><a href="product.html">Очки </a></li>
									<li class="subitem3"><a href="product.html">Аксессуары для гаджетов</a></li>
                                    <li class="subitem3"><a href="product.html">Ремни и пояса</a></li>
                                    <li class="subitem3"><a href="product.html">Кошельки</a></li>
                                    <li class="subitem3"><a href="product.html">Браслеты</a></li>
								</ul>
							</li>
									
							
						</ul>
					</div>
				<!--script для категорий-->
						<script type="text/javascript">
							$(function() {
							    var menu_ul = $('.menu-drop > li > ul'),
							           menu_a  = $('.menu-drop > li > a');
							    menu_ul.hide();
							    menu_a.click(function(e) {
							        e.preventDefault();
							        if(!$(this).hasClass('active')) {
							            menu_a.removeClass('active');
							            menu_ul.filter(':visible').slideUp('normal');
							            $(this).addClass('active').next().stop(true,true).slideDown('normal');
							        } else {
							            $(this).removeClass('active');
							            $(this).next().stop(true,true).slideUp('normal');
							        }
							    });
							
							});
						</script>

               <section  class="sky-form">
					<h4 class="cate">Скидки</h4>
					 <div class="row row1 scroll-pane">
						 <div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>до 10% (20)</label>
						 </div>
						 <div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>10% - 20% (5)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>20% - 30% (7)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>40% - 50% (2)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Без скидки (50)</label>
						 </div>
					 </div>
				 </section> 				 				 
				   		<section  class="sky-form">
						<h4 class="cate">Брэнд</h4>
							<div class="row row1 scroll-pane">
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Roadstar</label>
								</div>
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Levis</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Persol</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Nike</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Edwin</label>
									<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>New Balance</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Paul Smith</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Ray-Ban</label>
								</div>
							</div>
                            
                            <a href="/registration" class="hvr-skew-backward">Показать</a>
				   </section>		
		      </div>
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
         <!--//brand-->
    
         <!--footer-->
         @include('footer.footer')
         <!--//footer-->

        <script type="text/javascript">
            jQuery(function() {
            jQuery('.starbox').each(function() {
                var starbox = jQuery(this);
                    starbox.starbox({
                    average: starbox.attr('data-start-value'),
                    changeable: starbox.hasClass('unchangeable') ? false starbox.hasClass('clickonce') ? 'once' : true,
                    ghosting: starbox.hasClass('ghosting'),
                    autoUpdateAverage: starbox.hasClass('autoupdate'),
                    buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-buttocount') || 5,
                    stars: starbox.attr('data-star-count') || 5
                    }).bind('starbox-value-changed', function(event, value) {
                    if(starbox.hasClass('random')) {
                    var val = Math.random();
                    starbox.next().text(' '+val);
                    return val;
                    } 
                })
            });
        });
        </script>

        <script type="application/x-javascript"> 
            addEventListener("load", function() { 
                setTimeout(hideURLbar, 0); 
            }, false); 
            function hideURLbar(){ 
                window.scrollTo(0,1); 
            } 
        </script>

        <script type="text/javascript" charset="utf-8">
            $(function() {
                $('a.picture').Chocolat();
            });
        </script>  
</body>
</html>