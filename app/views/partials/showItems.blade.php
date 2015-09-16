@forelse ($items as $item)
    <div class="col-md-3 col-sm-6">
      <div class="thumbnail">
        <div class="caption">
            By {{ HTML::linkRoute('users.profile', $item->user->username, $item->user->username) }} 
            <span class="pull-right">{{ $item->created_at->diffForHumans() }}</span>
        </div>
        <!-- <img src="http://placehold.it/800x500" alt=""> -->
        <div class="center-block">
          <a href="{{URL::route('items.show', [$item->user->username, $item->name, $item->id])}}">
           {{--  @if(!$item->images->first())
              {{ HTML::image('images/placeholder.png', null, ['style'=>'height:150px', 'class'=>'img-responsive']) }}
            @else
              {{ HTML::image($item->images->first()->imageUrl, null, ['style'=>'height:150px', 'class'=>'img-responsive']) }}
            @endif --}}

            {{ HTML::image(!$item->images->first() ? 'images/placeholder.png' : $item->images->first()->imageUrl, null, ['style'=>'height:150px', 'class'=>'img-responsive'])}}

          </a>

        </div>
        <div class="caption">
          <strong>{{ $item->name }}</strong>
          <span class="pull-right">
            @if(Auth::check())
              @if(Auth::user()->username != $item->user->username)

                @if($watched = in_array($item->id, $watchlist))
                  {{ Form::open(['method'=>'DELETE', 'route'=>['watchlist.destroy', $item->id]]) }}
                @else
                  {{ Form::open(['route' => 'items.browse']) }}
                    {{ Form::hidden('item-id', $item->id) }}
                @endif
                
                <button type="submit" class="btn btn-xs {{ $watched  ? 'btn-default' : 'btn-primary' }}">
                  <i class="fa fa-thumb-tack"></i> {{ $watched ? 'Added' : 'Add' }} to watchlist
                </button>
                {{ Form::close() }}

              @else
                <a href="{{URL::route('item.edit', [$item->user->username, $item->name, $item->id])}}">
                  <i class="fa fa-edit"></i>
                </a>
              @endif
            @endif
          </span>
          <p data-toggle="tooltip" data-placement="bottom" title="{{ $item->description }}">
            {{ $item->description }}
          </p>

        </div>

      </div>
    </div>
    <!-- /.col -->
    
    @empty
      <p class="text-muted">No items</p>

    @endforelse