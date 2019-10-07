<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserUrl extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'title', 'user_id', 'description', 'full_url', 'short_url',
	];
}
