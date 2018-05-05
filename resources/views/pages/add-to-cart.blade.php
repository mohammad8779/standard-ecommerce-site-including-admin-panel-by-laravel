@extends('layout')

@section('content')

	<section id="cart_items">
		<div class="container col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td width="15%" class="image">Image</td>
							<td width="15%" class="description">Name</td>
							<td width="15%" class="price">Price</td>
							<td width="35%" class="quantity">Quantity</td>
							<td width="10%" class="total">Total</td>
							<td width="10%" class="total">Action</td>
							
						</tr>
					</thead>
					<tbody>

						<?php 
						    $contents = Cart::content();
							foreach($contents as $v_content){
						?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to($v_content->options->image)}}" width="80" height="60px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$v_content->name}}</a></h4>
								
							</td>
							<td class="cart_price">
								<p>{{$v_content->price}}TK</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
								 <form action="{{url('update-cart-product')}}" method="post">
								 	{{ csrf_field() }}
									<input class="cart_quantity_input" type="text" name="qty" value="{{$v_content->qty}}">
									<input class="cart_quantity_input" type="hidden" name="rowId" value="{{$v_content->rowId}}">
									<input type="submit" name="submit" value="update">
								 </form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$v_content->total}}TK</p>
							</td>
							<td class="cart_delete">
								<a onclick="return confirm('are you sure to delete!')"class="cart_quantity_delete" href="{{URL::to('/delete-cart-product/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>

						<?php } ?>
						
						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container col-sm-12">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>{{Cart::subtotal()}}</span></li>
							<li>Eco Tax <span>{{Cart::tax()}}</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>{{Cart::total()}}</span></li>
						</ul>
							

							

							<?php
                                $customer_id = Session::get('customer_id');
                                if( $customer_id != NULL){
                            ?>

                             <a href="{{URL::to('/checkout')}}" class="btn btn-default check_out" >Checkout</a>
                            <?php } else{?>

                             <a class="btn btn-default check_out" href="{{URL::to('/check-login')}}">Checkout</a> 
                            <?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection