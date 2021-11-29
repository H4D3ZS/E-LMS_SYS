@extends('lms.teachers.layout')

@section('home')
<div class="row">

    <div class="col-lg-10 col-md-offset-1">

        <h3><b style="font-family: Merriweather">Add Lesson</b></h3><br>

    <form method="POST" action="{{route('lesson.add.submit')}}" enctype="multipart/form-data" style="margin-bottom: 30px">
        @csrf
        <div class="form-group">
		    <label for="name">Enter file title</label>
        <input type="text" name="title" value="{{old('title')}}" class="form-control" placeholder="Enter title">
          </div>
          <small>@if ($errors->has('title')) <p style="color:red;margin-top:-15px">{{ $errors->first('title') }}</p> @endif</small>

		  <div class="form-group">
		    <label for="name">Description</label>
		    <input type="text" name="description"  value="{{old('description')}}" class="form-control" placeholder="Enter description">
          </div>
          <small>@if ($errors->has('description')) <p style="color:red;margin-top:-15px">{{ $errors->first('description') }}</p> @endif</small>

          <div class="form-group">
            <label for="name">Share with</label>
		    <select name="semester"  class="form-control">
                <option selected=true disabled="disabled">Choose Semester</option>
                <option value="1">Semester I</option>
                <option value="2">Semester II</option>
                <option value="3">Semester III</option>
                <option value="4">Semester IV</option>
                <option value="5">Semester V</option>
                <option value="6">Semester VI</option>
                <option value="7">Semester VII</option>
                <option value="8">Semester VIII</option>
            </select>
          </div>
          <small>@if ($errors->has('semester')) <p style="color:red;margin-top:-15px">{{ $errors->first('semester') }}</p> @endif</small>

          <div class="form-group">
            <label for="name">Department</label>
		    <select name="department" class="form-control">
                <option selected=true disabled="disabled">Choose Department</option>
                <option value="cs">CS</option>
                <option value="it">IT</option>
                <option value="zology">Zology</option>
                <option value="botony">Botony</option>
                <option value="english">English</option>
                <option value="urdu">Urdu</option>
                <option value="chemistry">Chemistry</option>
                <option value="physics">Physics</option>
            </select>
          </div>
          <small>@if ($errors->has('department')) <p style="color:red;margin-top:-15px">{{ $errors->first('department') }}</p> @endif</small>

		  <div class="form-group">
		    <label for="name">Video Link</label>
		    <input type="text" name="video_link" value="{{old('link')}}" class="form-control" placeholder="Optional">
          </div>


		  <div class="form-group">
		    <label for="name">Lesson File</label>
		    <input type="file" name="file" value="{{old('file')}}" class="form-control" placeholder="Enter email">
          </div>
          <small>@if ($errors->has('file')) <p style="color:red;margin-top:-15px">{{ $errors->first('file') }}</p> @endif</small>

         <p style="margin-top: -10px">	<small style="color: orange">Upload only | JPG,PNG,PDF,DOC,WORD,XS,PPT | File size<=2MB</small></p>
		  <br>

		  <button type="submit" name="add_lesson" class="btn btn-block btn-primary">Upload File</button>
		</form>

</div>



@endsection
