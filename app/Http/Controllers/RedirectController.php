<?php

namespace App\Http\Controllers;

use App\Model\UrlClick;
use App\Model\UserUrl;

class RedirectController extends Controller
{
	/*
    |--------------------------------------------------------------------------
    | Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the redirection to the full url from the short urls
    |
    */


	/**
	 * Create a new user instance after a valid registration.
	 */
	public function redirect() {

		$objUserUrl = UserUrl::where('short_url',request()->url())->firstOrFail();

		$this->recordUrlClick($objUserUrl);

		return redirect($objUserUrl->full_url);
	}

	/**
	 * Insert the click in the database
	 */
	public function recordUrlClick($objUserUrl) {
		UrlClick::create([
			'user_url_id' => $objUserUrl->id
		]);
	}
}
