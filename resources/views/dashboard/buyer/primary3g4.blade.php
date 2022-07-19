@extends('layouts.apps')

@include('layouts.marketermenu')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark" styel="text-align: transform">Welcome  </h1>
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
    <h1>Primary && Nursery Subjects</h1>
    <!-- /.content -->
    @if(count($primaryvideos ) > 0)
    <div class="container"> 
      <div class="row">
        @foreach($primaryvideos as $primaryvideo)
          <div class="col-lg-4 col-md-6 col-sm-12">
              <div class="card-columns">
                <div class="card" style="width: 21rem;">
                  <img src="{{asset('assets/dist/img/teach9.jpg')}}" class="card-img-top" alt="...">
                  <div class="card-body">
                      <h1 class="card-title"><a href="singlesubject/{{$primaryvideo->id}}"><b>{{$primaryvideo->subject}}</a></b></h1><br>
                  </div>
                 
                  <div class="card-footer">
                      <div class='btn-group'>
                          <a href="singlesubject/{{$primaryvideo->id}}" class="btn btn-primary mr-5">Buy Now!</a>                            
                      </div>
                  </div>
                </div>
              </div>
          </div>
          @endforeach
    </div>
  </div>
  @endif
  <!-- /.row -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <div class="card-title">
                   The Primary Subjects
                </div>
              </div>
              <div class="card-body">
                <div>
                  <div class="btn-group w-100 mb-2">
                    <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> All items </a>
                    @foreach($primaryvideos as $primaryvideo)
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="{{$primaryvideo->subject}}"> {{$primaryvideo->subject}} </a>
                    @endforeach
                  
                  </div>
                  
                </div>
                <div>
                @foreach($primaryvideos as $primaryvideo)
                  <div class="filter-container p-0 row">
                    <div class="filtr-item col-sm-2" data-category="{{$primaryvideo->subject}}" data-sort="white sample">
                      <a  href="singlesubject/{{$primaryvideo->id}}"  data-title="sample 1 - white">
                        <img src="{{asset('assets/dist/img/teach9.jpg')}}?text=1" class="img-fluid mb-2" alt="white sample"/>
                      </a>
                        <h5>{{$primaryvideo->subject}}</h5>
                    </div>
                    @endforeach
                  </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


  
  </div>
 <!-- /.content-wrapper -->

 

 
 