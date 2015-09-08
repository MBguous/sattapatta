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
    <div class="col-md-6">
      <h4>Recent listings</h4>
    </div>
  </div>
  <div class="row">
    @include ('partials.showItems')
  </div>

  {{ $items->links() }}

@stop
