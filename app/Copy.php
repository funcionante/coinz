<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Copy extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'copies';

    /**
     * A copy is from a coin.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function coin(){

        return $this->belongsTo('App\Coin');
    }

    /**
     * A copy is owned by a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){

        return $this->belongsTo('App\User');
    }
}
