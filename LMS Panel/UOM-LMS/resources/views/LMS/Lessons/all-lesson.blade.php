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

        @if ($lessons->count()<=0)
        <h2 class="text-center" style="margin-top:50px"><b style="font-family: Montserrat;">No Lessons Exists</b></h2>
        @else
        <h2 class="text-center" style="margin-top:10px"><b style="font-family: Montserrat">All Lessons</b></h2>
  <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Department</th>
            <th>Semester</th>
            <th>File</th>
            <th>Upload at</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
    </thead>

    @foreach ($lessons as $lesson)
    <tr>
        <td>{{$lesson->title}}</td>
        <td>{{Str::limit($lesson->description,10)}}</td>
        <td style="text-transform: uppercase">{{$lesson->department}}</td>
        <td style="text-transform: uppercase">{{$lesson->semester}}</td>
        <td>{{$lesson->file}}</td>
        <td>{{Carbon\Carbon::parse($lesson->updated_at)->format('d-m-Y')}}</td>
        <td>
        <a class="btn btn-info" href="{{route('lesson.edit',['id'=>$lesson->id])}}">Edit</a>
        </td>
        <td>
            <form method="POST" action="{{route('lesson.delete')}}">
            @csrf
            <input type="hidden" name="lesson_id" value="{{$lesson->id}}">
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
        // "scrollY": 320,
        "scrollX": true,
    } );
} );
</script>

@endsection
