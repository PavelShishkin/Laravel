<!DOCTYPE html>
<html>
	
	<!--header-->
	@include('admin.header.header')
	<!--header-->
	
	<!--menu-->
	@include('admin.menu.menu')
	<!--menu-->
	
  	<div class="content-wrapper">
    	<section class="content">
        	<div class="row">
        		<div class="col-xs-12">
          			<div class="box">
						
            			<div class="box-header">
              				<h3 class="box-title" style="margin-right: 85%" >
								Покупки
							</h3>
       
						</div>
						
            			<div class="box-body">
              				<table id="example2" class="table table-bordered table-hover">
                				<thead>
									<tr>
									  <th>Товар</th>
									  <th>Имя покупателя</th>
									  <th>Телефон</th>
									  <th>Адрес доставки</th>
									  <th>Дата</th>
									</tr>
                				</thead>
                				<tbody>
									
								@foreach($purchases as $purch)
								<tr>
								
									<td>
										<a href="{{ url('single/'.$purch->{'purch_product_id'})}}">
											<button type="button" class="btn btn-warning">
												<i type="button" class="fa fa-arrow-right"></i>
											</button>
										</a>
									</td>
									<td>
									{{ $purch->{'purch_name'} }}	
									</td>
									<td>
									{{ $purch->{'purch_phone'} }}	
									</td>
									<td>
									{{ $purch->{'purch_adress'} }}	
									</td>
									<td>
									{{ $purch->{'purch_date'} }}	
									</td>
								</tr>
                    			@endforeach
									
                				</tbody>
              				</table>
            			</div>
						
          			</div>
				</div>
        	</div>  
    	</section>
  	</div>
	
	<div class="example-modal">
    	<div id="addModal" class="modal modal-info">
          	<div class="modal-dialog">
            	<form action="goods/add" method="post"> 
            		<div  class="modal-content">
						
              			<div class="modal-header">
                			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">
									&times;
								</span>
							</button>
                			<h4 class="modal-title">
								Добавление в Меню
							</h4>
              			</div>
						
                  		<div class="modal-body">
                     		<p>
								Введите название
							</p>
                     		<input class ="form-control" type="text" name="new_type"> 
                     		<input type="hidden" name="_token" value="{{ csrf_token() }}">
                  		</div>
						
                  		<div class="modal-footer">
                    		<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">
								Отмена
							</button>
                    		<input type="submit" class="btn btn-outline" value="Сохранить">
                  		</div>
						
            		</div>
            	</form>
          	</div>
        </div>
	</div>
    
	<!--footer-->
	@include('admin.footer.footer')
	<!--footer-->
	
</html>