@extends('layouts.apps')

<div class="wrapper">
    @include('layouts.menu1')
  <!-- Navbar -->
 
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Franchise && Marketer Access Table</h1>
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
                <h3 class="card-title" style="color: red;">Franchise  Access Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Franchise Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($marketers as $marketer)

                  <tr>
                      
                   <td>{{ $marketer->franchise['name'] }}</td>
                   <td>{{ $marketer->franchise['phone'] }}</td>
                   <td>{{ $marketer->franchise['email'] }}</td>
                   <td>{{ $marketer->franchise['marketer_count'] }}</td>
                   
                    <td><a href="{{ Auth::user()->referral_link }}">{{ Auth::user()->referral_link }}</td>                    
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Franchise Name</th>
                    <th>Phone</th>
                    <th>Email</th>
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

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="color: red;">Marketer Access Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Marketer's Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($marketers as $marketer)
                  <tr>
                      
                 
                   <td>{{ $marketer->firstname }}</td>
                   <td>{{ $marketer->phone}}</td>
                   <td>{{ $marketer->email }}</td>
                   
                 
                    <!-- <td><a href="{{ Auth::user()->referral_link }}">{{ Auth::user()->referral_link }}</td>                     -->
                  </tr>
                  @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Franchise Name</th>
                    <th>Phone</th>
                    <th>Email</th>
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
   
  </div>
 <!-- /.content-wrapper -->
 