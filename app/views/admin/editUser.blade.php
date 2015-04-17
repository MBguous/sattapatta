{{ Form::model($user, array('url'=>array('users/profile/info', Auth::user()->username), 'class'=>'form-horizontal', 'id'=>'infoForm', 'method'=>'put')) }}
{{-- Form::model(Auth::user(), array('route'=>array('users.profile.info'=>Auth::user()->id, 'method'=>'put'), 'class'=>'form-horizontal', 'id'=>'infoForm')) --}}
<!-- <form action="#" id="infoForm" class="form-horizontal"> -->
<!-- <div class="modal-body"> -->

<div class="form-group">
	{{ Form::label('username', 'Username', ['class'=>'col-md-3 control-label']) }}
	<div class="col-md-9">
		{{ Form::text('username', null, ['class'=>'form-control']) }}
		<div id="username_error"></div>
	</div>
</div>

<div class="form-group">
	{{ Form::label('firstName', 'First Name', ['class'=>'col-md-3 control-label']) }}
	<div class="col-md-9">
		{{ Form::text('firstName', null, ['class'=>'form-control']) }}
		<div id="firstName_error"></div>
	</div>
</div>

<div class="form-group">
	{{ Form::label('lastName', 'Last Name', ['class'=>'col-md-3 control-label']) }}
	<div class="col-md-9">
		{{ Form::text('lastName', null, ['class'=>'form-control']) }}
		<div id="lastName_error"></div>
	</div>
</div>

<div class="form-group">
	<label class="col-lg-3 control-label">Gender</label>
	<div class="col-lg-9">
		<div class="radio">
			<label>
				<input type="radio" name="gender" id="male" value="male" checked="">
				Male
			</label>
		</div>
		<div class="radio">
			<label>
				<input type="radio" name="gender" id="female" value="female">
				Female
			</label>
		</div>
		<div id="gender_error"></div>
	</div>
</div>

<div class="form-group">
	{{ Form::label('birthDay', 'Birth Day', ['class'=>'col-md-3 control-label']) }}
	<div class="col-md-9">
		{{ Form::selectRange('birthDay', 1, 31, null, ['class'=>'form-control']) }}
		<div id="birthDay_error"></div>
	</div>
</div>

<div class="form-group">
	{{ Form::label('birthMonth', 'Birth Month', ['class'=>'col-md-3 control-label']) }}
	<div class="col-md-9">
		{{ Form::selectMonth('birthMonth', null, ['class'=>'form-control']) }}
		<div id="birthMonth_error"></div>
	</div>
</div>

<div class="form-group">
	{{ Form::label('birthYear', 'Birth Year', ['class'=>'col-md-3 control-label']) }}
	<div class="col-md-9">
		{{ Form::selectYear('birthYear', 1950, 2015, 1980, ['class'=>'form-control']) }}
		<div id="birthYear_error"></div>
	</div>
</div>

<div class="form-group">
	{{ Form::label('phone', 'Phone', ['class'=>'col-md-3 control-label']) }}
	<div class="col-md-9">
		{{ Form::text('phone', null, ['class'=>'form-control']) }}
	</div>
	<div id="phone_error"></div>
</div>

<div class="form-group">
	{{ Form::label('address', 'Address', ['class'=>'col-md-3 control-label']) }}
	<div class="col-md-9">
		{{ Form::text('address', null, ['class'=>'form-control']) }}
	</div>
	<div id="address_error"></div>
</div>

<div class="form-group">
	{{ Form::label('country', 'Country', ['class'=>'col-md-3 control-label']) }}
	<div class="col-md-9">
		{{ Form::text('country', null, ['class'=>'form-control']) }}
	</div>
	<div id="country_error"></div>
</div>

<!-- </div> -->
<div>
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-primary">Save changes</button>
</div>
<!-- </form> -->
{{ Form::close() }}