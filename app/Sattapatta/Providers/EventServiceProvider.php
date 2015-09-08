<?php 

namespace Sattapatta\Providers;

use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
	public function register()
	{
		Event::listen('items.view', 'Sattapatta/Events/ViewItemHandler');
	}
}


