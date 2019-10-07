<?php
return [

	// The minimum character length
	'url_postfix_length' => env('MINIFYURL_LENGTH_MIN', 5),

	// Optionally, an URL prefix. May be left empty. However, this would require registering the `routes` of this package after all your other routes
	'url_prefix' => env('MINIFYURL_URL_PREFIX', "http://mini.fy"),

	// The characters used to generate an unique URL
	'allowed_charset' => env('MINIFYURL_CHARSET', "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-._~"),

	// Use a prefix for the generated URL code
	'url_prefix_code' => env('MINIFYURL_URL_PREFIX_CODE', "__")

];