<div class="header">
    <div class="container">
		<div class="head">
			<div class="logo">
                <a class="color" href="/">
				<img src="{{ url('images/logo.png') }}" alt="">
                </a>
			</div>
		</div>
	</div>
	<div class="header-top">
        <div class="container">
		  <div class="col-sm-5 col-md-offset-2  header-login">
              <ul >
                  <li><a href="/login">Войти</a></li>
                  <li><a href="/registration">Регистрация</a></li>
              </ul>
          </div>
          <div class="col-sm-5 header-social">		
              <ul >
                  <li><a href="#"><i></i></a></li>
                  <li><a href="#"><i class="ic1"></i></a></li>
                  <li><a href="#"><i class="ic3"></i></a></li>
              </ul>
          </div>
          <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div class="head-top">
            <div class="col-sm-8 col-md-offset-2 h_menu4">
                <nav class="navbar nav_bottom" role="navigation">
                    <div class="navbar-header nav_2">
                        <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div> 
                    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                        <ul class="nav navbar-nav nav_1">
                        
                            
                        @foreach($types as $type)
                            
                        <li class="dropdown mega-dropdown active">
                            <a class="color1" href="#" class="dropdown-toggle" data-toggle="dropdown">
								{{ $type->{'type_name'} }}
							
							</a>	
					 <div class="dropdown-menu ">
                        <div class="menu-top">
                        
                        
                            @foreach($categories as $categor)
                                @if($categor->{'categor_type_id'} === $type->{'type_id'})
                            
                                <div class="col1">
                                    <div class="h_nav">
                                        <h4>{{ $categor->{'categor_name'} }}</h4>
                                    
                                @foreach($groups as $group)
                                   @if($categor->{'categor_id'} == $group->{'group_categor_id'})
                                        <ul>
                                            <li>
                                                <a href="/product/{{ $group->{'group_id'} }}">
                                                    {{ $group->{'group_name'} }}
                                                </a>
                                            </li>
                                        </ul>
                                   @endif
                                @endforeach
                                    
                                    </div>							
                                </div>
                            
                                @endif
                            @endforeach 
                            <div class="col1 col5">
						      <img src="{{ url('images/me.png') }}" class="img-responsive" alt="">
						    </div>
                        @endforeach     
						
						<div class="clearfix"></div>
					</div>                  
				</div>				
			</li>
                            
			
            <li><a class="color6" href="/contact">Контакты</a></li>
                            
            <?php
                            
            if(isset($_SESSION['user_id']))
            {      
                echo '<li><a style="color:rgba(255, 0, 0, 0.79)" href="/admin">Админка</a></li>';
            } 
                            
            ?>
        </ul>
     </div><!-- /.navbar-collapse -->

</nav>
			</div>
			<div class="col-sm-2 search-right">
				<ul class="heart">
				<li>
				<a href="wishlist.html" >
				
				</a></li>
				
					</ul>
					<div class="cart box_1">
						<a href="{{url('checkout')}}">
						<h3> <div class="total">
							<img src="{{ url('images/cart.png') }}" alt=""/></h3>
						</a>
						<p>Корзина</p>

					</div>
                    <div class="clearfix"> 
                </div>
			<div id="small-dialog" class="mfp-hide">
				<div class="search-top">
					<div class="login-search">
						<input type="submit" value="">
						<input type="text" value="Поиск.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Поиск..';}">		
					</div>
					<p>Shopin</p>
				</div>				
			</div>
            <script>
                $(document).ready(function() {
                $('.popup-with-zoom-anim').magnificPopup({
                type: 'inline',
                fixedContentPos: false,
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: true,
                preloader: false,
                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in'
                });

                });
		    </script>		
			</div>
			<div class="clearfix"></div>
		</div>	
	</div>	
</div>