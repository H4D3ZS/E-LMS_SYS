<!DOCTYPE html>
<html lang="en">
<head>
	<title>Student Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('uom/css/std-login.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@1,400;1,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">

            <form method="POST" action="{{route('student.login.submit')}}" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
                @csrf
                <span class="login100-form-title" style="font-family: 'Ubuntu', sans-serif;">
						<b>Student Login</b>
					</span>

                    @if (Session::has('info'))
                    <p style='color:green;text-align:center'><b>Your account is under progress</b></p>
                    <p style='color:green;text-align:center'>When it's complete We'll notify you with an email.</p></br>
                    @endif

                    @if (Session::has('error'))
                    <p style='color:red;text-align:center'><b>Invalid Credentials</b></p>
                    <p style='color:red;text-align:center'>Try again!</p></br>
                    @endif

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
                    </div>
                    @if ($errors->has('username')) <p style="color:red;margin-top:-15px;margin-left:15px">{{ $errors->first('username') }}</p> @endif


					<div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
                    </div>
                    @if ($errors->has('password')) <p style="color:red;margin-left:15px">{{ $errors->first('password') }}</p> @endif

					<div class="text-right p-t-13 p-b-23">
						<span class="txt1">
							Forgot
						</span>

						<a href="#" class="txt2">
							Username / Password?
						</a>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" name="btn_login" class="login100-form-btn" style="font-family: 'Ubuntu', sans-serif;">
							<b>Sign in</b>
						</button>
					</div>

					<div class="flex-col-c p-t-70 p-b-40">
						<span class="txt1 p-b-9">
							Don’t have an account?
						</span>

						<a href="{{route('student.register')}}" class="txt3">
							Sign up now
						</a>
					</div>
				</form>

			</div>
		</div>
	</div>

    <script src="{{asset('uom/js/std-login.js')}}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript">
        @if(Session::has('success'))
         toastr.success('{{Session::get('success')}}')
         @endif

         @if(Session::has('error'))
         toastr.error('{{Session::get('error')}}')
        @endif

        @if(Session::has('info'))
         toastr.info('{{Session::get('info')}}')
        @endif
    </script>

</body>
</html>
