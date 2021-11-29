<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Complete profie</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->

	{{-- <link rel="stylesheet" type="text/css" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css"> --}}
	<!-- Main Style Css -->
<link rel="stylesheet" href="{{asset('uom/css/teach-profile.css')}}"/>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
   <style>
        #terms{
            font-family: Helvetica;
        }
       button{
           border-radius: 50%;
           margin-right: 500px !important;
           width:50px;height:50px;
           background-color:green;color:white;

           /* position: absolute;right:0;top:0 */
       }


    </style>
</head>
<body>

	<div class="page-content">
		<div class="form-v1-content">
			<div class="wizard-form">

            <form class="form-register" method="post" action="{{route('complete.profile.submit')}}">
                @csrf
		        	<div id="form-total">
		        		<!-- SECTION 1 -->
			            <h2>
			            	<p class="step-icon"><span>01</span></p>
			            	<span class="step-text">Peronal Infomation</span>
			            </h2>

			            <section>
			                <div class="inner">
			                	<div class="wizard-header">
									<h3 class="heading">Peronal Infomation</h3>
									<p>Please enter your infomation and proceed to the next step so we can build your accounts.  </p>
                                </div>
                             @if ($teacher_id = request()->session()->get('teacher_id'))
                            <input type="hidden" name="teacher_id" value="{{$teacher_id}}">
								<div class="form-row">
									<div class="form-holder">
										<fieldset>
											<legend>Name</legend>
                                        <input type="text" disabled="disabled" value="{{request()->session()->get('teacher_fullname')}}" class="form-control input-color" id="first-name" name="fname">
										</fieldset>
									</div>
									<div class="form-holder">
										<fieldset>
											<legend>Email</legend>
											<input type="text" class="form-control" value=" {{request()->session()->get('email') }}" disabled>
										</fieldset>
									</div>
                                </div>




								<div class="form-row">
									<div class="form-holder form-holder-2">
                                    <input type="text" class="form-control input-border" value="{{old('address')}}" name="address" placeholder="Enter Address">
                                        @if ($errors->has('address')) <p style="color:red;margin-top:-0px;margin-left:10px"><small>{{ $errors->first('address') }}</small></p> @endif
                                    </div>

								</div>

								<div class="form-row">
									<div class="form-holder form-holder-2">
										<input type="number" class="form-control input-border" value="{{old('phone')}}" name="phone" placeholder="Enter Phone No">
										@if ($errors->has('phone')) <p style="color:red;margin-top:-0px;margin-left:10px"><small>{{ $errors->first('phone') }}</small></p> @endif
									</div>
								</div>

							</div>


			            </section>



						<!-- SECTION 2 -->
			            <h2>
			            	<p class="step-icon"><span>02</span></p>
			            	<span class="step-text">University Information</span>
			            </h2>
			            <section>
			               <div class="inner">
			                	<div class="wizard-header">
									<h3 class="heading">University Infomation</h3>
									<p>Please enter your infomation and proceed to the next step so we can build your accounts.  </p>
                                </div>

                                <div class="form-row">
									<div class="form-holder">
										<fieldset>
											<legend>Department</legend>
											<input type="text" disabled="disabled" value="{{request()->session()->get('teacher_dept')}}" class="form-control">
										</fieldset>
									</div>
									<div class="form-holder">
										<fieldset>
											<legend>Teaching Semesters</legend>
											<input type="text" class="form-control" value="{{request()->session()->get('teaching_semester')}}" disabled>
										</fieldset>
									</div>
                                </div>
                                       @endif
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Rank</legend>
                                            <input type="text" name="rank" id="your_email" value="{{old('rank')}}" class="form-control" placeholder="Enter Rank">
                                        </fieldset>
                                        @if ($errors->has('rank')) <p style="color:red;margin-top:-0px;margin-left:10px"><small>{{ $errors->first('rank') }}</small></p> @endif
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Salary</legend>
											<input type="text" class="form-control" id="phone" value="{{old('salary')}}" name="salary" placeholder="Enter salary Like 20000">
                                        </fieldset>
                                        @if ($errors->has('salary')) <p style="color:red;margin-top:-0px;margin-left:10px"><small>{{ $errors->first('salary') }}</small></p> @endif
									</div>
								</div>



							</div>
			            </section>

			            <!-- SECTION 3 -->
                        <h2>
			            	<p class="step-icon"><span>03</span></p>
			            	<span class="step-text">Terms & Conditions</span>
			            </h2>
			            <section>
			               <div class="inner">
			                	<div class="wizard-header">
									<h3 class="heading">Terms & Conditions</h3>
									<p>Please verify terms & conditions to proceed to the next step so we can build your accounts.  </p>
                                </div>
                                <div class="card">
                                    <ul id="terms">
                                        <li><p>Your information is authroized by admin</p>
                                        <li><p>Your information remain secret</p></li>
                                        <li><p>All University rules are applied</p></li>
                                    </ul>
                                </div>
                                <div>
                                <input type="checkbox" name="checkbox" required class="form-control">
                                @if ($errors->has('checkbox')) <p style="color:red;margin-top:-0px;margin-left:10px"><small>{{ $errors->first('checkbox') }}</small></p> @endif
                                <p class="text-center">Agree with terms and conditions</b></p>
                            </div>

                            <div class="align-self-end ml-auto">
                            <button id="submit_btn" type="submit" class="btn btn-info"><i style="font-size: 20px" class="zmdi zmdi-check"></i></a></li></button>
                            </div>





                            </div>

			            </section>
		        	</div>
		        </form>
			</div>
		</div>
	</div>



<script src="{{asset('uom/js/teach-profile.js')}}"></script>
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
