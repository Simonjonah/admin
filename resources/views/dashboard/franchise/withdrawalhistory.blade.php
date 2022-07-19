@extends('layouts.apps')

@include('layouts.menu1')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-info">Franchise {{ Auth::guard('franchise')->user()->name }} Withdrawal Table</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Franchise && Marketer Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              
                <h3 class="card-title" style="color: red;">Franchise  Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Franchise Name</th>
                    <th>Amount</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Account Name</th>
                    <th>Account Number</th>
                    <th>Account Type</th>
                    <th>Bank</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($franchise_withdrawals as $franchise_withdrawal)
                  <tr>
                   <td>{{ $franchise_withdrawal->withdrawal_name }}</td>
                   <td>{{ $franchise_withdrawal->withdrawal_amount }}</td>
                   <td>{{ $franchise_withdrawal->withdrawal_phone }}</td>
                   <td>{{ $franchise_withdrawal->withdrawal_email }}</td>
                   <td>{{ $franchise_withdrawal->account_name }}</td>
                   <td>{{ $franchise_withdrawal->account_number }}</td>
                   <td>{{ $franchise_withdrawal->account_type }}</td>
                   <td>{{ $franchise_withdrawal->bank }}</td>


                   {{-- <td>{{ $franchise_withdrawal->phone}}</td>
                   <td>{{ $franchise_withdrawal->email }}</td> --}}
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Franchise Name</th>
                    <th>Amount</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Account Name</th>
                    <th>Account Number</th>
                    <th>Account Type</th>
                    <th>Bank</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

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
 