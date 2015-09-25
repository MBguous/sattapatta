<div class="col-md-2">
	<nav id="sidebar">
		<a href="#" class="btn btn-sm btn-block">
			<i class="fa fa-trello fa-fw fa-lg"></i>&nbsp; Dashboard
		</a>

		<a href="{{ URL::route('users.profile', $loggedUser->username) }}" class="btn btn-sm btn-block {{ isActiveRoute('users.profile') }}">
			<i class="fa fa-user fa-fw fa-lg"></i>&nbsp; Profile
		</a>

		<hr>

		<a href="{{ URL::route('users.listing', Auth::user()->username) }}" class="btn btn-sm btn-block {{ isActiveRoute('users.listing') }}">
			<i class="fa fa-list-alt fa-fw fa-lg"></i>&nbsp; My Listings
		</a>

		<a href="{{ URL::route('items.post') }}" class="btn btn-sm btn-block {{ isActiveRoute('items.post') }}">
			<i class="fa fa-plus-square fa-fw fa-lg"></i>&nbsp; Post Item
		</a>

		<hr>

		<a href="#" class="btn btn-sm btn-block">
			<i class="fa fa-comments-o fa-fw fa-lg"></i>&nbsp; Chats
		</a>

		<a href="{{ URL::route('users.messages') }}" class="btn btn-sm btn-block {{ isActiveRoute('users.messages') }}">
			<i class="fa fa-envelope-o fa-fw fa-lg"></i>&nbsp; Messages
		</a>
	</nav>
</div>