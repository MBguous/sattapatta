@extends ('layouts.master')

@section ('content')

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<div class="row">

				@if (Session::has('message'))
		      <div class="alert alert-info alert-dismissible" role="alert">
		        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		        <span><i class="fa fa-info-circle"></i>&nbsp;{{ Session::get('message') }}</span>
		      </div>
		    @endif


			    <div class="col-md-offset-1 col-md-10">

	          <div class="well well-lg">

	            {{-- Form::model(array('route'=>'post.users.post', 'class'=>'form-horizontal', 'files'=>true)) --}}
	            {{ Form::model($item, array('url'=>array('update/item', $item->id), 'class'=>'form-horizontal', 'files'=>true)) }}
	              @include ('partials.itemForm')
	            {{ Form::close() }}
	          </div>

					</div>
		    </div>
	    </div>
    </div>
  </div>

@stop