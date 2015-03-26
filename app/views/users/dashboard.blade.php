@extends ('layouts.master')

@section ('content')

    <div id="wrapper">

    
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="#"></a></li>
                <li><blockquote>{{ HTML::linkRoute('users.dashboard', 'Dashboard', null, ['style'=>'background:#454545']) }}</blockquote></li>
                <li>{{ HTML::linkRoute('users.post', 'Post Item') }}</li>
                <li>{{ HTML::linkRoute('users.listing', 'My Listings') }}</li>
                <li>{{ HTML::link('#', 'Messages') }}</li>
                <li>{{ HTML::linkRoute('users.profile', 'Profile') }}</li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
        

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                @if (Session::has('message'))
                  <div class="alert alert-warning alert-dismissible" id="messageDiv" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <span><i class="fa fa-info-circle"></i>&nbsp;{{ Session::get('message') }}</span>
                  </div>
                @endif
                    <div class="col-lg-12">

                        <a href="#menu-toggle" id="menu-toggle"><i class='fa fa-align-justify fa-2x'></i></a>

                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
  

@stop
 
