<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Model\UserUrl;
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

	protected $m_intTotalLinks;
	protected $m_intTotalHits;

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
	 */
	public function loadDahsboard() {

		$arrobjUserUrls = DB::table('user_urls')
							->select('user_urls.id', 'user_urls.title', 'user_urls.full_url', 'user_urls.short_url', DB::raw('count(url_clicks.id) as click_count'))
							->leftJoin('url_clicks', 'url_clicks.user_url_id', '=', 'user_urls.id')
							->where('user_urls.user_id', '=', auth()->user()->id)
							->groupBy('user_urls.id', 'user_urls.title', 'user_urls.full_url', 'user_urls.short_url', 'url_clicks.user_url_id')
							->get();

		$this->getDashboardStatistics();

		return view('dashboard.index', ['userUrls' => $arrobjUserUrls, 'totalHits' => $this->m_intTotalHits, 'totalLinks' => $this->m_intTotalLinks]);
	}

	/**
	 * Calcuate the Dashboard Statistics
	 */
	public function getDashboardStatistics() {

		$this->m_intTotalHits = DB::table('url_clicks')
									->select( DB::raw('url_clicks.id'))
									->leftJoin('user_urls', 'url_clicks.user_url_id', '=', 'user_urls.id')
									->where('user_urls.user_id', '=', auth()->user()->id)
									->get()
									->count();

		$this->m_intTotalLinks = UserUrl::where('user_id', '=', auth()->user()->id)
									->count();

	}
}
