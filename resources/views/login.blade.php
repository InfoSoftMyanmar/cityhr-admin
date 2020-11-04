


<!doctype html>
<html lang="en" dir="ltr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="icon" href="favicon.ico" type="image/x-icon"/>

	<title>City HR</title>

	<!-- Bootstrap Core and vandor -->
	<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" />

	<!-- Core css -->
	<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/css/theme2.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/css/general.css') }}" />

	<style>
		.outer {
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.c_modal {
			background-color: #43A047;
			height: 50px;
		}

		.card_padding {
			padding: 10px;
		}
		

		.c_title {
			font-weight: bolder;
			text-align: center;
			display: inline-block;
		}

		.f_title {
			font-size: 9pt;
			color: #9aa0ac;
		}

		.f_padding {
			padding-top: 6px;
		}

		</style>

</head>
<body class="font-montserrat" style="overflow: hidden;">
	@if(session()->has('error'))
		<div class="alert alert-danger">
			{{ session()->get('error') }}
		</div>
	@endif

	<div class="auth outer">
		<div class="auth_center">
			<div class="card card_padding">
				<div class="text-center mb-2">
					<a class="header-brand" href="{{ url('/') }}">
						{{-- <i class="fe fe-command brand-logo"></i> City HR --}}
						<img src="{{ asset('assets/images/icons/cityhr_logo_bg.png') }}" alt="City HR" width="50%">
					</a>
				</div>
				<div class="card-body">
					<form data-toggle="validator" role="form" action="authenticate" method="post">
						{{ csrf_field() }}
						<div class="card-title c_title">Admin Panel Login</div>

						<div class="form-group">
							<input type="email" class="form-control" name="email" aria-describedby="emailHelp" 
							placeholder="Enter email" required>
							<div class="help-block with-errors error_label"></div>
						</div>

						<div class="form-group">							
							<input type="password" class="form-control" name="password" placeholder="Password"  data-minlength="8" 
							data-error="Must enter minimum of 8 characters!" required>
							<div class="help-block with-errors error_label"></div>
							<label class="form-label f_padding"><a href="{{ url('') }}" class="float-right small">Forgot password?</a></label>
						</div>

						<div class="form-group">
							<label class="custom-control custom-checkbox">
								<input type="checkbox" name="remember_me" class="custom-control-input" />
								<span class="custom-control-label">Remember me</span>
							</label>
						</div>
						<div class="form-footer">
							{{-- <a href="{{ route('main.dashboard') }}" class="btn btn-primary btn-block" title="">Sign in</a> --}}

							<button class="btn btn-primary btn-block"	>
								Sign in
							</button>
						</div>
					</form>
				</div>
				<div class="text-center f_title">
					Copyright © 2020 InfoSoft.
				</div>
			</div>
		</div>
	</div>
	

	<script src="{{ asset('assets/bundles/lib.vendor.bundle.js') }}"></script>
	<script src="{{ asset('assets/js/core.js') }}"></script>
	{{-- <script src="{{ asset('assets/js/validator.js') }}"></script> --}}

	<script src="https://code.jquery.com/jquery-1.12.4.js">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js">
	</script>
</body>
</html>
