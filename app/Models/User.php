<?php

namespace Fully\Models;
use App\Models\Profile;

use Cartalyst\Sentinel\Users\EloquentUser;

/**
 * Class User.
 *
 * @author Phillip Madsen <contact@affordableprogrammer.com>
 */
class User extends EloquentUser
{
    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password'];

    /**
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'profile_id', 'created_at', 'updated_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
            "id" => "integer",
            "name" => "string",
            "first_name" => "string",
            "last_name" => "string",
            "email" => "string",
            "profile_id" => "integer"
    ];

    public static $rules = [

    ];

    /**
     * Relationship with the Profile model.
     *
     * @author  Phillip Madsen <pmadsen2013@gmail.com>
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     *
     */
    public function Profile()
    {
        return $this->hasOne('Profile');
    }


	public function fullName()
	{
		return $this->first . ' ' . $this->last;
	}

	public function accountAge()
	{
		return $this->created_at->diffForHumans();
	}

}
