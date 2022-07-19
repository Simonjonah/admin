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
                    <th>Buyer Name</th>
                   

                    <th>Email</th>
                    <th>Phone</th>
                    <th>Subject</th>
                    <th>Amount</th>
                    <th>Class</th>
                    <th>Status</th>
                    
                    <th>Date Joined</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  @if($findpayments)
                  <tr>
                      
                        {{-- <td><a href="marketers/{{ $findpaymentss->marketer->id }}">{{ $allbuyer->marketer['firstname'] }} </td> --}}
                        <td><a href="../viewbuyer/{{ $findpayments->id }}">{{ $findpayments->name }}</a></td>
                        <td>{{ $findpayments->email }}</td>
                        <td>{{ $findpayments->phone_number }}</td>
                        <td>{{ $findpayments->subject }}</td>
                        <td>{{ $findpayments->amount }}</td>
                        <td>{{ $findpayments->class }}</td>
                        <td>{{ $findpayments->status }}</td>
                       
                        <td>{{ $findpayments->created_at->format('D d, M Y, H:i')}}</td>
                  </tr>
                  @endif
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Buyer Name</th>
                   

                      <th>Email</th>
                      <th>Phone</th>
                      <th>Subject</th>
                      <th>Amount</th>
                      <th>Class</th>
                      <th>Status</th>
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
  