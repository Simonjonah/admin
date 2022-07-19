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
            <h1 class="m-0 text-dark">Request for Widthdrawal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Request for Withdrawal </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    
    <!-- /.content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <div class="tab-pane" id="settings">
                    <form action="{{ route('transactions.createmarketerwithdrawal') }}" method="post">
                        @csrf
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Account Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="account_name" class="form-control" id="inputName" placeholder="Account Name" @error('name') is-invalid @enderror"
                          value="{{ old('account_name') }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Account Number</label>
                        <div class="col-sm-10">
                          <input type="number" name="account_number" class="form-control" id="inputEmail" placeholder="Account Number">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Type</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="account_type" id="inputName2">
                                <option>Savings Account</option>
                                <option>Current Account</option>
                                <option>Fixed Account</option>
                            </select>
                         
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Bank Name</label>
                        <div class="col-sm-10">
                          
                            <label for="bank">Bank name</i></label>
                            <select type="text" class="form-control" name="bank" id="bank">
                            <option selected>Choose</option>
                            <option value="access">Access Bank</option>
                            <option value="citibank">Citibank</option>
                            <option value="diamond">Diamond Bank</option>
                            <option value="ecobank">Ecobank</option>
                            <option value="fidelity">Fidelity Bank</option>
                            <option value="fcmb">First City Monument Bank (FCMB)</option>
                            <option value="fsdh">FSDH Merchant Bank</option>
                            <option value="gtb">Guarantee Trust Bank (GTB)</option>
                            <option value="heritage">Heritage Bank</option>
                            <option value="Keystone">Keystone Bank</option>
                            <option value="rand">Rand Merchant Bank</option>
                            <option value="skye">Skye Bank</option>
                            <option value="stanbic">Stanbic IBTC Bank</option>
                            <option value="standard">Standard Chartered Bank</option>
                            <option value="sterling">Sterling Bank</option>
                            <option value="suntrust">Suntrust Bank</option>
                            <option value="union">Union Bank</option>
                            <option value="uba">United Bank for Africa (UBA)</option>
                            <option value="unity">Unity Bank</option>
                            <option value="wema">Wema Bank</option>
                            <option value="zenith">Zenith Bank</option>
                            </select>
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                
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
 
