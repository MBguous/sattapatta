@extends ('layouts.master')

@section ('content')

<div id="wrapper" class="toggled">


  <!-- Sidebar -->
  <div id="sidebar-wrapper">
    <ul class="sidebar-nav">
      <li class="sidebar-brand"><a href="#"></a></li>
      <li>{{ HTML::linkRoute('users.dashboard', 'Dashboard', Auth::user()->username) }}</li>
      <li><blockquote>{{ HTML::linkRoute('items.post', 'Post Item', Auth::user()->username, ['style'=>'background:#454545']) }}</blockquote></li>
      <li>{{ HTML::linkRoute('users.listing', 'My Listings', Auth::user()->username) }}</li>
      <li>{{ HTML::link('#', 'Messages') }}</li>
      <li>{{ HTML::linkRoute('users.profile', 'Profile', Auth::user()->username) }}</li>
    </ul>
  </div>
  <!-- /#sidebar-wrapper -->
  <!-- <a href="#menu-toggle" id="menu-toggle"><i class='fa fa-align-justify fa-2x'></i></a>         -->

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
        <div class="col-md-offset-1 col-md-10">


          <div class="well well-lg">

            {{ Form::open(array('route'=>'post.users.post', 'class'=>'form-horizontal', 'files'=>true)) }}
              @include ('partials.itemForm')
            {{ Form::close() }}
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->


@stop

