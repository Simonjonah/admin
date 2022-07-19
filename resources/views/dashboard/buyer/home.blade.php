@extends('layouts.apps')

@include('layouts.marketermenu')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark" styel="text-align: transform">Welcome  {{ Auth::guard('buyer')->user()->name }}</h1>
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
                    <h3 class="card-title"><b>Primary School</b></h3><br>
                </div>
                
                <div class="card-footer">
                    <div class='btn-group'>
                      <a href="primarysection" class="btn btn-primary mr-5">Primary School</a>                            
                    </div>
                </div>
              </div>
          </div>
        </div>
        
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card-columns">
            <div class="card" style="width: 21rem;">
              <img src="{{asset('assets/dist/img/teach1.jpg')}}" class="card-img-top" alt="...">
              <div class="card-body">
                  <h3 class="card-title"><b>Secondary School</b></h3><br>
              </div>
              
              <div class="card-footer">
                  <div class='btn-group'>
                    <a href="secondarysection" class="btn btn-primary mr-5">Secondary School</a>                            
                  </div>
              </div>
            </div>
        </div>
      </div>
      

</div>



</div>
</div>
</div></div></div>
 
 
 