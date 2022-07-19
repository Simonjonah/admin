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
                    <h1 class="card-title"><b>Primary 1/ Preperatory1</b></h1><br>
                </div>
                
                <div class="card-footer">
                    <div class='btn-group'> 
                      <a href="viewprim1subjects" class="btn btn-primary mr-5">Primary 1/ Preperatory1</a>                            
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
                  <h1 class="card-title"><b>Primary 2/ Grade 1</b></h1><br>
              </div>
              
              <div class="card-footer">
                  <div class='btn-group'>
                    <a href="viewprim2subjects" class="btn btn-primary mr-5">Primary 2/ Grade 1</a>                            
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
                <h1 class="card-title"><b>Primary 3/ Grade 2</b></h1><br>
            </div>
            
            <div class="card-footer">
                <div class='btn-group'>
                  <a href="viewprim3subjects" class="btn btn-primary mr-5">Primary 3/ Grade 2</a>                            
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
              <h1 class="card-title"><b>Primary 4/ Grade 3</b></h1><br>
          </div>
          
          <div class="card-footer">
              <div class='btn-group'>
                <a href="viewprim4subjects" class="btn btn-primary mr-5">Primary 4/ Grade 3</a>                            
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
            <h1 class="card-title"><b>Primary 5/ Grade 4</b></h1><br>
        </div>
        
        <div class="card-footer">
            <div class='btn-group'>
              <a href="viewprim5subjects" class="btn btn-primary mr-5">Primary 5/ Grade 4</a>                            
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
            <h1 class="card-title"><b>Primary 6/ Grade 5</b></h1><br>
        </div>
        
        <div class="card-footer">
            <div class='btn-group'>
              <a href="viewprim6subjects" class="btn btn-primary mr-5">Primary 6/ Grade 5</a>                            
            </div>
        </div>
      </div>
  </div>
</div>

</div></div></div></div></div></div></div></div></div>
 
 