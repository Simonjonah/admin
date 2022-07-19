@extends('layouts.apps')

@include('layouts.marketermenu')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1 class="m-0 text-dark" styel="text-align: transform">Welcome  </h1> --}}
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Student/Pupil's Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    {{-- <h1>Primary && Nursery Subjects</h1> --}}
    <!-- /.content -->
 
    <div class="container"> 
      <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-12">
              <div class="card-columns">
                <div class="card" style="width: 21rem;">
                  <img src="{{asset('assets/dist/img/teach9.jpg')}}" class="card-img-top" alt="...">
                  <div class="card-body">
                      <h1 class="card-title"><a href="primary3g4"><b>Mathematics</a></b></h1><br>
                  </div>
                 
                  <div class="card-footer">
                      <div class='btn-group'>
                          <a href="primary3g4" class="btn btn-primary mr-5">View All Mathematics</a>                            
                      </div>
                  </div>
                </div>
              </div>
          </div>

          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card-columns">
              <div class="card" style="width: 21rem;">
                <img src="{{asset('assets/dist/img/teach9.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h1 class="card-title"><a href="primary3english"><b>English Language</a></b></h1><br>
                </div>
               
                <div class="card-footer">
                    <div class='btn-group'>
                        <a href="primary3english" class="btn btn-primary mr-5">View All English Language</a>                            
                    </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card-columns">
              <div class="card" style="width: 21rem;">
                <img src="{{asset('assets/dist/img/teach9.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h1 class="card-title"><a href="primary3Quantitative"><b>Quantitative Analysis</a></b></h1><br>
                </div>
               
                <div class="card-footer">
                    <div class='btn-group'>
                        <a href="primary3Quantitative" class="btn btn-primary mr-5">View All Quantitative Analysis</a>                            
                    </div>
                </div>
              </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card-columns">
              <div class="card" style="width: 21rem;">
                <img src="{{asset('assets/dist/img/teach9.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h1 class="card-title"><a href="primary3Verbal"><b>Verbal</a></b></h1><br>
                </div>
               
                <div class="card-footer">
                    <div class='btn-group'>
                        <a href="primary3Verbal" class="btn btn-primary mr-5">View All Verbal</a>                            
                    </div>
                </div>
              </div>
            </div>
        </div>

        
    </div>
  </div>

</div>


  
  </div>
 <!-- /.content-wrapper -->

 

 
 