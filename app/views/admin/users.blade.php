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
				inactive
			@endif
		</td>
		<td>{{ $user->fullName }}</td>
		<td>{{ date('M j, 20y',strtotime($user->created_at)) }}</td>
		<td>
			<a href="#" title="View User Details" id="view-user">
        <i class="fa fa-eye fa-lg"></i>
      </a>
      <a href="#" title="Edit User Details">
        <i class="fa fa-edit fa-lg"></i>
      </a>
      <a href="#delete" data-toggle="modal" title="Deactivate User">
        <span class="fa-stack">
				  <i class="fa fa-user fa-stack-1x"></i>
				  <i class="fa fa-ban fa-stack-2x text-danger"></i>
				</span>
      </a>
		</td>
	</tr>

@endforeach
</table>
<div class="text-center">
	{{ $users->links() }}
</div>