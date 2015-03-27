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
            <h6>
              By {{ HTML::linkRoute('users.dashboard', $item->user->username, $item->user->username) }} 
              <span class="pull-right">{{ $item->created_at->diffForHumans() }}</span>
            </h6>
          </div>
          <!-- <img src="http://placehold.it/800x500" alt=""> -->
          <div style="text-align:center">
            {{ HTML::image($item->photoURL, null, ['height'=>'150px']) }}
          </div>
          <div class="caption">
            <p><strong>{{ $item->name }}</strong></p> 
            <h6 data-toggle="tooltip" data-placement="bottom" title="{{ $item->description }}">
              {{ $item->description }}
            </h6>
            <div style="position:absolute; bottom:10px">
            {{ Form::open() }}
              {{ HTML::linkRoute('compose.message', 'Contact User', $item->user->username, ['class'=>'btn btn-primary btn-xs']) }}
              {{ HTML::link('#', 'Add to Wishlist', ['class'=>'btn btn-default btn-xs']) }}
            {{ Form::close() }}
            </div>
          </div>
          
        </div>
      </div>
    @endforeach

@stop