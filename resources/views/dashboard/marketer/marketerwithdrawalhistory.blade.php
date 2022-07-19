
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Hometeacher Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

@include('layouts.buyermenu')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Marketer Withdrawals</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a class="btn btn-primary" href="home">Home</a></li>
              <li class="breadcrumb-item active">Marketer Withdrawals</li>
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
                <h3 class="card-title">Marketer Withdrawals</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Marketer's Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Account Number</th>
                    <th>Account Type</th>
                    <th>Bank</th>
                    <th>Account Name</th>
                    <th>Amount</th>

                    <th>Date </th>

                  </tr>
                  </thead>
                  <tbody>
                  
                  @foreach($rmarketer_withdrawalcounts as $rmarketer_withdrawalcount)
                  <tr>
                      
                        <td>{{ $rmarketer_withdrawalcount->withdrawal_name }}</td>
                        <td>{{ $rmarketer_withdrawalcount->withdrawal_email }}</td>
                        <td>{{ $rmarketer_withdrawalcount->withdrawal_phone }}</td>
                        <td>{{ $rmarketer_withdrawalcount->account_number }}</td>
                        <td>{{ $rmarketer_withdrawalcount->account_type }}</td>
                        <td>{{ $rmarketer_withdrawalcount->bank }}</td>
                        <td>{{ $rmarketer_withdrawalcount->account_name }}</td>
                        <td>N {{ $rmarketer_withdrawalcount->withdrawal_amount }}</td>



                      <td>{{ $rmarketer_withdrawalcount->created_at->format('D d, M Y, H:i') }}</td>
                   
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Marketer's Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Account Number</th>
                      <th>Account Type</th>
                      <th>Bank</th>
                      <th>Account Name</th>
                      <th>Amount</th>
  
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
  <!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
