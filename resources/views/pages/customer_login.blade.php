@extends('layout')

@section('content')

	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-3 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="{{URL::to('/customer-login')}}" method="post">
							{{ csrf_field() }}
							<input type="email" name="customer_email" placeholder="Email" />

							<input type="password" name="customer_password" placeholder="Password" />
							
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-5">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="{{URL::to('/customer-registration')}}" method="post">
							{{ csrf_field() }}
							<input type="text" placeholder="Name" name="customer_name"/>

							<input type="email" placeholder="Email Address" name="customer_email"/>

							<input type="password" placeholder="Password" name="customer_password"/>

							<input type="password" placeholder="Phone Number" name="customer_phone"/>

							<button type="submit" class="btn btn-default">Signup</button>
							
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

@endsection