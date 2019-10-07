<?php

namespace App;

class MinifyUrl
{
	public static function generateMiniUrl($strUrl){

		$strCode = "";

		$arrstrAllowedCharSet = \str_split(config('minifyurl.allowed_charset'));
		$intMaxLength = config("minifyurl.url_postfix_length");
		$strPrefix = config("minifyurl.url_prefix");

		for($i = 0; $i < $intMaxLength; $i++){
			$strCode .= $arrstrAllowedCharSet[\random_int(0, \count($arrstrAllowedCharSet)-1)];
		}

		/* Future Enhancement
		- Use the passed in URL to generate custom prefix
		*/

		return $strPrefix.'/'.$strCode;

	}
}