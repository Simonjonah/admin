@extends('layouts.apps')

@include('layouts.menu2')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Marketers Withrawal Requests</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Marketers Withrawal Requests</li>
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
                    <th>Account Name</th>
                    <th>Withdrawal Amount</th>

                    {{-- <th>Mark as Paid</th> --}}

                    <th>Date </th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  @foreach($allthe_marketerswithdrawals as $allthe_marketerswithdrawal)
                  <tr>
                    <td><a href="franchisemarketers/{{ $allthe_marketerswithdrawal->marketer->id }}">{{ $allthe_marketerswithdrawal->marketer['firstname'] }}</td>

                        <td>{{ $allthe_marketerswithdrawal->withdrawal_email }}</td>
                        <td>{{ $allthe_marketerswithdrawal->withdrawal_phone }}</td>
                        <td>{{ $allthe_marketerswithdrawal->withdrawal_amount }}</td>
                        <td>{{ $allthe_marketerswithdrawal->account_number }}</td>
                        <td>{{ $allthe_marketerswithdrawal->bank }}</td>
                        <td>{{ $allthe_marketerswithdrawal->account_type }}</td>
                        <td>{{ $allthe_marketerswithdrawal->account_name }}</td>
                        <td>{{ $allthe_marketerswithdrawal->withdrawal_amount }}</td>

                        <a class="btn btn-primary btn-sm"  href="{{route('marwithdrawaltable',['id'=>$allthe_marketerswithdrawal->id])}}">Approve Application</a>
                      </td>

                      <td>
                        @if($allthe_marketerswithdrawal->markasp == true)
                           <span class="badge bg-blue">Approved</span>
                        @else
                           <span class="badge bg-pink">Pending</span>
                        @endif
                      </td>
                      <td>
                         @if($post->status == true)
                            <span class="badge bg-blue">Published</span>
                         @else
                            <span class="badge bg-pink">Pending</span>
                         @endif
                       </td>
                        <td>{{ $allthe_marketerswithdrawal->created_at->format('D d, M Y, H:i')}}</td>
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
                        <th>Account Name</th>
                        <th>Withdrawal Amount</th>
    
                        {{-- <th>Mark as Paid</th> --}}
    
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
  