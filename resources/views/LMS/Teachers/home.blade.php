@extends('lms/teachers/layout')


@section('home')

 <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">

            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="{{route('teacher.home')}}">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i>
            </li>
        </ol>
        {{-- end bread crum --}}



<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                  <div class='huge'>
                      @if ($total_lessons)
                      {{$total_lessons}}
                        @else
                        0
                      @endif
                  </div>
                        <div>Lessons</div>
                    </div>
                </div>
            </div>
        <a href="{{route('lesson.all.show')}}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <div class='huge'>
                        @if ($total_students)
                            {{$total_students}}
                            @else
                            0
                        @endif
                    </div>
                      <div>Students</div>
                    </div>
                </div>
            </div>
        <a href="{{route('student.all.show')}}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div class='huge'>
                        @if ($pending_students)
                        {{$pending_students}}
                        @else
                        0
                    @endif
                    </div>
                        <div> Pending Students</div>
                    </div>
                </div>
            </div>
            <a href="{{route('student.pending.show')}}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class='huge'>0</div>
                         <div>Assignments</div>
                    </div>
                </div>
            </div>
            <a href="includes/View_all_categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>

@endsection
