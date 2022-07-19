{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

    </div>
</div>
@endsection --}}

@extends('layouts.apps')

@include('layouts.menu2')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Franchise </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{ $buyer_counts; }}</h3>
 
                  <p>Buyers</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('buyerstable') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-md-6 col-sm-12">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3> {{ $marketer_counts; }}<sup style="font-size: 20px"></sup></h3>
  
                  <p>Marketers</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="marketerstable" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-md-6 col-sm-12">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3> {{ $franchise_counts; }}</h3>
  
                  <p>Franchise</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>

                <a href="{{ route('frachisetable') }}" class="small-box-footer">Request <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-md-6 col-sm-12">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3>{{ $payment_counts }}</h3>
  
                  <p>Payments</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="subjectpayment" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-4 col-md-6 col-sm-12">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{ $withdrawal_counts  }}</h3>
  
                  <p>Franchise Withdrawals</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="withdrawaltable" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>


            <div class="col-lg-4 col-md-6 col-sm-12">
              <!-- small box -->
              <div class="small-box bg-dark">
                <div class="inner">
                  <h3>{{ $markerterwithdrawal_counts  }}</h3>
  
                  <p>Marketer Withdrawals</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="marwithdrawaltable" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
  
          
          <!-- /.row -->
          <!-- Main row -->
  
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Franchise to Marketers </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Franchise's Name</th>
                    
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Username</th>
                    

                    <th>Date Joined</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  @foreach($afranchises as $allfranchise)
                  <tr>
                      
                       
                        <td>{{$allfranchise->firstname }}</td>
                        <td>{{ $allfranchise->email }}</td>
                        <td>{{ $allfranchise->phone }}</td>
                        <td>{{ $allfranchise->username }}</td>
                        
                        <td>{{ $allfranchise->created_at->format('D d, M Y, H:i')}}</td>
                  </tr>
                  @endforeach


                  
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Franchise's Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Username</th>
                      

                      <th>Date Joined</th>
                    </tr>
                  </tfoot>
                </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  











  