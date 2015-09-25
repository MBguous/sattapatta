
<table class="table table-striped table-hover" id="user-details-table">
	<tr>
		<th>Username</th>
		<td>
			<a href="#" id="username" data-type="text" data-title="Enter username">
				{{ $user->username }}
			</a>
		</td>
	</tr>
	<tr>
		<th>Email</th>
		<td>
			<a href="#" id="email" data-type="text" data-title="Enter email">
				{{ $user->email }}			
			</a>
		</td>
	</tr>
	<tr>
		<th>First Name</th>
		<td>
			<a href="#" id="firstName" data-type="text" data-title="Enter first name">
				{{ $user->firstName }}			
			</a>
		</td>
	</tr>
	<tr>
		<th>Last Name</th>
		<td>
			<a href="#" id="lastName" data-type="text" data-title="Enter last name">
				{{ $user->lastName }}			
			</a>
		</td>
	</tr>
	<tr>
		<th>Gender</th>
		<td>
			<a href="#" id="gender" data-type="select" data-title="Select gender"></a>
			{{ Form::hidden('gender-value', $user->gender, ['id'=>'gender-value']) }}
		</td>
	</tr>
	<tr>
		<th>Date of Birth</th>
		<td>
			<a href="#" id="birthDay" data-type="select" data-value="{{$user->birthDay}}" data-title="Select day" class="editable-click"></a>
			/
			<a href="#" id="birthMonth" data-type="select" data-value="{{$user->birthMonth}}" data-title="Select month" class="editable-click"></a>
			/
			<a href="#" id="birthYear" data-type="select" data-value="{{$user->birthYear}}" data-title="Select year" class="editable-click"></a>

			{{ Form::hidden('birthYear-value', $user->birthYear, ['id'=>'birthYear-value']) }}
			{{ Form::hidden('birthMonth-value', $user->birthMonth, ['id'=>'birthMonth-value']) }}
			{{ Form::hidden('birthDay-value', $user->birthDay, ['id'=>'birthDay-value']) }}

		</td>
	</tr>
	<tr>
		<th>Phone</th>
		<td>
			<a href="#" id="phone" data-type="tel" data-title="Enter phone">
				@if($user->phone == NULL)
				Empty
				@else
				{{ $user->phone }}
				@endif
			</a>
		</td>
	</tr>
	<tr>
		<th>Address</th>
		<td>
			<a href="#" id="address" data-type="text" data-title="Enter address">
				@if($user->address == NULL)
				Empty
				@else
				{{ $user->address }}
				@endif
			</a>
		</td>
	</tr>
	<tr>
		<th>Country</th>
		<td>
			<a href="#" id="country" data-type="text" data-title="Enter country">
				@if($user->country == NULL)
				Empty
				@else
				{{ $user->country }}			
				@endif
			</a>
		</td>
	</tr>
</table>

<script>
	
	var userId = {{ $user->id }};

	$('#user-details-table').editable({
		selector: 'a',
		url: 'user/edit',
		pk: userId,
	});

	$('#gender').editable({
		url: 'user/edit',
		pk: userId,
		value: $('#gender-value').val(),    
		source: [
			{value: 1, text: 'Male'},
			{value: 2, text: 'Female'},
			{value: 3, text: 'Other'}
		]
	});

	$('#birthYear').editable({
		url: 'user/edit',
		pk: userId,
		value: $('#birthYear-value').val(),
		source: [
			{value: 1990, text: '1990'},
			{value: 1991, text: '1991'},
			{value: 1992, text: '1992'},
			{value: 1993, text: '1993'},
			{value: 1994, text: '1994'},
			{value: 1995, text: '1995'},
			{value: 1996, text: '1996'},
			{value: 1997, text: '1997'},
			{value: 1998, text: '1998'}
		]
	});

	$('#birthMonth').editable({
		url: 'user/edit',
		pk: userId,
		value: $('#birthMonth-value').val(),
		source: [
			{value: 1, text: 'Jan'},
			{value: 2, text: 'Feb'},
			{value: 3, text: 'Mar'},
			{value: 4, text: 'Apr'},
			{value: 5, text: 'May'},
			{value: 6, text: 'Jun'},
			{value: 7, text: 'Jul'},
			{value: 8, text: 'Aug'},
			{value: 9, text: 'Sep'},
			{value: 10, text: 'Oct'},
			{value: 11, text: 'Nov'},
			{value: 12, text: 'Dec'}
		]
	});

	$('#birthDay').editable({
		url: 'user/edit',
		pk: userId,
		value: $('#birthDay-value').val(),
		source: [
			{value: 1, text: '1'},
			{value: 2, text: '2'},
			{value: 3, text: '3'},
			{value: 4, text: '4'},
			{value: 5, text: '5'},
			{value: 6, text: '6'},
			{value: 7, text: '7'},
			{value: 8, text: '8'},
			{value: 9, text: '9'},
			{value: 10, text: '10'},
			{value: 11, text: '11'},
			{value: 12, text: '12'},
			{value: 13, text: '13'},
			{value: 14, text: '14'},
			{value: 15, text: '15'},
			{value: 16, text: '16'},
			{value: 17, text: '17'},
			{value: 18, text: '18'},
			{value: 19, text: '19'},
			{value: 20, text: '20'},
			{value: 21, text: '21'},
			{value: 22, text: '22'},
			{value: 23, text: '23'},
			{value: 24, text: '24'},
			{value: 25, text: '25'},
			{value: 26, text: '26'},
			{value: 27, text: '27'},
			{value: 28, text: '28'},
			{value: 29, text: '29'},
			{value: 30, text: '30'},
			{value: 31, text: '31'}
		]
	});

</script>

{{-- {{ HTML::script('js/Sattapatta/editable.js') }} --}}

@section ('script')




@stop