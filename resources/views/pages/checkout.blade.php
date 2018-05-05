@extends('layout')

@section('content')

	<section id="cart_items">
		<div class="container col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			

			<div class="register-req">
				<p>Please fill up the below form</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-10">
						<div class="shopper-info">
							<p>Customer Information for shipping</p>
							<form action="{{URL::to('/save-shipping-info')}}" method="post">
								{{ csrf_field() }}
								<input type="text" name="shipping_email" placeholder="Email">
								<input type="text" name="shipping_first_name" placeholder="First Name">
								<input type="text" name="shipping_last_name" placeholder="Last Name">
								<input type="text" name="shipping_address" placeholder="Address">
								<input type="text" name="shipping_phone" placeholder="Phone">
								<input type="text" name="shipping_city" placeholder="City">

								<input type="submit" value="Done" class="btn btn-default">

							</form>
							
							
						</div>
					</div>
					
										
				</div>
			</div> 
		</div>
	</section> <!--/#cart_items-->

@endsection