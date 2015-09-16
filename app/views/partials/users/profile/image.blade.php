<div class="panel panel-default text-center">
					<div class="panel-heading">Profile Image</div>
					<div class="panel-body">
						<div class="img-circle" style="overflow:hidden; height:100%; width:100%">
							<a href="#profile-image" data-toggle="modal" title="Change profile picture">
								{{ HTML::image($user->photoURL, 'profile-pic', ['class'=>'img-responsive']) }}
							</a>
						</div>
						
						<div class="modal fade" id="profile-image">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<span class="modal-title">Change profile picture</span>
									</div>
									{{ Form::open(array('url'=>'users/profile/image', 'files'=>true)) }}
									<div class="modal-body">

										{{ Form::label('image', 'Choose an image') }}

										{{ Form::file('photoURL', ['id'=>'profile-image', 'class'=>'file', 'data-preview-file-type'=>'text', 'data-show-upload'=>false, 'accept'=>'image/*']) }}
										<div class="text-danger" id="photoURL_error">
											{{ $errors->first('photoURL', ':message') }}
										</div>

										

									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-sm btn-primary">Save changes</button>
									</div>
									{{ Form::close() }}
								</div>
							</div>
						</div>
						<!-- /modal -->
		<!-- <br>
		<hr> -->
		
					</div>
					<div class="panel-footer">
						<p>
							{{ $user->username }}	
						</p>
						
						<p>
							<i class="fa fa-calendar"></i> Joined on {{ date('M j, 20y',strtotime($user->created_at)) }}
						</p>
					</div>
				</div>