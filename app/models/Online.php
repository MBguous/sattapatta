<?php

use Carbon\Carbon;

class Online extends \Eloquent {

    protected $hidden = ['payload'];
    // protected $dates = ['last_activity'];
    protected $fillable = ['user_id'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $table = 'sessions';

    public $timestamps = false;

    /**
     * Returns the user that belongs to this entry.
     */
    public function user()
    {
        return $this->belongsTo('User');
    }

    /**
     * Returns all the guest users.
     *
     * @param  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeGuests($query)
    {
        return $query->whereNull('user_id')->where('last_activity', '>=', strtotime(Carbon::now()->subMinutes(Config::get('custom.activity_limit'))));
    }

    /**
     * Returns all the registered users.
     *
     * @param  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRegistered($query)
    {
        return $query->whereNotNull('user_id')->where('last_activity', '>=', strtotime(Carbon::now()->subMinutes(Config::get('custom.activity_limit'))))->with('user');
    }

    /**
     * Updates the session of the current user.
     *
     * @param  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUpdateCurrent($query)
    {
        return $query->where('id', Session::getId())->update([
            'user_id' => ! empty(Auth::user()) ? Auth::id() : null
        ]);
    }

}