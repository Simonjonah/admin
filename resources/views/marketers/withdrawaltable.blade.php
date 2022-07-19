@extends('layouts.apps')

@include('layouts.menu2')

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
              <li class="breadcrumb-item"><a href="home">Home</a></li>
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
                <h3 class="card-title">Withdrawals</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Franchise's Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Amount</th>
                    <th>Account Number</th>
                    <th>Bank</th>
                    <th>Account Type</th>
                    <th>Mark as Paid</th>

                    <th>Date </th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  @foreach($allthe_withdrawals as $allthe_withdrawal)
                  <tr>
                    <td><a href="franchisemarketers/{{ $allthe_withdrawal->franchise->id }}">{{ $allthe_withdrawal->franchise['name'] }}</td>

                        <td>{{$allthe_withdrawal->withdrawal_email }}</td>
                        <td>{{ $allthe_withdrawal->withdrawal_phone }}</td>
                        <td>{{ $allthe_withdrawal->withdrawal_amount }}</td>
                        <td>{{ $allthe_withdrawal->account_number }}</td>
                        <td>{{ $allthe_withdrawal->bank }}</td>
                        <td>{{ $allthe_withdrawal->account_type }}</td>
                        <td><a href="{{ route('secondvideos.show', [$allthe_withdrawal->id]) }}" class='btn btn-danger btn-sm'>
                                Mark as Paid
                            </a></td>
                        
                        <td>{{ $allthe_withdrawal->created_at->format('D d, M Y, H:i')}}</td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>Franchise's Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Amount</th>
                        <th>Account Number</th>
                        <th>Bank</th>
                        <th>Account Type</th>
                        <th>Mark as Paid</th>

                        <th>Date </th>
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
  