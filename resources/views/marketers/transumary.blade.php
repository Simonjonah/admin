@extends('layouts.apps')


@include('layouts.menu2')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Payment of Subjects </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../home">Home</a></li>
              <li class="breadcrumb-item active">Payment of Subjects</li>
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
                <h3 class="card-title">Payment of Subjects</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Total Sales</th>
                    <th>Total Franchise Shares</th>
                    <th>Total Marketer Share</th>
                    <th>Profits</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                   
                 {{-- <h1> {{ $franchiseshare_counts }}</h1> --}}
                    {{-- <h1>{{ $totalfranchise_shares }}</h1>
                    <h1>{{ $totalmarketer_shares }}</h1> --}}
                  
                  <tr>
                      <td>N {{ $transummarys }}</td>
                      <td>N {{ $totalfranchise_shares }}</td>
                      <td>N {{ $totalmarketer_shares }}</td>
                      <td>N {{ $transummarys - $totalfranchise_shares - $totalmarketer_shares }}</td>
                      
                  </tr>
                  <tr>
                    
                  </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Total Sales</th>
                    <th>Total Franchise Shares</th>
                    <th>Total Marketer Share</th>
                    <th>Profits</th>
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
 