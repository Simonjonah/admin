


    <body class="hold-transition sidebar-mini">
      <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
              <a href="../home" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
              <a href="#" class="nav-link">Contact</a>
            </li>
          </ul>
      
          <!-- SEARCH FORM -->
          <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </form>
      

        </nav>
        <!-- /.navbar -->
      
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
          <!-- Brand Logo -->
          <a href="../home" class="brand-link">
            <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}"
                 alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Hometeacher</span>
          </a>
      
          <!-- Sidebar -->
          <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <!-- Sidebar Menu -->
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      Dashboard
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="../home" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Dashboard </p>
                      </a>
                    </li>
                    
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                     Learnings
                      <span class="right badge badge-success">New</span>
                    </p>
                  </a>
                </li>
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                      Subjects Uplaad
                      <i class="fas fa-angle-left right"></i>
                      <span class="badge badge-info right">6</span>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="../primvideos" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Prim Subjects</p>
                      </a>
                    </li>
                   
                    </li>
                    <li class="nav-item">
                      <a href="../secondvideos" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Secondary Subjects</p>
                      </a>
                    </li>
                    
                    
                  </ul>
                </li>
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                      Customers
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="../buyerstable" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>All Buyers</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../marketerstable" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>All Marketers</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../frachisetable" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>All Franchise</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tree"></i>
                    <p>
                      Cust Relationships
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="../allbuyers" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Marketer/Buyers</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../allfrachise" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Franchise/Marketer</p>
                      </a>
                    </li>
                   
                  </ul>
                </li>
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                      Transactions
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="../alltransactions" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>All Transactions</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../transactions" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Transactions</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../subjectpayment" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Payments</p>
                      </a>
                    </li>
                    
                  </ul>
                </li>
                <li class="nav-item has-treeview menu-open">
                  <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                      Money Spending
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="../transumary" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Transactions</p>
                      </a>
                    </li>

                    
                   
                  </ul>
                </li>
                {{-- <li class="nav-header">EXAMPLES</li>
                <li class="nav-item">
                  <a href="../calendar.html" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>
                      Calendar
                      <span class="badge badge-info right">2</span>
                    </p>
                  </a>
                </li> --}}
                {{-- <li class="nav-item">
                  <a href="../gallery.html" class="nav-link">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                      Gallery
                    </p>
                  </a>
                </li> --}}
                {{-- <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon far fa-envelope"></i>
                    <p>
                      Mailbox
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="../mailbox/mailbox.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Inbox</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../mailbox/compose.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Compose</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../mailbox/read-mail.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Read</p>
                      </a>
                    </li>
                  </ul>
                </li> --}}
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                      Withdrawals
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="withdrawaltable" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Franchise Withrawal</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="marwithdrawaltables" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Marketer Withdrawals</p>
                      </a>
                    </li>
                    {{-- <li class="nav-item">
                      <a href="marketerwithdrawal" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p> Withdrawals</p>
                      </a>
                    </li> --}}
                    {{--  --}}
                  </ul>
                </li>

                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link"
                     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                     Logout
                  </a>
                  {{-- <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tree"></i>
                    <p>
                     Logout
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a> --}}
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="logout" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
                  {{-- <p>Logout</p> --}}
                      </a>
                    </li>
                  </ul>
                </li>
                {{-- <li class="user-footer">
                  <a href="/users/{{ !Auth::guest() && Auth::user()->id }}" class="btn btn-default btn-flat">Profile</a>
                  <a href="#" class="btn btn-default btn-flat float-right"
                     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      Sign out
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </li> --}}
                {{-- <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon far fa-plus-square"></i>
                    <p>
                      Extras
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="../examples/login.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Login</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../examples/register.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Register</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../examples/forgot-password.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Forgot Password</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../examples/recover-password.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Recover Password</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../examples/lockscreen.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lockscreen</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../examples/legacy-user-menu.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Legacy User Menu</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../examples/language-menu.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Language Menu</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../examples/404.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Error 404</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../examples/500.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Error 500</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../examples/pace.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pace</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../examples/blank.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Blank Page</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../../starter.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Starter Page</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-header">MISCELLANEOUS</li>
                <li class="nav-item">
                  <a href="https://adminlte.io/docs/3.0" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>Documentation</p>
                  </a>
                </li>
                <li class="nav-header">MULTI LEVEL EXAMPLE</li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p>Level 1</p>
                  </a>
                </li>
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                      Level 1
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Level 2</p>
                      </a>
                    </li>
                    <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                          Level 2
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-dot-circle nav-icon"></i>
                            <p>Level 3</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-dot-circle nav-icon"></i>
                            <p>Level 3</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-dot-circle nav-icon"></i>
                            <p>Level 3</p>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Level 2</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p>Level 1</p>
                  </a>
                </li>
                <li class="nav-header">LABELS</li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon far fa-circle text-danger"></i>
                    <p class="text">Important</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon far fa-circle text-warning"></i>
                    <p>Warning</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon far fa-circle text-info"></i>
                    <p>Informational</p>
                  </a>
                </li> --}} 
              </ul>
            </nav>
            <!-- /.sidebar-menu -->
          </div>
          <!-- /.sidebar -->
        </aside>