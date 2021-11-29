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
						<li class="main_nav_item"><a style="color: #ffb606" href="{{route('lesson')}}">Lessons</a></li>
						<li class="main_nav_item"><a href="courses.html">assignment</a></li>
                    <li class="main_nav_item"><a href="{{route('meeting.credentials')}}">Meeting Details</a></li>
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

<div class="main-section" style="margin-top: 220px">
     <div class="container">
         @if ($lessons->count()<=0)
            <div class="card">
                <div class="card-header text-center">
                   <a class="btn btn-danger pl-5 pr-5" style="color: white;font-size:18px">Alert</a>
                </div>
                <div class="card-body text-center pb-5 pt-5">
                    <h2><b>No Lesson is uploaded yet</b></h2>
                </div>
            </div>
             @else
            <h1 class="text-center" style="margin-top:10px"><b style="font-family: Montserrat">All Lessons</b></h2>
                <table id="example" class="table  table-bordered" style="width:100%">
                  <thead>
                      <tr>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Teacher</th>
                          <th>File</th>
                          <th>Video Link</th>
                          <th>Upload At</th>
                          <th>View</th>
                          <th>Download</th>
                      </tr>
                  </thead>
                  @foreach ($lessons as $lesson)
                  <tr>
                      <td>{{$lesson->title}}</td>
                      <td>{{Str::limit($lesson->description,10)}}</td>
                      <td style="text-transform: uppercase">
                        {{$lesson->teacher->fullname}}</td>
                      <td style="text-transform: uppercase">{{Str::limit($lesson->file,10)}}</td>
                      <td>{{$lesson->video_link}}</td>
                      <td>{{$lesson->created_at->diffForHumans()}}</td>
                      <td>
                      <a class="btn btn-info" href="">View</a>
                      </td>
                      <td>
                          <form method="POST">
                          @csrf
                          <input type="hidden" name="lesson_id" value="id">
                          <a style="background-color: #FFD333;color:white" href="{{route('file.download',['file'=>$lesson->file])}}" class="btn"><i class="fa fa-download"></i> Download</a>
                          </form>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
              </table>
              @endif
              <br><br>


	</div>
</div>


	<!-- Footer -->
@include('lms/students/home-footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script>
   $(document).ready(function() {
    $('#example').DataTable( {
        "scrollX": true,
        "pageLength": 5
    } );
} );
</script>
