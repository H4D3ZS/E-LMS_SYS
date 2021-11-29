@extends('lms.admin.layout')

@section('chart-scripts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],
      ['Active',     9],
      ['Block',      3],
      ['Pending',  1],
      ['Repeater', 4],
      ['Spam',    2]
    ]);

    var options = {
      title: 'Last 28 days',

    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
  }
</script>

<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],
      ['Active',     10],
      ['Block',      2],
      ['Pending',  5],
      ['Repeater', 2],
      ['Spam',    2]
    ]);

    var options = {
      title: 'Last 28 days',
      pieHole: 0.4,
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
    chart.draw(data, options);
  }
</script>
@endsection

@section('home-content')
     <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <a style="color: black" href="{{route('admin.lesson.all')}}">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-book-reader"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Courses</span>
              <span class="info-box-number">
               @if ($lessons)
                   {{$lessons}}
                   @else
                   0
               @endif

              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
            </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->


        <div class="col-12 col-sm-6 col-md-3">
        <a style="color: black" href="{{route('admin.teacher.active.show')}}">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Teachers</span>
                <span class="info-box-number">
                      @if ($active_teachers)
                      {{$active_teachers}}
                      @else
                      0
                      @endif
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </a>
          </div>

        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="col-12 col-sm-6 col-md-3">
            <a style="color: black" href="{{route('admin.teacher.pending.show')}}">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Pending</span>
                    <span class="info-box-number">
                          @if ($pending_teachers)
                          {{$pending_teachers->count()}}
                          @else
                          0
                          @endif
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </a>
              </div>
        <!-- /.col -->

        <div class="col-12 col-sm-6 col-md-3">
            <a style="color: black" href="/test">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Students</span>
              <span class="info-box-number">
                @if ($students)
                {{$students}}
                @else
                0
                @endif
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
            </a>
        </div>
        <!-- /.col -->

      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Monthly Registered Students Report</h5>


            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <p class="text-center">
                    <strong>Students Reports</strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->

                    <div id="piechart" style="width:500px; height: 300px;"></div>

                  </div>
                  <!-- /.chart-responsive -->
                </div>

                <div class="col-md-6">

                  <p class="text-center">
                    <strong>Teachers Reports</strong>
                  </p>

                      <div class="chart">
                      <!-- Sales Chart Canvas -->
                           <div id="donutchart" style="width: 500px; height: 300px;"></div>
                      </div>
                  <!-- /.chart-responsive -->

                </div>


                <!-- /.col -->

                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./card-body -->
            <div class="card-footer">
              <div class="row">
                <div class="col-sm-3 col-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                    <h5 class="description-header">$35,210.43</h5>
                    <span class="description-text">TOTAL Students</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                    <h5 class="description-header">$10,390.90</h5>
                    <span class="description-text">Pending Students</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                    <h5 class="description-header">$24,813.53</h5>
                    <span class="description-text">Entrolled Students</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-6">
                  <div class="description-block">
                    <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                    <h5 class="description-header">1200</h5>
                    <span class="description-text">GOAL COMPLETIONS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>





          <!-- TABLE: LATEST ORDERS -->
          <div class="card">
            <div class="card-header border-transparent">
              <h3 class="card-title"><b>Last 28 days Registered Teachers</b></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive">
                  @if ($teachers->count()<=0)
                  No Teacher Exists
                  @else

                <table class="table m-0">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Registered At</th>
                  </tr>
                  </thead>
                  <tbody>
            @foreach ($teachers as $teacher)

                  <tr>
                  <td><a href="pages/examples/invoice.html">{{$teacher->fullname}}</a></td>
                    <td>{{$teacher->email}}</td>
                    <td>
                       @if ($teacher->isVerified==1)
                       <span class="badge badge-success">Verified</span>
                           @else
                           <span class="badge badge-warning">Pending</span>
                       @endif
                        </td>
                    <td>
                    <div class="sparkbar" data-color="#00a65a" data-height="20">{{$teacher->created_at->diffForHumans()}}</div>
                    </td>
                  </tr>
           @endforeach
                  </tbody>
                </table>
                @endif
              </div>
              <!-- /.table-responsive -->
            </div>

            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Pending Teachers</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Teachers</a>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>

        <!-- /.col -->

        <div class="col-md-12">
          <!-- Info Boxes Style 2 -->
          <div class="info-box mb-3 bg-warning">
            <span class="info-box-icon"><i class="fas fa-tag"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Categorie</span>
              <span class="info-box-number">1,200</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box mb-3 bg-success">
            <span class="info-box-icon"><i class="far fa-heart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Mentions</span>
              <span class="info-box-number">92,050</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box mb-3 bg-danger">
            <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Downloads</span>
              <span class="info-box-number">114,381</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box mb-3 bg-info">
            <span class="info-box-icon"><i class="far fa-comment"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Direct Messages</span>
              <span class="info-box-number">163,921</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->



            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->

<!-- /.content-wrapper -->


@endsection
