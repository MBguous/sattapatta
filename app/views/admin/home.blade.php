@extends ('layouts.master')

@section ('title')
Admin - Sattapatta
@stop

@section('content')

<div class="container-fluid">
	
	<div class="row">
		
		<div class="col-md-2">
			
			<div id="menu">
				<div class="panel panel-warning list-group">
					<span class="list-group-item panel-heading text-center">Admin Panel</span>
					<a href="#" class="list-group-item">
						<i class="icon icon-Speedometter" style="font-size:large"></i>&nbsp; Dashboard
					</a>
					<a href="#" class="list-group-item" id="link-users">
						<i class="icon icon-Users" style="font-size:large"></i>&nbsp; Users
					</a>
					<a href="#" class="list-group-item" data-toggle="collapse" data-target="#sl" data-parent="#menu">
						<i class="icon icon-Layers" style="font-size:large"></i>&nbsp; Categories
					</a>
					<div id="sl" class="sublinks collapse">
						<a class="list-group-item small"><span class="glyphicon glyphicon-chevron-right"></span> view categories</a>
						<a class="list-group-item small"><span class="glyphicon glyphicon-chevron-right"></span> add new category</a>
					</div>
					
					<a href="#" class="list-group-item" data-toggle="collapse" data-target="#sm" data-parent="#menu">
						<i class="icon icon-Mail" style="font-size:large"></i>&nbsp; Messages
					</a>
					<div id="sm" class="sublinks collapse">
						<a class="list-group-item small"><span class="glyphicon glyphicon-chevron-right"></span> view categories</a>
						<a class="list-group-item small"><span class="glyphicon glyphicon-chevron-right"></span> add new category</a>
					</div>
					<a href="#" class="list-group-item">ANOTHER LINK ...<span class="glyphicon glyphicon-stats pull-right"></span></a>
				</div>
			</div>

		</div>
		<div class="col-md-10">
			<div class="panel panel-info" id="panel-admin">
				<div class="panel-heading" id="panel-heading">Dashboard</div>
				<div class="panel-body" id="panel-body" style="display:none">
					<i class="fa fa-spinner fa-pulse fa-lg"></i> Loading...
				</div>
				<div id="panel-after-body">
					
				</div>
			</div>
		</div>
	</div>

</div>

@stop

@section ('script')
  {{ HTML::script('js/admin.js') }}
  
  
@stop