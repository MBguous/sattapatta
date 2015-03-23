   <div id="wrapper">

    
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                      {{-- HTML::image(Auth::user()->photoURL, 'profile-pic', ['height'=>'60px', 'class'=>'img-circle']) --}}
                    </a>
                </li>
                <li>

                  {{ HTML::linkRoute('users.dashboard', 'Dashboard') }}
                </li>
                <li>
                  {{ HTML::link('#', 'Post Item') }}
                </li>
                <li>
                  {{ HTML::link('#', 'My Listings') }}
                </li>
                <li>
                  {{ HTML::link('#', 'Messages') }}
                </li>
                <li>
                  {{ HTML::linkRoute('users.profile', 'Profile') }}
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
        

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="#menu-toggle" id="menu-toggle"><i class='fa fa-align-justify fa-2x'></i></a>
                        @yield('user-content')
                        
                        <!-- <h2>Dashboard</h2> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->