<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * A user submits many coins.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function coins()
    {
        return $this->hasMany('App\Coin');
    }

    /**
     * A user owns many copies of coins.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function copies()
    {
        return $this->hasMany('App\Copy');
    }

    /**
     * Set verification_token field.
     */
    public function setVerificationToken()
    {
        $this->attributes['verification_token'] = str_random(30);
    }

    /**
     * Set a user's account to verified state.
     */
    public function setVerified()
    {

        $this->attributes['level'] = 1;
        $this->attributes['verification_token'] = null;
    }

    /**
     * Check if a user's account is verified.
     */
    public function isVerified()
    {
        return $this->attributes['level'] != 0;
    }

    /**
     * Check if a user is a manager.
     */
    public function isManager()
    {
        return $this->attributes['level'] > 1;
    }

    /**
     * Get the user's level.
     *
     * @param  string  $value
     * @return string
     */
    public function getLevelAttribute($value)
    {
        if ($value == 2)
            return "Administrador";

        return "Utilizador";
    }

    /**
     * Get the user's registration date.
     *
     * @param  string  $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return date("d/m/Y", strtotime($value));
    }

    /**
     * Get the user's avatar.
     *
     * @param  string  $value
     * @return string
     */
    public function getAvatarAttribute($value)
    {
        if ($value == null) {
            return 'media/users/0.png';
        }

        return $value;
    }
}