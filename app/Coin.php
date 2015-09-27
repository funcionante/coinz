<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'coins';

    /**
     * A coin has many copies.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function copies(){

        return $this->hasMany('App\Copy');
    }

    /**
     * A coin is submitted by a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){

        return $this->belongsTo('App\User');
    }
}
