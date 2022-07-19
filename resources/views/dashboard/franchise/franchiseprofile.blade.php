<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Franchise Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css ') }}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

@include('layouts.menu1')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('assets/dist/img/AdminLTELogo.png')}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ Auth::guard('franchise')->user()->name }}</h3>

                <p class="text-muted text-center">Franchise</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Marketers</b> <a class="float-right">{{ $marketer_counts }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Withdrawals</b> <a class="float-right">{{ $franchisewithdrawal_amount_counts }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Wallets</b> <a class="float-right">{{ $franchiseshare_counts }}</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Hometeacher</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Referral Link</strong>

                <p class="text-muted">
                  {{-- <td><a href="{{ route('marketer.register', ['id' =>!Auth::guest() && Auth::guard('franchise')->user()->id]) }}">{{ Auth::guard('franchise')->user()->referral_link }}</td> --}}
                    {{-- <td>{{ Auth::guard('franchise')->user()->referral_link }}</li></td> --}}
                    <td><a href="{{ Auth::guard('franchise')->user()->referral_link }}">{{ Auth::guard('franchise')->user()->referral_link }}</td>
                      <td></td>
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">{{ Auth::guard('franchise')->user()->state }}</p>

                <hr>

                <strong><i class="fas fa-phone-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                    {{ Auth::guard('franchise')->user()->phone }}
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Terms and Conditions.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  {{-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li> --}}
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    
                    <section class="content">
                        <div class="container-fluid">
                          <!-- Small boxes (Stat box) -->
                          <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <!-- small box -->
                              <div class="small-box bg-info">
                                <div class="inner">
                                  <h3><td>{{ $marketer_counts }}</td></h3>
                  
                                  <p>Marketers</p>
                                </div>
                                <div class="icon">
                                  <i class="ion ion-bag"></i>
                                </div>
                                <a href="{{ route('franchise.yourmarketers') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                              </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <!-- small box -->
                              <div class="small-box bg-success">
                                <div class="inner">
                                  <h3>₦ {{ $franchiseshare_counts }}<sup style="font-size: 20px"></sup></h3>
                  
                                  <p>Wallet</p>
                                </div>
                                <div class="icon">
                                  <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">Wallet <i class="fas fa-arrow-circle-right"></i></a>
                              </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <!-- small box -->
                              <div class="small-box bg-warning">
                                <div class="inner">
                                  <h3>  {{ $franchisewithdrawal_counts }}</h3>
                  
                                  <p>Withdraw Counts</p>
                                </div>
                                <div class="icon">
                                  <i class="ion ion-person-add"></i>
                                </div>
                                {{-- @if (Auth::guard('franchise')->user()->status == 0) --}}
                                @if ($franchiseshare_counts >= 5000)
                                
                                <a href="withdrawal" class="small-box-footer">Request Withdrawal <i class="fas fa-arrow-circle-right"></i></a>
                  
                                @else
                                
                                <a href="#" class="small-box-footer btn btn-warning toastrDefaultError"> Withdraw <i class="fas fa-arrow-circle-right"></i></a>
                  
                                @endif
                  
                                {{-- <form action="{{ route('franchise.withdrawal') }}" method="post">
                                    <button type="submit" class="btn btn-primary"></button>
                                </form>
                                 --}}
                                  
                                {{-- @elseif (Auth::guard('franchise')->user()->status == 0)
                                  <h5>Pending .... </h5>
                                @elseif (Auth::guard('franchise')->user()->status !== 1)
                                  <a href="withdraw" class="small-box-footer">Request Withdrawal <i class="fas fa-arrow-circle-right"></i></a>
                                @endif --}}
                  
                              </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <!-- small box -->
                              <div class="small-box bg-danger">
                                <div class="inner">
                                  <h3>{{ $franchisewithdrawal_amount_counts  }}</h3>
                  
                                  <p>Withdrawal Amount Counts</p>
                                </div>
                                <div class="icon">
                                  <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="{{ route('franchise.withdrawalhistory') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                              </div>
                            </div>
                  
                          </div>
                        </div><!-- /.container-fluid -->
                      </section>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">First Name</label>
                          <div class="col-sm-10">
                            <input type="text" name="firstname" class="form-control" value="{{ Auth::guard('franchise')->user()->name }}" id="inputName" placeholder="Name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Lastname</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="lastname" value="{{ Auth::guard('franchise')->user()->lastname }}" id="inputEmail" placeholder="Last Name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="email"  name="email" value="{{ Auth::guard('franchise')->user()->email }}" disabled class="form-control" id="inputEmail" placeholder="Email">
                          </div>
                        </div>
  
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Phone</label>
                          <div class="col-sm-10">
                            <input type="number" name="phone" value="{{ Auth::guard('franchise')->user()->phone }}" class="form-control" id="inputName2" placeholder="Phone">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputExperience" class="col-sm-2 col-form-label">Gender</label>
                          <div class="col-sm-10">
                            <input type="text" name="phone" value="{{ Auth::guard('franchise')->user()->gender }}" class="form-control" id="inputName2" placeholder="Gender">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputSkills" class="col-sm-2 col-form-label">Address</label>
                          <div class="col-sm-10">
                            <input type="text" name="address" value="{{ Auth::guard('franchise')->user()->address }}"  class="form-control" id="inputSkills" placeholder="Address">
                          </div>
                        </div>
  
                        <div class="form-group row">
                          <label for="inputSkills" class="col-sm-2 col-form-label">Picture</label>
                          <div class="col-sm-10">
                            <input type="file" name="images" value="{{ Auth::guard('franchise')->user()->address }}"  class="form-control" id="inputSkills" placeholder="Address">
                          </div>
                        </div>
  
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <div class="checkbox">
                              <label>
                              
                                <input name="terms" type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                              </label>
                              
                            </div>
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
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2022 <a href="http://hometeacher.ng">Hometeacher.ng</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
</body>
</html>
