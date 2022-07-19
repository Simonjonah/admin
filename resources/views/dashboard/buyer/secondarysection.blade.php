@extends('layouts.apps')

@include('layouts.marketermenu')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark" styel="text-align: transform">Welcome {{ Auth::guard('buyer')->user()->name }} </h1>
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

    

<div class="container text-center" style="margin-top: 50px; margin-bottom: 50px;">
  <div class="row">
    <div class="col-lg-12">
      <h2 class="text-info">Secondary School Subjects</h2>
    </div>
  </div>

</div>

<div class="container"> 
  <div class="row">

      <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card-columns">
            <div class="card" style="width: 21rem;">
              <img src="{{asset('assets/dist/img/teach1.jpg')}}" class="card-img-top" alt="...">
              <div class="card-body">
                  <h3 class="card-title"><b>JSS 1</b></h3><br>
              </div>
             
              <div class="card-footer">
                  <div class='btn-group'>
                      <a href="jss1subject" class="btn btn-primary mr-5">JSS 1</a>                            
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
                <h3 class="card-title"><b>JSS 2</b></h3><br>
            </div>
           
            <div class="card-footer">
                <div class='btn-group'>
                    <a href="jss2subject" class="btn btn-primary mr-5">JSS 2</a>                            
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
              <h3 class="card-title"><b>JSS 3</b></h3><br>
          </div>
         
          <div class="card-footer">
              <div class='btn-group'>
                  <a href="jss3subject" class="btn btn-primary mr-5">JSS 3</a>                            
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
            <h3 class="card-title"><b>SS 1</b></h3><br>
        </div>
       
        <div class="card-footer">
            <div class='btn-group'>
                <a href="ss1subject" class="btn btn-primary mr-5">SS 1</a>                            
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
          <h3 class="card-title"><b>SS 2</b></h3><br>
      </div>
     
      <div class="card-footer">
          <div class='btn-group'>
              <a href="ss2subject" class="btn btn-primary mr-5">SS 2</a>                            
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
        <h3 class="card-title"><b>SS 3</b></h3><br>
    </div>
   
    <div class="card-footer">
        <div class='btn-group'>
            <a href="ss3subject" class="btn btn-primary mr-5">SS 3</a>                            
        </div>
    </div>
  </div>
</div>
</div>
  </div>
</div></div></div></div></div>
 
 