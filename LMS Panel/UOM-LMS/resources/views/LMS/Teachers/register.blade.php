<!DOCTYPE html>
<html lang="en">
<head>
	<title>Teacher Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('uom/css/std-login.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/js/jquery.multi-select.min.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        [class^='select2'] {
        border-radius: 20px !important;
        }
    </style>
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">

            <form method="POST" action="{{route('teacher.register.submit')}}" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
                @csrf
                <span class="login100-form-title" style="font-family: 'Ubuntu', sans-serif;background-color:#57b846">
						<b>Teacher Register</b>
					</span>

                    @if (Session::has('success'))

                    <p style='color:green;text-align:center'><b>Registerd Successfully, Wait for admin approvel</b></p>
                    <p style='color:green;text-align:center'>We'll notify you with an email.</p></br>
                    @endif

                    <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter fullname">
						<input class="input100" type="text" value="{{old('fullname')}}" name="fullname" placeholder="Full Name">
						<span class="focus-input100"></span>
                    </div>
                    @if ($errors->has('fullname')) <p style="color:red;margin-top:-15px;margin-left:15px">{{ $errors->first('fullname') }}</p> @endif

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter email">
						<input class="input100" type="email" value="{{old('email')}}" name="email" placeholder="Email">
						<span class="focus-input100"></span>
                    </div>
                    @if ($errors->has('email')) <p style="color:red;margin-top:-15px;margin-left:15px">{{ $errors->first('email') }}</p> @endif


                    <div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
                    </div>
                    @if ($errors->has('password')) <p style="color:red;margin-left:15px">{{ $errors->first('password') }}</p> @endif

                    <div class="wrap-input100 validate-input mt-3" data-validate = "Please enter password">
						<input class="input100" type="password" name="password_confirmation" placeholder="Confirm Password">
						<span class="focus-input100"></span>
                    </div>
                    @if ($errors->has('password')) <p style="color:red;margin-left:15px">{{ $errors->first('password') }}</p> @endif


                    <div class="wrap-input100 validate-input m-b-16 mt-3" data-validate="Please select a semester">
						<select class="input100" required name="department" >
							<option selected="true" disabled="disabled">Select your department</option>
							<option value="cs">CS</option>
							<option value="it">IT</option>
							<option value="english">English</option>
							<option value="urdu">URDU</option>
							<option value="physics">Physics</option>
							<option value="math">Math</option>
							<option value="biology">Biology</option>
							<option value="botony">Botony</option>
						</select>
						<span class="focus-input100"></span>
                    </div>
                    @if ($errors->has('department')) <p style="color:red;margin-top:-15px;margin-left:15px">{{ $errors->first('department') }}</p> @endif


                    <div class="wrap-input100 validate-input m-b-16 mt-4">
                    <select id="select2" class="form-control input100 ml-3" name="teaching_semester[]" placeholder="Teaching Semester" multiple="multiple">
                        <option value="1">Semester 1</option>
                        <option value="2">Semester 2</option>
                        <option value="3">Semester 3</option>
                        <option value="4">Semester 4</option>
                        <option value="5">Semester 5</option>
                        <option value="6">Semester 6</option>
                        <option value="7">Semester 7</option>
                        <option value="8">Semester 8</option>
                      </select>
                      <span class="focus-input100"></span>
                    </div>
                      @if ($errors->has('teaching_semester')) <p style="color:red;margin-top:-15px;margin-left:15px">{{ $errors->first('teaching_semester') }}</p> @endif


					<div class="container-login100-form-btn mt-4">
						<button type="submit" name="btn_login" class="login100-form-btn" style="font-family: 'Ubuntu', sans-serif;background-color:#57b846">
							<b>Register</b>
						</button>
					</div>

					<div class="flex-col-c p-t-70 p-b-40">
						<span class="txt1 p-b-9">
							Already an account?
						</span>

						<a href="{{route('teacher.login')}}" class="txt3">
							Sign in
						</a>
					</div>
				</form>

			</div>
		</div>
	</div>

    <script src="{{asset('uom/js/std-login.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/js/jquery.multi-select.js" type="text/javascript"></script>
    <script>

      $('#select2').select2({
        placeholder: {
            id: '-1', // the value of the option
            text: ' Select your teaching semesters'
        }
        });
    </script>
    <script type="text/javascript">
        @if(Session::has('success'))
         toastr.success('{{Session::get('success')}}')
         @endif

         @if(Session::has('error'))
         toastr.error('{{Session::get('error')}}')
        @endif
    </script>

</body>
</html>
