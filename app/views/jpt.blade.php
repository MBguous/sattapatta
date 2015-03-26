@extends ('layouts.mastertemp')

@section ('content')
 @section('sidebar')
 @show
{{ HTML::link('#', 'Get', ['id'=>'get']) }}

{{-- Form::open(array('action'=>'#')) --}}
<form action="#">
	{{ Form::label('', 'name') }}
	{{ Form::text('name') }}
	<div class="form-group">
	    	{{ Form::label('username', 'Username', ['class'=>'col-md-3 control-label']) }}
	    	<div class="col-md-9">
		    	{{ Form::text('username', null, ['class'=>'form-control']) }}
	    	</div>
	    </div>
	    <div class="form-group">
	    	{{ Form::label('firstName', 'First Name', ['class'=>'col-md-3 control-label']) }}
	    	<div class="col-md-9">
		    	{{ Form::text('firstName', null, ['class'=>'form-control']) }}
	    	</div>
	    </div>
	    <div class="form-group">
	    	{{ Form::label('lastName', 'Last Name', ['class'=>'col-md-3 control-label']) }}
	    	<div class="col-md-9">
		    	{{ Form::text('lastName', null, ['class'=>'form-control']) }}
	    	</div>
	    </div>
	    <div class="form-group">
	      <label class="col-lg-3 control-label">Gender</label>
	      <div class="col-lg-9">
	        <div class="radio">
	          <label>
	            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
	            Male
	          </label>
	        </div>
	        <div class="radio">
	          <label>
	            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
	            Female
	          </label>
	        </div>
	      </div>
	    </div>
	    <div class="form-group">
	    	{{ Form::label('dateOfBirth', 'Date of Birth', ['class'=>'col-md-3 control-label']) }}
	    	<div class="col-md-9">
		    	{{ Form::text('birthDay', null, ['class'=>'form-control inline']) }}
		    	{{ Form::text('birthMonth', null, ['class'=>'form-control inline']) }}
		    	{{ Form::text('birthYear', null, ['class'=>'form-control inline']) }}
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
	    </div>
	    <div class="form-group">
	    	{{ Form::label('country', 'Country', ['class'=>'col-md-3 control-label']) }}
	    	<div class="col-md-9">
		    	{{ Form::text('country', null, ['class'=>'form-control']) }}
	    	</div>
	    </div>
	<button type="submit">Submit</button>
</form>
{{-- Form::close() --}}

{{ HTML::script('js/jquery.js') }}

<script type="text/javascript">
	$(document).ready(function(){
      $('#get').click(function(e){
        e.preventDefault();

        // ajax get
        $.get('jpt/get', function(data) {
          console.log(data);
        });
      });

      $('form').submit(function(e) {
      	e.preventDefault();

      	var name = $(this).find('input[name=username]').val();
      	var $form = $(this); 
	    var data=$form.serialize();

      	// ajax post
      	// $.post('jpt/get', {data: name}, function(data){
      	$.post('jpt/get', {formData:data}, function(jpt){
      		console.log(jpt);
      	});
      });
    });
</script>

@stop