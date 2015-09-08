<br>
		    			<!-- accordion -->
		    			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

		    				@forelse ($watchlist_items as $item)
		    				<div class="panel panel-default">
		    					<div class="panel-heading" role="tab">
		    						<h4 class="panel-title">
		    							{{ HTML::link('#'.$item->id, $item->name, ['class'=>'collapsed', 'data-toggle'=>'collapse', 'data-parent'=>'#accordion']) }}
		    							@if ($item->status == 'unavailable')
		    							<i class="label label-warning">done deal</i>
		    							@endif
		    							<!-- <a class="collapsed" data-toggle="collapse" data-parent="accordion"  href="#{{$item->id}}">
		    								{{ $item->name }} 
		    							</a> -->
						        <!-- <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          Collapsible Group Item #1
						        </a> -->
						      </h4>
						    </div>
						    <div id={{ $item->id }} class="panel-collapse collapse" role="tabpanel">
						    	<div class="panel-body">
						    		<div class="col-md-4">
						    			<a href="{{URL::route('items.show', [$item->user->username, $item->name, $item->id])}}">

						    				@if(!$item->images->first())
						    				{{ HTML::image('images/placeholder.png', null, ['style'=>'height:150px', 'class'=>'img-responsive']) }}
						    				@else
						    				{{ HTML::image($item->images->first()->imageUrl, null, ['style'=>'height:150px', 'class'=>'img-responsive']) }}
						    				@endif
						    			</a>
						    		</div>
						    		<div class="col-md-8">
						    			<table class="table table-striped table-hover">
						    				<tr>
						    					<th>Name</th>
						    					<td>{{ $item->name }}</td>
						    				</tr>
						    				<tr>
						    					<th>Price</th>
						    					<td>Rs. {{ $item->price }}</td>
						    				</tr>
						    				<tr>
						    					<th>Description</th>
						    					<td>{{ $item->description }}</td>
						    				</tr>
						    				<tr>
						    					<th>Posted on</th>
						    					<td>{{ $item->date }} {{ $item->time }}</td>
						    				</tr>
						    				<tr>
						    					<th>Status</th>
						    					<td>{{ $item->status }}</td>
						    				</tr>
						    			</table>
						    		</div>
						    	</div>
						    </div>
						  </div>
						  @empty
						  	You don't have any items in your watchlist yet.
						  @endforelse

						</div>
						<!-- accordion -->