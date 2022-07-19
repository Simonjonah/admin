
  <!-- /.content-wrapper -->
  @extends('layouts.apps')

  @include('layouts.marketermenu')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Payments</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../buyer/home">Home</a></li>
                <li class="breadcrumb-item active">User Payments</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            
            <!-- /.col -->
            <div class="col-md-12">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Information</a></li>
                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Contents</a></li>
                    {{-- <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li> --}}
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
                             
                              <img src="{{asset('assets/dist/img/teach9.jpg')}}" class="product-image" alt="Product Image">
                             
                            </div>
                            <!-- ./col -->
                            @if($single_videos)
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <form method="POST" action="{{ route('pay') }}" id="paymentForm">
                                {{ csrf_field() }}
                                
                                <div class="form-group" style="margin-top: 20px;">
                                  <input type="text"  class="form-control" value="{{$single_videos->class}}" name="class" placeholder="Name" />
                                </div>
                                <div class="form-group" style="margin-top: 20px;">
                                  <input type="hidden"  class="form-control" value="{{$single_videos->id}}" name="id" placeholder="Name" />
                                </div>
                                <div class="form-group" style="margin-top: 20px;">
                                  <input type="text"  class="form-control" value="{{$single_videos->amount}}" name="amount" placeholder="Name" />
                                </div>
                                <div class="form-group" style="margin-top: 20px;">
                                  <input type="text"  class="form-control" value="{{$single_videos->subject}}" name="subject" placeholder="Name" />
                                </div>
            
                                <div class="form-group" style="margin-top: 20px;">
                                  <input type="hidden"  class="form-control" value="{{$single_videos->video}}" name="subject" placeholder="Name" />
                                </div>
                                
                                <div class="form-group" style="margin-top: 20px;">
                                  <input type="hidden"  class="form-control" value="{{Auth::guard('buyer')->user()->name }}" name="name" placeholder="Name" />
                                </div>
                                
                                <div class="form-group">
                                  <input type="hidden" class="form-control" value="{{Auth::guard('buyer')->user()->email }}" name="email" type="email" placeholder="Your Email" />
                                </div>
                                <div class="form-group">
                                  <input type="hidden"  class="form-control" value="{{Auth::guard('buyer')->user()->phone }}" name="phone" type="tel" placeholder="Phone number" />
                                <div>
                                <div class="form-group" style="margin-top: 20px;">
                                  
                                    {{-- <input class="btn btn-primary btn-lg btn-flat" type="submit" value="Buy Now!" /> --}}
                                  </div>
                                  <a href="../payment-page/{{$single_videos->id}}" class="btn btn-primary btn-lg btn-flat">Pay </a>
                                  {{-- <input class="btn btn-primary btn-lg btn-flat" type="submit"/> --}}
                                </div>
                            </form>
                            </div>
                          @endif
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
                          <span class="bg-info">
                           {{ $single_videos->prim_topic }}
                          </span>
                        </div>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <div>
                          <i class="fas fa-envelope bg-primary"></i>
  
                          <div class="timeline-item">
                            <span class="time"><i class="far fa-clock"></i> 12:05</span>
  
                            <h3 class="timeline-header">Topic <a href="#">{{ $single_videos->prim_topic }}</a></h3>
  
                            <div class="timeline-body">
                             {{$single_videos->description}}
                            </div>
                          </div>
                        </div>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <div>
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
                            <input type="text" name="name" class="form-control" value="{{ Auth::guard('buyer')->user()->name }}" id="inputName" placeholder="Name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Lastname</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="lastname" value="{{ Auth::guard('buyer')->user()->lastname }}" id="inputEmail" placeholder="Last Name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="email"  name="email" value="{{ Auth::guard('buyer')->user()->email }}" disabled class="form-control" id="inputEmail" placeholder="Email">
                          </div>
                        </div>
  
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Phone</label>
                          <div class="col-sm-10">
                            <input type="number" name="phone" value="{{ Auth::guard('buyer')->user()->phone }}" class="form-control" id="inputName2" placeholder="Phone">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputExperience" class="col-sm-2 col-form-label">Gender</label>
                          <div class="col-sm-10">
                            <input type="text" name="phone" value="{{ Auth::guard('buyer')->user()->gender }}" class="form-control" id="inputName2" placeholder="Gender">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputSkills" class="col-sm-2 col-form-label">Address</label>
                          <div class="col-sm-10">
                            <input type="text" name="address" value="{{ Auth::guard('buyer')->user()->address }}"  class="form-control" id="inputSkills" placeholder="Address">
                          </div>
                        </div>
  
                        <div class="form-group row">
                          <label for="inputSkills" class="col-sm-2 col-form-label">Picture</label>
                          <div class="col-sm-10">
                            <input type="file" name="images" value="{{ Auth::guard('buyer')->user()->address }}"  class="form-control" id="inputSkills" placeholder="Address">
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
  
  