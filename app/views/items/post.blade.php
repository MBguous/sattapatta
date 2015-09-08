@extends ('layouts.master')

@section ('styleScript')
{{ HTML::style('css/bootstrap-markdown.min.css') }}
{{ HTML::script('js/jquery.js') }}
{{ HTML::script('js/bootstrap-markdown.js') }}
@stop

@section ('content')

      <div class="row">
        @if (Session::has('message'))
        <div class="alert alert-warning alert-dismissible" id="messageDiv" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <span><i class="fa fa-info-circle"></i>&nbsp;{{ Session::get('message') }}</span>
        </div>
        @endif

          <div class="well">
            <h5>Post Item</h5>

            {{ Form::open(array('route'=>'post.users.post', 'class'=>'form-horizontal', 'id'=>'item-form', 'files'=>true)) }}
              @include ('partials.itemForm')
              <div class="col-md-offset-2">
                <button type="reset" class="btn btn-default">Clear</button>
                <button type="submit" class="btn btn-primary">Post item</button>
              </div>
            {{ Form::close() }}
          </div>

      </div>

@stop

