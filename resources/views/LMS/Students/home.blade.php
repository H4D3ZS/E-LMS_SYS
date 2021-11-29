<!DOCTYPE html>
<html lang="en">
<head>
<title>Student Home</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('uom/css/std-home.css')}}">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.3/ScrollMagic.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

<style>
    @media only screen and (min-width: 1024px)
{
	.uom
	{
        margin-top: 60px;
	}
}
</style>
</head>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header d-flex flex-row">
		<div class="header_content d-flex flex-row align-items-center">
			<!-- Logo -->
			<div class="logo_container">
				<div class="logo">
                <img src="{{asset('uom/images/students/logo.png')}}" alt="UOM-Logo">
					<span>UOM</span>
				</div>
			</div>

			<!-- Main Navigation -->
			<nav class="main_nav_container">
				<div class="main_nav">
					<ul class="main_nav_list">
                    <li class="main_nav_item"><a style="color: #ffb606" href="{{route('student.home')}}">home</a></li>
                    <li class="main_nav_item"><a href="{{route('lesson')}}">Lessons</a></li>
						<li class="main_nav_item"><a href="courses.html">assignment</a></li>
						<li class="main_nav_item"><a href="{{route('meeting.credentials')}}">Meeting Details</a></li>
						<li class="main_nav_item"><a href="news.html">Contact us</a></li>
						<li class="main_nav_item">
                            {{-- <a href="" style="color: #c82333;color:white" class="btn btn-danger">Logout</a> --}}
                            <form method="POST" action="{{route('student.logout')}}">
                                    @csrf
                                    <input type="submit" value="Logout" class="btn btn-danger">
                                </form>
                            </li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="header_side d-flex flex-row justify-content-center align-items-center">
			{{-- <img src="images/phone-call.svg" alt=""> --}}
			<span>+43 4566 7788 2457</span>
		</div>

		<!-- Hamburger -->
		<div class="hamburger_container">
			<i class="fas fa-bars trans_200"></i>
		</div>

	</header>

	<!-- Menu -->
	<div class="menu_container menu_mm">

		<!-- Menu Close Button -->
		<div class="menu_close_container">
			<div class="menu_close"></div>
		</div>

		<!-- Menu Items -->
		<div class="menu_inner menu_mm">
			<div class="menu menu_mm">
				<ul class="menu_list menu_mm">
					<li class="menu_item menu_mm"><a href="#">Home</a></li>
					<li class="menu_item menu_mm"><a href="#">About us</a></li>
					<li class="menu_item menu_mm"><a href="courses.html">Courses</a></li>
					<li class="menu_item menu_mm"><a href="elements.html">Elements</a></li>
					<li class="menu_item menu_mm"><a href="news.html">News</a></li>
					<li class="menu_item menu_mm"><a href="contact.html">Contact</a></li>
				</ul>

				<!-- Menu Social -->

				<div class="menu_social_container menu_mm">
					<ul class="menu_social menu_mm">
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>
			</div>

		</div>

	</div>

	<!-- Home -->

	<div class="main-section" style="margin-top: 200px">
		<div class="row">
			<div class="col-md-12 text-center uom">
				<img src="{{asset('uom/images/uosm.jpg')}}" style="border-radius: 50%" width="200px">
			</div>
		</div>
	</div>

	<div class="events page_section">
		<div class="container">

			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Upcoming Events</h1>
					</div>
				</div>
			</div>

			<div class="event_items">

				<!-- Event Item -->
				<div class="row event_item">
					<div class="col">
						<div class="row d-flex flex-row align-items-end">

							<div class="col-lg-2 order-lg-1 order-2">
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
									<div class="event_day">07</div>
									<div class="event_month">January</div>
								</div>
							</div>

							<div class="col-lg-6 order-lg-2 order-3">
								<div class="event_content">
									<div class="event_name"><a class="trans_200" href="#">Student Festival</a></div>
									<div class="event_location">Grand Central Park</div>
									<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor.</p>
								</div>
							</div>

							<div class="col-lg-4 order-lg-3 order-1">
								<div class="event_image">

									<img src="{{asset('uom/images/students/event_1.jpg')}}" alt="uom-events">
								</div>
							</div>

						</div>
					</div>
				</div>

				<!-- Event Item -->
				<div class="row event_item">
					<div class="col">
						<div class="row d-flex flex-row align-items-end">

							<div class="col-lg-2 order-lg-1 order-2">
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
									<div class="event_day">07</div>
									<div class="event_month">January</div>
								</div>
							</div>

							<div class="col-lg-6 order-lg-2 order-3">
								<div class="event_content">
									<div class="event_name"><a class="trans_200" href="#">Open day in the Univesrsity campus</a></div>
									<div class="event_location">Grand Central Park</div>
									<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor.</p>
								</div>
							</div>

							<div class="col-lg-4 order-lg-3 order-1">
								<div class="event_image">
                                    <img src="{{asset('uom/images/students/event_2.jpg')}}" alt="uom-events">
								</div>
							</div>

						</div>
					</div>
				</div>

				<!-- Event Item -->
				<div class="row event_item">
					<div class="col">
						<div class="row d-flex flex-row align-items-end">

							<div class="col-lg-2 order-lg-1 order-2">
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
									<div class="event_day">07</div>
									<div class="event_month">January</div>
								</div>
							</div>

							<div class="col-lg-6 order-lg-2 order-3">
								<div class="event_content">
									<div class="event_name"><a class="trans_200" href="#">Student Graduation Ceremony</a></div>
									<div class="event_location">Grand Central Park</div>
									<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor.</p>
								</div>
							</div>

							<div class="col-lg-4 order-lg-3 order-1">
								<div class="event_image">
									<img src="{{asset('uom/images/students/event_3.jpg')}}" alt="uom-events">
								</div>
							</div>

						</div>
					</div>
				</div>

			</div>

		</div>
	</div>

	<!-- Footer -->
 @include('lms/students/home-footer')
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
