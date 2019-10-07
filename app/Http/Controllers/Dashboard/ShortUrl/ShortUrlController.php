<?php

namespace App\Http\Controllers\Dashboard\ShortUrl;

use App\MinifyUrl;
use App\Model\UserUrl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ShortUrlController extends Controller
{
	/*
    |--------------------------------------------------------------------------
    | Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the adding/editing/deleting of short urls
    |
    */

	/**
	 * Create a new controller instance.
	 */
	public function __construct() {
		$this->middleware('auth');

	}

	/**
	 * Show the form for adding the specified resource.
	 */
	public function create() {

		$objUserUrl = new UserUrl();
		return view('dashboard.short_url.create', compact('objUserUrl'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function save() {

		$objValidator = Validator::make(request()->all(), $this->getValidationRules());

		$objUserUrl = UserUrl::firstOrNew(['id' => request()->id], [request()->all()]);

		if ($objValidator->fails()) {
			return view('dashboard.short_url.create', compact('objUserUrl'))->withErrors($objValidator->messages());
		}

		$objUserUrl->fill(request()->all());
		$objUserUrl->short_url = ($objUserUrl->isDirty(['full_url'])) ? MinifyUrl::generateMiniUrl(request()->full_url) : $objUserUrl->short_url;

		$objUserUrl->save();

		return redirect('/dashboard');
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit() {
		$objUserUrl = UserUrl::where('id', request()->id)->firstOrFail();
		return view('dashboard.short_url.create', compact('objUserUrl'));
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function delete() {
		$url = UserUrl::where('id', request()->id)->firstOrFail();
		$url->delete();
		return redirect('/dashboard');
	}


	/* Other functions */

	public function getValidationRules() {
		return [
			'user_id' => ['required', 'integer'],
			'title' => ['required', 'string', 'max:255'],
			'description' => ['string', 'max:255'],
			'full_url' => ['required', 'string', 'url', 'max:255'],
		];
	}
}
