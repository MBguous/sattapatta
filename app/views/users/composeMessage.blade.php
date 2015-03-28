@extends ('layouts.master')

@section ('content')

    <div id="wrapper">

    
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="#"></a></li>
                <li>{{ HTML::linkRoute('users.dashboard', 'Dashboard', Auth::user()->username) }}</li>
                <li>{{ HTML::linkRoute('users.post', 'Post Item', Auth::user()->username) }}</li>
                <li>{{ HTML::linkRoute('users.listing', 'My Listings', Auth::user()->username) }}</li>
                <li><blockquote>{{ HTML::link('#', 'Messages', ['style'=>'background:#454545']) }}</blockquote></li>
                <li>{{ HTML::linkRoute('users.profile', 'Profile', Auth::user()->username) }}</li>
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

                      		{{ Form::open(array('route'=>array('send.message', $username), 'class'=>'form-horizontal')) }}
                      		<div class="row">
														<div class="form-group">
															<div class="col-md-8">
                                {{ Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Title']) }}
                                <div class="text-danger" id="title_error">{{ $errors->first('title', ':message') }}</div>
	                            </div>
														</div>
	                        </div>
                        	<div class="row">
														<div class="form-group">
															<div class="col-md-8">
                                {{ Form::textarea('content', null, ['class'=>'form-control', 'placeholder'=>'Message for '.$username]) }}
                                <div class="text-danger" id="content_error">{{ $errors->first('content', ':message') }}</div>
	                            </div>
														</div>
	                        </div>
	                        <div class="form-group">
	                        	{{ Form::submit('Send message', array('class'=>'btn btn-default')) }}
													</div>
												{{ Form::close() }}
												
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

@stop