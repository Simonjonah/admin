@extends('layouts.apps')

@include('layouts.buyermenu')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Marketer to Buyers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a class="btn btn-primary" href="home">Home</a></li>
              <li class="breadcrumb-item active">Marketer to Buyers</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Marketer to Buyers</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Buyer's Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Referral Link</th>
                    <th>Date Reg</th>

                  </tr>
                  </thead>
                  <tbody>
                  
                  @foreach($buyermarketers as $buyermarketer)
                  <tr>
                      
                        <td>{{ $buyermarketer->name }}</td>
                        <td>{{ $buyermarketer->email }}</td>
                        <td>{{ $buyermarketer->phone }}</td>
                    <td><a href="{{ Auth::user()->referral_link }}">{{ Auth::user()->referral_link }}</td>                    
                      <td>{{ $buyermarketer->created_at->format('D d, M Y, H:i') }}</td>
                   
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Buyer's Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Referral Link</th>
                    <th>Date Reg</th>
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
  