<?php

namespace App\Http\Controllers\Dashboard;

use App\Model\UserUrl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the loading of the dashboard after the user has logged in
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		// Redirect user to login page if not logged in
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return Renderable
	 */
	public function loadDahsboard() {

		$arrobjUserUrls = DB::table('user_urls')
							->select('user_urls.id', 'user_urls.title', 'user_urls.full_url', 'user_urls.short_url', DB::raw('count(url_clicks.id) as click_count'))
							->leftJoin('url_clicks', 'url_clicks.user_url_id', '=', 'user_urls.id')
							->where('user_urls.user_id', '=', auth()->user()->id)
							->groupBy('user_urls.id', 'user_urls.title', 'user_urls.full_url', 'user_urls.short_url', 'url_clicks.user_url_id')
							->get();

		// load the urls created by logged in user
		//$arrobjUserUrls = UserUrl::where('user_id', auth()->user()->id)->get();

		return view('dashboard.index', ['userUrls' => $arrobjUserUrls]);
	}
}
