<!DOCTYPE html>
<html>
	
	<!-- header -->
	@include('admin.header.header')
	<!-- header -->
	
	<!-- menu -->
	@include('admin.menu.menu')
	<!-- menu -->
	
	<?php //включение модального окна
        if(isset($modal))
		{
			if($modal === 'on')
			{
				echo "<body onLoad=" . "document.getElementById("."'modal'".").click()>";
			}
			elseif($modal === 'on_2')
			{
				echo "<body onLoad=" . "document.getElementById("."'modal_2'".").click()>";
			}
		}
	?>

	<div class="content-wrapper">
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
		  			<div class="box">
						<div class="box-header">
			  				<h3 class="box-title" style="margin-right: 75%">
								Продукты
							</h3>
			  				<button href="#addModal" id='modal' class="btn btn-primary" data-toggle="modal">
								Добавть
							</button>
						</div>
						<div class="box-body">
			  				<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
									  <th>Ссылка</th>
									  <th>Артикул</th>
									  <th>Название</th>
									  <th>Цена</th>
									  <th>Изображение</th>
									  <th>Описание</th>
									  <th>Бренд</th>
									  <th>Удалить/Изменить</th>
									</tr>
								</thead>
							<tbody>
					        @foreach($products as $product)
						    <?php
								
								if(mb_strlen($product->{'product_name'}) > 15)
								{
									$product_name  = mb_substr($product->{'product_name'},0,15).'...';
								}
								else
								{
									$product_name  = mb_substr($product->{'product_name'},0,15);
								}
								
								if(mb_strlen($product->{'product_text'}) > 15)
								{
									$product_text  = mb_substr($product->{'product_text'},0,15).'...';
								}
								else
								{
									$product_text  = mb_substr($product->{'product_text'},0,15);
								}
								
								$product_id    = $product->{'product_id'};
								$product_price = $product->{'product_price'};
								$product_image = $product->{'product_image'};
								$product_type  = $product->{'product_type'};
								$product_brand = $product->{'product_brand'};
								
								$url_delete = url('admin/products/delete/'.$group_id.'/'.$categor_id.'/'.$type_id);
								$url_update = url('admin/products/modal_2/'.$product_id.'/'.$group_id.'/'.$categor_id.'/'.$type_id);
								$url_left = url('/admin/categories/'.$type_id.'/groups/'.$categor_id);
							?>
							<tr>
							<button href="#addModal_2" id='modal_2' style="display:none" class="btn btn-primary" data-toggle="modal">
							</button>
					  		<form method="post">
					  			<td>
									<a href="{{ $url_left }}">
						  			<button type="button" class="btn btn-success">
							  			<i type="button" class="fa fa-arrow-left"></i>
						  			</button>
						  			</a>
									
						  			
					  			</td>
								
								<td>
									{{ $product_type }}
								</td>
					  			<td>
									{{ $product_name }}
					  			</td>
								<td>
									{{ $product_price }}
								</td>
								<td>
									{{ $product_image }}
								</td>
								<td>
									{{ $product_text }}
								</td>
								<td>
									{{ $product_brand }}
								</td>
								
					  			<td>
						  		<input type="hidden" name="product_id" value="{{ $product_id }}">
						  		<input type="hidden" name="_token" value="{{ csrf_token() }}">
									
						  		<input formaction="{{ $url_delete }}" type="submit" value="Удалить" class="btn btn-danger" >
									
								</button>
									<a id="modal_2" href="{{$url_update}}" class="btn btn-success" data-toggle="modal">Изменить</a>
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
            <form action="{{ url('admin/products/add/'.$group_id.'/'.$categor_id.'/'.$type_id) }}"  enctype="multipart/form-data" method="post"> 
            <div  class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Добавление продукта</h4>
              </div>
                  <div class="modal-body">
					 
					 @if(isset($flag))
					  <p style="color: red">
				  		@foreach($errors as $error)
						{{ $error }} <br>
				  		@endforeach
					  </p>
				  	 @endif
					 
					 
                     <p>Введите название</p> 
                     <input class ="form-control" type="text" name="new_product_name"> 
					 
					 <p>Введите цену</p> 
                     <input class ="form-control" type="text" name="new_product_price"> 
					 <p>Загрузите изображение</p> 
                     <input class ="form-control" type="file" name="new_product_image"> 
					 <p>Описание товара</p>
					 <textarea name="new_product_comment" style="color: #930; width:570px"></textarea>
					 <p>Введите артикул (#xxxx)</p> 
                     <input class ="form-control" type="text" value="#" name="new_product_type">
					 <p>Бренд</p> 
                     <input class ="form-control" type="text" name="new_product_brand">
					  
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
	
	<div class="example-modal">
        <div id="addModal_2" class="modal modal-info">
          <div class="modal-dialog">
            <form action="{{ url('admin/products/update/'.$group_id.'/'.$categor_id.'/'.$type_id) }}"  enctype="multipart/form-data" method="post"> 
            <div  class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Редактирование продукта</h4>
              </div>
                  <div class="modal-body">
					 
					 @if(isset($flag))
					  <p style="color: red">
				  		@foreach($errors as $error)
						{{ $error }} <br>
				  		@endforeach
					  </p>
				  	 @endif
					 @if(isset($product_modal_2))
					 @foreach($product_modal_2 as $modal)
                     <p>Введите название</p> 
                     <input class ="form-control" type="text" name="new_product_name" value="{{ $modal->{'product_name'} }}"> 
					 <p>Введите цену</p> 
                     <input class ="form-control" type="text" name="new_product_price" value="{{ $modal->{'product_price'} }}"> 
					 <p>Загрузите изображение</p> 
                     <input class ="form-control" type="file" name="new_product_image" value="{{ $modal->{'product_image'} }}"> 
					 <input class ="form-control" type="hidden" name="new_product_image_2" value="{{ $modal->{'product_image'} }}"> 
					 <input class ="form-control" type="hidden" name="product_id" value="{{ $modal->{'product_id'} }}"> 
					 <p>Описание товара</p>
					 <textarea name="new_product_comment" style="color: #930; width:570px">{{ $modal->{'product_text'} }}</textarea>
					 <p>Артикул (#xxxx)</p> 
                     <input class ="form-control" type="text" name="new_product_type" value="{{ $modal->{'product_type'} }}">
					 <p>Бренд</p> 
                     <input class ="form-control" type="text" name="new_product_brand" value="{{ $modal->{'product_brand'} }}">
					 @endforeach
					 @endif
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