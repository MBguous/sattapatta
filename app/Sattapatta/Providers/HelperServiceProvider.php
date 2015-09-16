<?php

namespace Sattapatta\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->app->bind('helpers', function()
		{
			return new \Sattapatta\Helpers\Helpers;
		});
	}
}