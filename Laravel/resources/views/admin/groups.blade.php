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
				<div class="col-xs-12">
		  			<div class="box">
						<div class="box-header">
			  				<h3 class="box-title" style="margin-right: 75%">
								Группа товаров
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
									  <th>Категория</th>
									  <th>Удалить/Изменить</th>
									</tr>
								</thead>
							<tbody>
								
							@foreach($groups as $group)
							<?php
								$group_id   = $group->{'group_id'};
								$group_name = $group->{'group_name'};
								
								$url_delete = url('admin/groups/delete/'.$type_id);
								$url_update = url('admin/groups/update/'.$type_id);

								
								$url_left   = url('admin/categories/'.$type_id);
								$url_right  = url('admin/categories/'.$type_id.'/groups/'.$categor_id.'/products/'.$group_id);
							?>
							<tr>
					  		<form method="post">
					  			<td>
									<a href="{{ $url_left }}">
						  			<button type="button" class="btn btn-success">
							  			<i type="button" class="fa fa-arrow-left"></i>
						  			</button>
						  			</a>
									
						  			<a href="{{ $url_right }}">
						  			<button type="button" class="btn btn-warning">
							  			<i type="button" class="fa fa-arrow-right"></i>
						  			</button>
						  			</a>
					  			</td>
					  			<td>
									<input type="text" name='name' value="{{ $group_name }}">
					  			</td>
					  			<td>
						  		<input type="hidden" name="categor_id" value="{{ $categor_id }}">
						  		<input type="hidden" name="id" value="{{ $group_id }}">
						  		<input type="hidden" name="_token" value="{{ csrf_token() }}">
									
						  		<input formaction="{{ $url_delete }}" type="submit" value="Удалить" class="btn btn-danger" >
									
						  		<input formaction="{{ $url_update }}" type="submit" value="Изменить" class="btn btn-success">
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
            <form action="{{ url('admin/groups/add/'.$type_id) }}" method="post"> 
            <div  class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Добавление категории</h4>
              </div>
                  <div class="modal-body">
                     <p>Введите название категории</p>
                     <input type="hidden" name="categor_id" value="{{ $categor_id }}">  
                     <input class ="form-control" type="text" name="new_group"> 
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  </div>
                    
                
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Отмена</button>
                    <input type="submit" class="btn btn-outline" value="Сохранить">
                  </div>
            	</div>
            	</form>
          	</div>
        </div>
	</div>
	
	<!-- footer -->
	@include('admin.footer.footer')
	<!-- footer -->
	
</html>