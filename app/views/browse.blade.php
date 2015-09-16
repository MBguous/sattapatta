@extends ('layouts.master')

@section ('content')

@section ('home-class')
""
@endsection

@section ('browse-class')
"active"
@endsection

@section ('chat-class')
""
@endsection

  <!-- Title -->
  <div class="row">

    <div class="form-group">
      {{ Form::text('keyword', null, ['class'=>'form-control', 'id'=>'quick-search', 'placeholder'=>'Make a quick search ...', 'onkeydown'=>'down()', 'onkeyup'=>'up()']) }}
    </div>

    <div class="col-md-6">
      <h4>Item listings</h4>
    </div>
  </div>
  <div class="row" id="show-items">
    @include ('partials.showItems')
  </div>

  <div class="text-center">{{ $items->links() }}</div>

@stop

@section ('script')
<script>var root = "{{ url('/') }}";</script>
@stop
