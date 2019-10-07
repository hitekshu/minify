<?php
return [

	// The minimum character length for generating the unique url code
	'url_postfix_length' => env('MINIFYURL_LENGTH_MIN', 5),

	// Optionally, an URL prefix. May be left empty
	'url_prefix' => env('MINIFYURL_URL_PREFIX', "http://mini.fy"),

	// The characters used to generate an unique URL
	'allowed_charset' => env('MINIFYURL_CHARSET', "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-._~"),


];