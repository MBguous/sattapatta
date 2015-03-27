@extends ('layouts.master')

@section ('content')

 <div class="container">
    <!-- Title -->
    <div class="row">
      <div class="col-lg-12">
        <h4>Postings by latest time</h4>
      </div>
    </div>
    <!-- /.row -->

    <!-- Page Features -->
    @foreach ($items as $item)
      <div class="col-md-3 col-sm-6 hero-feature">
        <div class="thumbnail">
          <div style="position:relative; padding:0 10px">
            <h6>By {{ HTML::link('#', $item->user->username) }} <span class="pull-right">{{ $item->created_at->diffForHumans() }}</span></h6>
          </div>
          <!-- <img src="http://placehold.it/800x500" alt=""> -->
          <div style="text-align:center">
            {{ HTML::image($item->photoURL, null, ['height'=>'150px']) }}
          </div>
          <div class="caption">
            <strong>{{ $item->name }}</strong>
            <h6>
              @if (strlen($item->description)>75)
                {{ substr($item->description, 0,75) }}...
              @else
                {{ $item->description }}
              @endif
            </h6>
            <div style="position:absolute; bottom:10px">
              
              <a href="#" class="btn btn-primary btn-xs">Contact User!</a> <a href="#" class="btn btn-default btn-xs">Add to Wishlist</a>
            </div>
          </div>
          
        </div>
      </div>
    @endforeach

@stop