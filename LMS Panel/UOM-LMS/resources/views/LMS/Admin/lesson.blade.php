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
        @if ($lessons->count()<=0)
        <h2 class="text-center" style="margin-top:150px"><b style="font-family: Montserrat;">No Lesson Exists</b></h2>
        @else
        <h2 class="text-center" style="margin-top:100px"><b style="font-family: Montserrat">All Lessons</b></h2>
  <table id="example" class="table  table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Department</th>
            <th>Semester</th>
            <th>File</th>
            <th>Upload at</th>
            <th>Delete</th>
            <th>Download</th>

        </tr>
    </thead>

    @foreach ($lessons as $lesson)
    <tr>
        <td>{{$lesson->title}}</td>
        <td>{{Str::limit($lesson->description,10)}}</td>
        <td style="text-transform: uppercase">{{$lesson->department}}</td>
        <td style="text-transform: uppercase">{{$lesson->semester}}</td>
        <td>{{$lesson->file}}</td>
        <td>{{$lesson->updated_at->diffForHumans()}}</td>
        <td>
            <form method="POST" action="{{route('lesson.delete')}}">
            @csrf
            <input type="hidden" name="lesson_id" value="{{$lesson->id}}">
            <input type="submit" value="Delete" class="btn btn-danger">
            </form>
        </td>
        <td>
            <form method="POST">
            @csrf
            <input type="hidden" name="lesson_id" value="id">
            <a style="color:white" href="{{route('admin.file.download',['file'=>$lesson->file])}}" class="btn btn-primary"><i class="fa fa-download"></i> Download</a>
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

