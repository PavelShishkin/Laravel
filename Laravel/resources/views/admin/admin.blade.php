<!DOCTYPE html>
<html>
	
	<!-- header -->
	@include('admin.header.header')
	<!-- header -->
	
	<!-- menu -->
	@include('admin.menu.menu')
	<!-- menu -->
	
	<div class="content-wrapper">
    	<section class="content">  
    		<div class="row">
				
        		<div class="col-md-3 col-sm-6 col-xs-12">
					<h4><strong>За {{ date('Y-m-d') }}</strong></h4>
          			<div class="info-box">
						
            			<span class="info-box-icon bg-aqua">
							<i class="fa fa-envelope-o"></i>
						</span>
            			<div class="info-box-content">
              				<span class="info-box-text">
								Сообщений
							</span>
              				<span class="info-box-number">
								@foreach($message_count as $count)
								 	{{ $count->{'count'} }}
								@endforeach
							</span>
            			</div>
						
          			</div>
					<div class="info-box">
            			<span class="info-box-icon bg-green">
							<i class="ion ion-ios-cart-outline"></i>
						</span>
            			<div class="info-box-content">
              				<span class="info-box-text">
								Товаров продано
							</span>
              				<span class="info-box-number">
								@foreach($purch_count as $count)
								 	{{ $count->{'count'} }}
								@endforeach
							</span>
            			</div>
          			</div>
        		</div>
				
        		<div class="col-md-3 col-sm-6 col-xs-12">
					<h4><strong>За все время</strong></h4>
					<div class="info-box">
						
            			<span class="info-box-icon bg-aqua">
							<i class="fa fa-envelope-o"></i>
						</span>
            			<div class="info-box-content">
              				<span class="info-box-text">
								Сообщений
							</span>
              				<span class="info-box-number">
								@foreach($message_count_all as $count)
								 	{{ $count->{'count_all'} }}
								@endforeach
							</span>
            			</div>
						
          			</div>
          			<div class="info-box">
            			<span class="info-box-icon bg-green">
							<i class="ion ion-ios-cart-outline"></i>
						</span>
            			<div class="info-box-content">
              				<span class="info-box-text">
								Товаров продано
							</span>
              				<span class="info-box-number">
								@foreach($purch_count_all as $count)
								 	{{ $count->{'count_all'} }}
								@endforeach
							</span>
            			</div>
          			</div>
        		</div>
     		 </div>
    	</section>
  	</div>
	
 	<!-- footer -->   
	@include('admin.footer.footer')
	<!-- footer --> 
	
</html>