<?php

namespace App\Http\Controllers;

use App\Model\UrlClick;
use App\Model\UserUrl;
use App\MinifyUrl;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Cookie\CookieJar;
use Illuminate\Support\Facades\DB;


class Controller extends BaseController {

	/*
    |--------------------------------------------------------------------------
    | Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the loading of the home page and saving the minified urls as guest to a cookie.
    |
    */

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $m_objGuestCookie;
    protected $m_arrstrGuestUrls;

	protected $m_intTotalLinks;
	protected $m_intTotalHits;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */

    public function __construct() {
    	$this->m_arrstrGuestUrls = [];
	}


	/**
	 * Load home page.
	 */
	public function index(CookieJar $objCookieJar) {

		$this->createCookie($objCookieJar);

		$this->getDashboardStatistics();

		return view('welcome', ['urlInfo' => $this->m_arrstrGuestUrls, 'totalHits' => $this->m_intTotalHits, 'totalLinks' => $this->m_intTotalLinks]);
	}

	/**
	 * Save the minified url for guest.
	 */

	public function saveGuestUrl(CookieJar $objCookieJar) {

		$strFullUrl = request()->full_url;
		$strMinifiedUrl = MinifyUrl::generateMiniUrl($strFullUrl);

		$this->createCookie($objCookieJar, [$strFullUrl => $strMinifiedUrl]);

		UserUrl::create([
			'full_url' => $strFullUrl,
			'short_url' => $strMinifiedUrl
		]);

		return view('welcome', ['urlInfo' => $this->m_arrstrGuestUrls]);
	}


	/* Other funtions */

	/**
	 * Create or update cookie
	 *
	 * @return void
	 */

	private function createCookie(CookieJar $objCookieJar, $arrstrNewUrlInfo = []) {

		$this->m_objGuestCookie = request()->cookie('minifiedUrl');

		if(!empty($this->m_objGuestCookie)) {
			$this->m_arrstrGuestUrls = (array) unserialize($this->m_objGuestCookie);
		}

		$this->m_arrstrGuestUrls = array_merge($this->m_arrstrGuestUrls, $arrstrNewUrlInfo );
		$objCookieJar->queue(cookie('minifiedUrl', serialize($this->m_arrstrGuestUrls), 45000));
	}

	/**
	 * Calcuate the Home Page Statistics
	 */
	public function getDashboardStatistics() {

		$this->m_intTotalHits = UrlClick::count();

		$this->m_intTotalLinks = UserUrl::count();

	}
}
