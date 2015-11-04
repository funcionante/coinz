<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'currencies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'begin', 'end'];

    /**
     * A currency has many coins.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function coins(){

        return $this->hasMany('App\Coin');
    }
}
