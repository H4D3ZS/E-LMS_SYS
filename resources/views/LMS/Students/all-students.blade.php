@extends('lms.teachers.layout')

@section('dataTable-styles')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css">
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
@endsection

@section('home')

 <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">

            <small></small>
        </h1>
        {{-- end bread crum --}}

        @if ($active_students->count()<=0)
        <h2 class="text-center" style="margin-top:50px"><b style="font-family: Montserrat;">No Student Exists</b></h2>
        @else
        <h2 class="text-center" style="margin-top:10px"><b style="font-family: Montserrat">All Students</b></h2>
        <table id="example"class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Roll No</th>
                <th scope="col">Department</th>
                <th scope="col">Semester</th>
                <th scope="col">Email</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($active_students as $student)
                <tr>
                    <td>{{$student->fullname}}</td>
                    <td>{{$student->roll_no}}</td>
                    <td style="text-transform: uppercase">{{$student->dept}}</td>
                    <td>{{$student->semester}}</td>
                    <td><a style="text-decoration: none">{{$student->email}}</a></td>
                    <td>
                        <form method="POST" action="{{route('student.delete')}}">
                        @csrf
                        <input type="hidden" name="std_id" value="{{$student->id}}">
                        <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          @endif
@endsection
@section('dataTable-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
     $('#example').DataTable( {
         "scrollX": true
     } );
 } );
 </script>


@endsection
