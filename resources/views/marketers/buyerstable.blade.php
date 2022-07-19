@extends('layouts.apps')

@include('layouts.menu2')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Marketer to Buyers </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                    <th>Referred By</th>
                   
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Username</th>
                    <th>Date Joined</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  @foreach($allthebuyers as $allthebuyer)
                  <tr>
                      
                        {{-- <td><a href="marketers/{{ $allthebuyers->marketer->id }}">{{ $allbuyer->marketer['firstname'] }} </td> --}}
                        <td>{{ $allthebuyer->name }}</td>
                        <td>{{ $allthebuyer->email }}</td>
                        <td>{{ $allthebuyer->phone }}</td>
                        <td>{{ $allthebuyer->username }}</td>
                        <td>{{ $allthebuyer->created_at->format('D d, M Y, H:i')}}</td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Referred By</th>
                   
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
  