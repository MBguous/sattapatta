@extends ('layouts.master')

@section ('content')

 <div class="container">
    <!-- Title -->
    <div class="row">
      <!-- <div class="col-lg-12"> -->
        <h4>Recent listings</h4>
      <!-- </div> -->
    <!-- </div> -->
    <!-- /.row -->

    <!-- Page Features -->
    @foreach ($items as $item)
      <div class="col-md-3 col-sm-6">
        <div class="thumbnail">
          <div style="position:relative; padding:0 10px">
            <h6>
              By {{ HTML::linkRoute('users.profile', $item->user->username, $item->user->username) }} 
              <span class="pull-right">{{ $item->created_at->diffForHumans() }}</span>
            </h6>
          </div>
          <!-- <img src="http://placehold.it/800x500" alt=""> -->
          <div style="text-align:center">
            <a href="{{URL::route('items.show', [$item->user->username, $item->name, $item->id])}}">
              {{ HTML::image($item->photoURL, null, ['style'=>'height:150px', 'class'=>'img-responsive']) }}
            </a>
            {{-- HTML::linkRoute('items.show', HTML::image($item->photoURL, null, ['height'=>'150px']), $item->user->username, ['style'=>'height:150px']) --}}
            
          </div>
          <div class="caption">
            <p><strong>{{ $item->name }}</strong></p> 
            <h6 data-toggle="tooltip" data-placement="bottom" title="{{ $item->description }}">
              {{ $item->description }}
            </h6>
            <div style="bottom:10px">
              
                @if(Auth::check() and Auth::user()->username != $item->user->username)
                  {{-- HTML::linkRoute('compose.message', 'Contact User', $item->user->username, ['class'=>'btn btn-primary btn-xs']) --}}
                  <a href="#">
                    <i class="fa fa-thumb-tack"></i>
                  </a>
                @endif
              
            
            </div>
          </div>
          
        </div>
      </div>
      <!-- /.col -->
      
    @endforeach
  </div>
</div>
@stop
