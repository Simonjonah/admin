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
              <li class="breadcrumb-item active">Students Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <h1>Secondary School Subjects</h1>
    <!-- /.content -->
    @if(count($secondaryvideos ) > 0)
    <div class="container"> 
      <div class="row">
        @foreach($secondaryvideos as $secondaryvideo)
          <div class="col-lg-4 col-md-6 col-sm-12">
              <div class="card-columns">
                <div class="card" style="width: 21rem;">
                  <img src="{{asset('assets/dist/img/teach9.jpg')}}" class="card-img-top" alt="...">
                  <div class="card-body">
                      <h3 class="card-title"><b>{{$secondaryvideo->class}}</b></h3><br>
                  </div>
                  <ul class="list-group list-group-flush">
                      <li class="list-group-item">{{$secondaryvideo->subject}}</li>
                  </ul>
                  <div class="card-footer">
                      <div class='btn-group'>
                          <a href="secondarysingle/{{$secondaryvideo->id}}" class="btn btn-primary mr-5">Buy Now!</a>                            
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
                   The Secoondary Subjects
                </div>
              </div>
              <div class="card-body">
                <div>
                  <div class="btn-group w-100 mb-2">
                    <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> All items </a>
                    @foreach($secondaryvideos as $secondaryvideo)
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="{{$secondaryvideo->subject}}"> {{$secondaryvideo->subject}} </a>
                    @endforeach
                  
                  </div>
                  
                </div>
                <div>
                @foreach($secondaryvideos as $secondaryvideo)
                  <div class="filter-container p-0 row">
                    <div class="filtr-item col-sm-2" data-category="{{$secondaryvideo->subject}}" data-sort="white sample">
                      <a  href="singlesubject/{{$secondaryvideo->id}}"  data-title="sample 1 - white">
                        <img src="{{asset('assets/dist/img/teach9.jpg')}}?text=1" class="img-fluid mb-2" alt="white sample"/>
                      </a>
                        <h5>{{$secondaryvideo->subject}}</h5>
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

 

 
 