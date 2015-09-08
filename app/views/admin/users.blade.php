<table class="table table-striped table-hover table-condensed">
<tr>
	<th>#</th>
	<th>Username</th>
	<th>Email</th>
	<th>Status</th>
	<th>Name</th>
	<th>Joined on</th>
	<th>Actions</th>
</tr>
@foreach ($users as $user)

	<tr>
		<td>{{ $user->id }}</td>
		<td>{{ $user->username }}</td>
		<td>{{ $user->email }}</td>
		<td>
			@if ($user->active == 1)
				active
			@else
				<span class="label label-warning">inactive</span>
			@endif
		</td>
		<td>{{ $user->fullName }}</td>
		<td>{{ date('M j, 20y',strtotime($user->created_at)) }}</td>
		<td>
			<a href="#" title="View User Details" onclick="viewUser({{ $user->id }})">
				<!-- <span class="fa-stack"> -->
				  <i class="fa fa-map-pin fa-lg"></i>
				  <!-- <i class="fa fa-circle-o fa-stack-2x"></i> -->
				<!-- </span> -->
      </a>
      @if ($user->active == 0)
      <a href="#" title="Activate User" onclick="changeStatus({{ $user->id }})">
		  <i class="fa fa-user-plus fa-lg"></i>
      </a>
      @else
      <a href="#" title="Ban User" onclick="changeStatus({{ $user->id }})">
		  <i class="fa fa-user-times fa-lg"></i>
      </a>
      @endif
      <!-- <a href="#" title="Edit User Details" onclick="editUser({{ $user->id }})">
        <i class="fa fa-edit fa-lg"></i>
      </a> -->
		</td>
	</tr>

@endforeach
</table>
<div class="text-center">
	{{ $users->links() }}
</div>

<!-- modal -->
<!-- <div class="modal fade" id="deactivate-user">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<div class="modal-body">
				<h4 class="modal-title">Deactivate the user?</h4>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="activateBtn">Go ahead</button>
			</div>
		</div>
	</div>
</div> -->