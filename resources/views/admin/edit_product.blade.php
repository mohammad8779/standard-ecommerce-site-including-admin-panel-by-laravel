@extends('admin_layout')

@section('admin_content')
	
	      <ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Forms</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Update Product</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<p class="alert-success">
						<?php 

							$message = Session::get('message');
							if($message){

								echo $message;
                                
                                Session::put('message',NULL);
							}
						?>
				     </p>
					<div class="box-content">


						<form class="form-horizontal" action="{{url('/update-product',$product_info->product_id)}}" method="post" enctype="multipart/form-data">

						  {{ csrf_field() }}

						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="date01">Product Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_name" required="" value="{{$product_info->product_name}}">
							  </div>
							</div>

							

							  <div class="control-group">
								<label class="control-label" for="selectError3">Product Category</label>
								<div class="controls">
								  <select id="selectError3" name="category_id">
								  	<option>Select Category</option>
								  	
								  	<?php 

			                            $all_category_products = DB::table('tbl_category')
			                              ->where('publication_status', 1)
			                              ->get();
			                              foreach($all_category_products as $v_category){ 
			                        ?>


	                                 <option 

	                                     <?php if($product_info->category_id == $v_category->category_id){ ?>

                                                 selected = 'selected';

                                         <?php } ?>

	                                   value="{{$v_category->category_id}}">

	                                   {{$v_category->category_name}}</option>


									     <?php } ?>

								  </select>
								</div>
							  </div>



							  <div class="control-group">
								<label class="control-label" for="selectError3">Product Manufacture</label>
								<div class="controls">
								  <select id="selectError3" name="manufacture_id">

								  	<option>Select Manufacture</option>
								  	<?php 

                                    $all_manufacture_products = DB::table('tbl_manufacture')
                                         ->where('publication_status', 1)
                                         ->get();

                                         foreach($all_manufacture_products as $v_manufacture){
                                    ?>
									<option <?php if($product_info->manufacture_id == $v_manufacture->manufacture_id){ ?>
	                                     
                                             selected = 'selected';

                                         <?php } ?> 

                                         value="{{$v_manufacture->manufacture_id}}">{{$v_manufacture->manufacture_name}}</option>
									<?php } ?>
								  </select>
								</div>
							  </div>

							        
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Short Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_short_description" rows="3" required="">
									{{$product_info->product_short_description}}
								</textarea>
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Long Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_long_description" rows="3" required="">
									{{$product_info->product_long_description}}
								</textarea>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Product Price</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_price" required="" value="{{$product_info->product_price}}">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Product Size</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_size" required="" value="{{$product_info->product_size}}">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Product Color</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_color" required="" value="{{$product_info->product_color}}">
							  </div>
							</div>

							<div class="control-group">
								<label class="control-label">Product Image Upload</label>
								<div class="controls">
								 <img src="{{asset($product_info->product_image)}}" width="100px" height="100px"> </br></br>
								  <input type="file" name="product_image">
								</div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication Status</label>
							  <div class="controls">
								<input type="checkbox" name="publication_status" rows="3" value="1">
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update Product</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   



					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection