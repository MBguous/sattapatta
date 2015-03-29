@extends ('layouts.master')

@section ('content')

	<div id="wrapper" class="toggled">

    <!-- Sidebar -->
	  <div id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li class="sidebar-brand"><a href="#"></a></li>
        <li>{{ HTML::linkRoute('users.dashboard', 'Dashboard', Auth::user()->username) }}</li>
        <li>{{ HTML::linkRoute('users.post', 'Post Item', Auth::user()->username) }}</li>
        <li>
        	<blockquote>
        		{{ HTML::linkRoute('users.listing', 'My Listings', Auth::user()->username, ['style'=>'background:#454545']) }}
      		</blockquote>
    		</li>
        <li><a href="#">Messages <span class="badge">3</span></a></li>
        <li>{{ HTML::linkRoute('users.profile', 'Profile', Auth::user()->username) }}</li>
      </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <a href="#menu-toggle" id="menu-toggle"><i class='fa fa-align-justify fa-2x'></i></a>

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


						<!-- accordion -->
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

						@foreach ($items as $item)
							<div class="panel panel-primary">
						    <div class="panel-heading" role="tab">
						      <h4 class="panel-title">
						      	{{ HTML::link('#'.$item->id, $item->name, ['class'=>'collapsed', 'data-toggle'=>'collapse', 'data-parent'=>'#accordion']) }}
						        <!-- <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          Collapsible Group Item #1
						        </a> -->
						      </h4>
						    </div>
						    <div id={{ $item->id }} class="panel-collapse collapse" role="tabpanel">
						      <div class="panel-body">
						        <div class="col-md-4">
						        	{{ HTML::image($item->photoURL, null, ['height'=>'200px']) }}
						        </div>
						        <div class="col-md-8">
						        	<table class="table table-striped table-hover">
						        		<tr>
						        			<th>Name</th>
						        			<td>{{ $item->name }}</td>
						        		</tr>
						        		<tr>
						        			<th>Price</th>
						        			<td>Rs. {{ $item->price }}</td>
						        		</tr>
						        		<tr>
						        			<th>Description</th>
						        			<td>{{ $item->description }}</td>
						        		</tr>
						        		<tr>
						        			<th>Posted on</th>
						        			<td>{{ $item->date }} {{ $item->time }}</td>
						        		</tr>
						        		<tr>
						        			<th>Status</th>
						        			<td>{{ $item->status }}</td>
						        		</tr>
						        	</table>
						        </div>
						      </div>
						    </div>
						  </div>
						@endforeach

						  
						  
						  
						</div>

          </div>
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
    <!-- /#wrapper -->

@stop