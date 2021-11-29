<!DOCTYPE html>
<html lang="en">
<head>
<title>Lesson page</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('uom/css/std-home.css')}}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.3/ScrollMagic.js"></script>

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
                    <li class="main_nav_item"><a href="{{route('student.home')}}">home</a></li>
						<li class="main_nav_item"><a href="{{route('lesson')}}">Lessons</a></li>
						<li class="main_nav_item"><a href="courses.html">assignment</a></li>
						<li class="main_nav_item"><a style="color: #ffb606" href="{{route('meeting.credentials')}}">Meeting Details</a></li>
						<li class="main_nav_item"><a href="news.html">Contact us</a></li>
                        <li class="main_nav_item">
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
			<img src="images/phone-call.svg" alt="">
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
					<li class="menu_item menu_mm"><a href="elements.html">Meeting Credentials</a></li>
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

<div class="main-section" style="margin-top: 220px">
     <div class="container">

            <div class="card">
                <div class="card-header text-center">
                    <h2 style="color: green"><b>Your Meeting Credentials</b></h2>
                </div>
                <div class="card-body text-center pb-5 pt-5">
                    <p><b>Meeting ID: 783 321 121</b></p>
                    <p><b>Pass Code: 6rua32</b></p>
                </div>
            </div><br><br>




	</div>
</div>


	<!-- Footer -->
@include('lms/students/home-footer')


