<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UrlClick extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'user_url_id',
	];
}
