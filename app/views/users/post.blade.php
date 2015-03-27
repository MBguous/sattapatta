@extends ('layouts.master')

@section ('content')

    <div id="wrapper">

    
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="#"></a></li>
                <li>{{ HTML::linkRoute('users.dashboard', 'Dashboard') }}</li>
                <li><blockquote>{{ HTML::linkRoute('users.post', 'Post Item', null, ['style'=>'background:#454545']) }}</blockquote></li>
                <li>{{ HTML::linkRoute('users.listing', 'My Listings') }}</li>
                <li>{{ HTML::link('#', 'Messages') }}</li>
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

                        <div class="well well-lg">
                          {{ Form::open(array('route'=>'post.users.post', 'class'=>'form-horizontal', 'files'=>true)) }}
                        <div class="form-group">
                            {{ Form::label('name', 'Item name', ['class'=>'col-md-2 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::text('name', null, ['class'=>'form-control']) }}
                                <div class="text-danger" id="name_error">{{ $errors->first('name', ':message') }}</div>
                            </div>
                          </div>

                        <div class="form-group">
                            {{ Form::label('description', 'Description', ['class'=>'col-md-2 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::textarea('description', null, ['class'=>'form-control']) }}
                                <div class="text-danger" id="description_error">{{ $errors->first('description', ':message') }}</div>
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('price', 'Price', ['class'=>'col-md-2 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::text('price', null, ['class'=>'form-control']) }}
                                <div class="text-danger" id="price_error">{{ $errors->first('price', ':message') }}</div>
                            </div>
                        </div>

                        <div class="form-group">
                          {{ Form::label('photoURL', 'Choose an image', ['class'=>'col-md-2 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::file('photoURL', array('class'=>'well well-sm')) }}
                                <div class="text-danger" id="photoURL_error">{{ $errors->first('photoURL', ':message') }}</div>
                            </div>
                        </div>
                        
                        <div>
                          <button type="button" class="btn btn-default">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
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
 
