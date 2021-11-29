<!DOCTYPE html>
<html lang="en">
<head>
	<title>Student Registration</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('uom/css/std-login.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@1,400;1,700&display=swap" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">

            <form method="POST" action="{{route('student.register.submit')}}" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
                @csrf
                <span class="login100-form-title" style="font-family: 'Ubuntu', sans-serif;">
						<b>Student Registration</b>
                    </span>

                    @if (Session::has('success'))

                    <p style='color:green;text-align:center'><b>Registerd Successfully, Wait for teacher approvel</b></p>
                    <p style='color:green;text-align:center'>We'll notify you with an email.</p></br>
                    @endif

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter name">
						<input class="input100" type="text" name="fullname" value="{{ old('fullname') }}" placeholder="Enter Full name" minlength="4">
						<span class="focus-input100"></span>
                    </div>
                    @if ($errors->has('fullname')) <p style="color:red;margin-top:-15px;margin-left:15px">{{ $errors->first('fullname') }}</p> @endif


					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter father name">
						<input class="input100" type="text" value="{{ old('fname') }}" name="fname" placeholder="Enter Father name" minlength="4">
						<span class="focus-input100"></span>
                    </div>
                    @if ($errors->has('fname')) <p style="color:red;margin-top:-15px;margin-left:15px">{{ $errors->first('fname') }}</p> @endif


					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter a valid address">
						<input class="input100" type="text" value="{{ old('address') }}" name="address" placeholder="Enter Address" minlength="8">
						<span class="focus-input100"></span>
                    </div>
                    @if ($errors->has('address')) <p style="color:red;margin-top:-15px;margin-left:15px">{{ $errors->first('address') }}</p> @endif

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter phone">
						<input class="input100" type="number" value="{{ old('phone') }}" name="phone" placeholder="Enter Phone number" minlength="11">
						<span class="focus-input100"></span>
                    </div>
                    @if ($errors->has('phone')) <p style="color:red;margin-top:-15px;margin-left:15px">{{ $errors->first('phone') }}</p> @endif

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter email">
						<input class="input100" type="email" value="{{ old('email') }}" name="email" placeholder="Enter Email">
						<span class="focus-input100"></span>
                    </div>
                    @if ($errors->has('email')) <p style="color:red;margin-top:-15px;margin-left:15px">{{ $errors->first('email') }}</p> @endif


					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter roll no">
						<input class="input100" type="text" value="{{ old('roll_no') }}" name="roll_no" placeholder="Enter Roll No with session" minlength="7">
						<span class="focus-input100"></span>
                    </div>
                    @if ($errors->has('roll_no')) <p style="color:red;margin-top:-15px;margin-left:15px">{{ $errors->first('roll_no') }}</p> @endif


					<div class="wrap-input100 validate-input m-b-16"  data-validate="Please enter CNIC">
						<input class="input100" type="text" id="cnic" value="{{ old('cnic') }}" name="cnic" placeholder="Enter CNIC" maxlength="13" pattern="\d{13}" title="Please Enter enter 13 digits">
						<span class="focus-input100"></span>
                    </div>
                    @if ($errors->has('cnic')) <p style="color:red;margin-top:-15px;margin-left:15px">{{ $errors->first('cnic') }}</p> @endif



					<div class="wrap-input100 validate-input m-b-16" data-validate="Please select a semester">
						<select class="input100" required name="semester" >
							<option selected="true" disabled="disabled">Select semester</option>
							<option value="1">Semester-I</option>
							<option value="2">Semester-II</option>
							<option value="3">Semester-III</option>
							<option value="4">Semester-IV</option>
							<option value="5">Semester-V</option>
							<option value="6">Semester-VI</option>
							<option value="7">Semester-VII</option>
							<option value="8">Semester-VIII</option>
						</select>
						<span class="focus-input100"></span>
                    </div>
                    @if ($errors->has('semester')) <p style="color:red;margin-top:-15px;margin-left:15px">{{ $errors->first('semester') }}</p> @endif

					<div class="wrap-input100 validate-input m-b-16" value="{{ old('dept') }}" data-validate="Please select a dept">
						<select class="input100" required name="dept">
							<option selected="true" disabled="disabled">Select Department</option>
							<option value="cs">CS</option>
							<option value="it">IT</option>
							<option value="botony">Botony</option>
							<option value="zology">Zology</option>
							<option value="chemistry">Chemistry</option>
							<option value="physics">Physics</option>
							<option value="english">English</option>
							<option value="urdu">Urdu</option>
							<option value="math">Math</option>
						</select>
						<span class="focus-input100"></span>
                    </div>
                    @if ($errors->has('dept')) <p style="color:red;margin-top:-15px;margin-left:15px">{{ $errors->first('dept') }}</p> @endif



					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter password">
						<input class="input100" type="password" name="password" placeholder="Enter Password" minlength="6">
						<span class="focus-input100"></span>
                    </div>
                    @if ($errors->has('password')) <p style="color:red;margin-top:-15px;margin-left:15px">{{ $errors->first('password') }}</p> @endif



					<div class="wrap-input100 validate-input" data-validate = "Please enter confirm_password">
						<input class="input100" type="password" name="password_confirmation" placeholder="Enter Confirm Password" minlength="6">
						<span class="focus-input100"></span>
                    </div>
                    @if ($errors->has('password_confirmation')) <p style="color:red;margin-left:15px">{{ $errors->first('password_confirmation') }}</p> @endif


					<div class="text-right p-t-13 p-b-23">
						<span class="txt1">
							Forgot
						</span>

						<a href="#" class="txt2">
							Username / Password?
						</a>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" name="btn_register" class="login100-form-btn" style="font-family: 'Ubuntu', sans-serif;">
							<b>Register</b>
						</button>
					</div>

					<div class="flex-col-c p-t-70 p-b-40">
						<span class="txt1 p-b-9">
							Already have an account?
						</span>

						<a href="{{route('student.login')}}" class="txt3">
							Sign in now
						</a>
					</div>
                </form>


			<b style=";"></b>

			</div>
		</div>
	</div>


    <script src="{{asset('uom/js/std-login.js')}}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
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
