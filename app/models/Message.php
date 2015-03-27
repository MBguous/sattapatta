<?php

class Message extends Eloquent {

	public function users() {
		return $this->belongsToMany('User');
	}

}