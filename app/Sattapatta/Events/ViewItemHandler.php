<?php

namespace Sattapatta\Events;

use Item;

// use Illuminate\Support\ServiceProvider;
use Illuminate\Session\Store;

class ViewItemHandler
{
	private $session;

	public function __construct(Store $session)
	{
		$this->session = $session;
	}
	// public function register()
	// {
	// 	Event::listen('item.view', 'events/ViewItemHandler');
	// }
	public function handle(Item $item)
	{
		if(!$this->isItemViewed($item))
		{
			$item->increment('view_count');
			// $item->view_count += 1;

			$this->storeItem($item);
		}
	}
	private function isItemViewed($item)
	{
		$viewed = $this->session->get('viewed_items', []);
		return in_array($item->id, $viewed);
	}
	private function storeItem($item)
	{
		$this->session->push('viewed_items', $item->id);
	}
}