@extends('layouts.apps')

@include('layouts.menu2')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Payments</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">All Payments</li>
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
                <h3 class="card-title">All Payments</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Franchise's Name</th>
                    <th>Marketer's Name</th>
                    <th>Buyer's Name</th>
                    <th>Buyer Email</th>
                    <th>Buyer Phone</th>
                    <th>Amount</th>
                    <th>Francise's Share</th>
                    <th>Marketer' Share</th>
                    <th>Status</th>
                    <th>View</th>

                    <th>Date Paid</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  @foreach($allthe_transactions as $allthe_transaction)
                  <tr>
                      
                        {{-- <td><a href="franchisemarketers/{{ $allthe_transaction->franchise->id }}">{{ $allthe_transaction->franchise['name'] }}</a></td> --}}
                        {{-- <td><a href="marketers/{{ $allthe_transaction->marketer->id }}">{{ $allthe_transaction->marketer['firstname'] }}</a></td> --}}
                        {{-- <td>{{ $allthe_transaction->buyer_name }}</td> --}}
                        {{-- <td><a href="viewpayment/{{ $allthe_transaction->payment->id }}">View Payment</a></td> --}}

                        {{-- <td><a href="viewbuyer/{{ $allthe_transaction->buyer->id }}">{{ $allthe_transaction->buyer['firstname'] }}</a></td> --}}
                        <td>{{ $allthe_transaction->franchise_name }}</td>
                        <td>{{ $allthe_transaction->marketer_name }}</td>
                        <td>{{ $allthe_transaction->name }}</td>
                        <td>{{ $allthe_transaction->email }}</td>
                        <td>{{ $allthe_transaction->phone_number }}</td>
                        <td>{{ $allthe_transaction->amount }}</td>
                        <td>{{ $allthe_transaction->franchise_share }}</td>
                        <td>{{ $allthe_transaction->marketer_share }}</td>
                        <td>{{ $allthe_transaction->status }}</td>
                        <td><a href="viewpayment/{{ $allthe_transaction->id }}">View Payment</a></td>
                        <td>{{ $allthe_transaction->created_at->format('D d, M Y, H:i')}}</td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>Franchise's Name</th>
                        <th>Marketer's Name</th>
                        <th>Buyer's Name</th>
                        <th>Buyer Email</th>
                        <th>Buyer Phone</th>
                        <th>Amount</th>
                        <th>Francise's Share</th>
                        <th>Marketer' Share</th>
                        <th>Status</th>
                        <th>View</th>

                        <th>Date Paid</th>
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
  