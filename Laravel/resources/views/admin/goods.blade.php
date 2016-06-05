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
								Меню
							</h3>
              				<a href="#addModal" class="btn btn-primary" data-toggle="modal">
								Добавть
							</a>
						</div>
						
            			<div class="box-body">
              				<table id="example2" class="table table-bordered table-hover">
                				<thead>
									<tr>
									  <th>Ссылка</th>
									  <th>Тип</th>
									  <th>Удалить/Изменить</th>
									</tr>
                				</thead>
                				<tbody>
									
								@foreach($types as $type)
								<?php  
									$id    = $type->{'type_id'}; 
									$name  = $type->{'type_name'}; 
									$url_right = url('admin/categories/'.$id);
								?>
								<tr>
								<form method="post">
									<td>
										<a href="{{ $url_right }}">
											<button type="button" class="btn btn-warning">
												<i type="button" class="fa fa-arrow-right"></i>
											</button>
										</a>
									</td>
									<td>
										
									<input class ="form-control" name ="type" type="text" value="{{ $name }}">
										
									</td>
									<td>
										
									<input type="hidden" name="id" value="{{ $id }}">
										
									<input formaction="goods/delete" type="submit" value="Удалить" class="btn btn-danger" >
										
									<input formaction="goods/update" type="submit" value="Изменить" class="btn btn-success">
										
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
										
									</td>
								</form>
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