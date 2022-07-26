@extends('layouts.apps')

@include('layouts.buyermenu')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Franchise to Marketers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a class="btn btn-primary" href="home">Home</a></li>
              <li class="breadcrumb-item active">Franchise to Marketers</li>
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
                <h3 class="card-title">Franchise to Marketers</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Franchise's Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Referral Link</th>
                    <th>Date Reg</th>

                  </tr>
                  </thead>
                  <tbody>
                  
                  @foreach($yourmarketers as $yourmarketer)
                  <tr>
                      
                        <td>{{ $yourmarketer->name }}</td>
                        <td>{{ $yourmarketer->email }}</td>
                        <td>{{ $yourmarketer->phone }}</td>
                    <td><a href="{{ Auth::guard('marketer')->user()->referral_link }}">{{ Auth::guard('marketer')->user()->referral_link }}</td>                    
                      <td>{{ $yourmarketer->created_at->format('D d, M Y, H:i') }}</td>
                   
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Franchise's Name</th>
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
  