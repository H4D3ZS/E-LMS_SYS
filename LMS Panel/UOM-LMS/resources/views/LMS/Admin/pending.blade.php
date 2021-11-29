
@extends('lms.admin.layout')

@section('dataTable-styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css"/>
<style>
    table th{
        font-size: 14px;
    }
    label{
        font-size: 13px;
    }
     input{
        border: 1px solid;
    }
</style>
@endsection

@section('home-content')
     <div class="container" style="background-color: white;padding-bottom:80px">
        @if ($pending_teachers->count()<=0)
        <h2 class="text-center" style="margin-top:150px"><b style="font-family: Montserrat;">No Teacher Exists</b></h2>
        @else
        <h2 class="text-center" style="margin-top:100px"><b style="font-family: Montserrat">Pending Teachers</b></h2>
  <table id="example" class="table  table-bordered" style="width:100%">
    <thead>
        <tr>

            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Address</th>
            <th>Teaching Semester</th>
            <th>Registered At</th>
            <th>Approve</th>
            <th>Delete</th>

        </tr>
    </thead>

    @foreach ($pending_teachers as $teacher)
    <tr>
        <td>{{Str::limit($teacher->fullname,10)}}</td>
        <td>{{$teacher->email}}</td>
        <td style="text-transform: uppercase">{{$teacher->dept}}</td>
        <td>{{Str::limit($teacher->address,10)}}</td>
        <td style="text-transform: uppercase">{{$teacher->teaching_semester}}</td>
        <td>{{$teacher->created_at->diffForHumans()}}</td>
        <td>
            <form method="POST" action="{{route('admin.teacher.approve')}}">
            @csrf
            <input type="hidden" name="teacher_id" value="{{$teacher->id}}">
            <input type="submit" value="Approve" class="btn btn-success">
            </form>
        </td>
        <td>
            <form method="POST" action="{{route('admin.teacher.un-approve')}}">
            @csrf
            <input type="hidden" name="teacher_id" value="{{$teacher->id}}">
            <input type="submit" value="Un-Approve" class="btn btn-danger">
            </form>
        </td>

    </tr>
  @endforeach
</tbody>
</table>
@endif
@endsection






@section('dataTable-scripts')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>
<script>
    $(document).ready(function() {
     $('#example').DataTable( {
         // "scrollY": 320,
         "scrollX": true,
     } );
 } );
 </script>
     </div>
@endsection

