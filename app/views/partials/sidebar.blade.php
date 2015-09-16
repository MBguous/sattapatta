<div class="col-md-2">
	<nav id="sidebar">
		<a href="#" class="btn btn-sm btn-naked btn-block">
			<i class="fa fa-trello fa-fw fa-lg"></i>&nbsp; Dashboard
		</a>

		<a href="{{ URL::route('users.profile', $loggedUser->username) }}" class="btn btn-sm btn-block {{ isActiveRoute('users.profile') }}">
			<i class="fa fa-user fa-fw fa-lg"></i>&nbsp; Profile
		</a>

		<a href="#" class="btn btn-sm btn-block">
			<i class="fa fa-user fa-fw fa-lg"></i>&nbsp; Items
		</a>

		<a href="#" class="btn btn-sm btn-block">
			<i class="fa fa-comments-o fa-fw fa-lg"></i>&nbsp; Chats
		</a>

		<a href="{{ URL::route('users.messages') }}" class="btn btn-sm btn-block {{ isActiveRoute('users.messages') }}">
			<i class="fa fa-envelope-o fa-fw fa-lg"></i>&nbsp; Messages
		</a>
	</nav>
</div>