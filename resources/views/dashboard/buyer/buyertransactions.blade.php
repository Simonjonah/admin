@extends('layouts.apps')

@include('layouts.marketermenu')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Marketer to Buyers</h1>
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
                    <th>Subjects</th>
                    {{--  --}}
                    
                    <th>Video</th>

                  </tr>
                  </thead>
                  <tbody>

                      @foreach($view_payment_buyers as $view_payment_buyer)
                        <tr>
                            {{-- <td><a href="primary1subjects/{{ $view_payment_buyer->primvideo['id'] }}">{{ $view_payment_buyer->subject }}</a></td> --}}
                            <td>{{ $view_payment_buyer->subject }}<br>
                              <small class="text-info">{{ $view_payment_buyer->prim_topic }}</small><br>
                             <small class="text-danger">{{ $view_payment_buyer->class }}</small>
                            </td>
                            <td><video width="400" height="240" oncontextmenu="return false;" id="myVideo" controls controlsList="nodownload">
                                <source src="{{ URL::asset("/public/../$view_payment_buyer->video")}}" type="video/mp4">
                            </video></td>
                        </tr>
                      @endforeach
                  </tbody>
                  <tfoot>
                    <th>Subjects</th>
                    
                    <th>Video</th>
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

