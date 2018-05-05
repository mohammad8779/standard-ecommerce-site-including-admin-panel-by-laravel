@extends('admin_layout')
@section('admin_content')
	<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Manage Order</h2>
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
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Order Id</th>
								  <th>Customer Name</th>
								  <th>Order Total</th>
								  <th>Order Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   

						  @foreach($all_order_info as $v_order)

						  <tbody>
							<tr>
								<td>{{ $v_order->order_id }}</td>
								<td class="center">{{ $v_order->customer_name }}</td>
								<td class="center">{{ $v_order->order_total }}</td>

								<td class="center">{{ $v_order->order_status}}</td>
								
								<td class="center">

                                   
                                    <a class="btn btn-danger" href="">
                                        <i class="halflings-icon white thumbs-down"></i>
                                    </a>
									
									
                                    
									<a class="btn btn-info" href="{{URL::to('view-order',$v_order->order_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>

									<a class="btn btn-danger" href="">
										<i class="halflings-icon white trash"></i> 
									</a>

								</td>
							</tr>
						
						  </tbody>

						  @endforeach

					  </table>            
					</div>
			</div><!--/span-->
			
	</div><!--/row-->

			
			

@endsection