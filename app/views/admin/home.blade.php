@extends ('layouts.master')

@section ('title')
Admin - Sattapatta
@stop

@section('content')

<div class="container-fluid">
	
	<div class="row">
		<!-- <h4>Admin</h4> -->
		<div class="col-md-12">
			<h4 class="alert alert-info"><strong>Admin Panel</strong></h4>
		</div>
		<div class="col-md-2">
			
			<div id="menu">
				<div class="panel list-group">
					<a href="#" class="list-group-item">
						<i class="fa fa-dashboard fa-fw"></i>&nbsp; Dashboard
					</a>
					<a href="#" class="list-group-item" id="link-users">
						<i class="fa fa-users fa-fw"></i>&nbsp; Users
					</a>
					<a href="#" class="list-group-item">
						<i class="fa fa-sitemap fa-fw"></i>&nbsp; Categories
					</a>
					<a href="#" class="list-group-item" data-toggle="collapse" data-target="#sm" data-parent="#menu">
						MESSAGES <span class="label label-info">5</span>
						<span class="glyphicon glyphicon-envelope pull-right"></span>
					</a>
					<div id="sm" class="sublinks collapse">
						<a class="list-group-item small"><span class="glyphicon glyphicon-chevron-right"></span> inbox</a>
						<a class="list-group-item small"><span class="glyphicon glyphicon-chevron-right"></span> sent</a>
					</div>
					<a href="#" class="list-group-item" data-toggle="collapse" data-target="#sl" data-parent="#menu">
						TASKS <span class="glyphicon glyphicon-tag pull-right"></span>
					</a>
					<div id="sl" class="sublinks collapse">
						<a class="list-group-item small"><span class="glyphicon glyphicon-chevron-right"></span> saved tasks</a>
						<a class="list-group-item small"><span class="glyphicon glyphicon-chevron-right"></span> add new task</a>
					</div>
					<a href="#" class="list-group-item">ANOTHER LINK ...<span class="glyphicon glyphicon-stats pull-right"></span></a>
				</div>
			</div>

		</div>
		<div class="col-md-10">
			<div class="panel panel-default" id="panel-admin">
				<div class="panel-heading" id="panel-heading">Dashboard</div>
				<div class="panel-body" id="panel-body">
					
				</div>
				<div id="panel-after-body"></div>
			</div>
		</div>
	</div>

</div>


@stop