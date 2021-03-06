<?php
/**
 * PublikoAL - Classified Ads Web Application
 * Copyright (c) Rvslan All Rights Reserved
 *
 * Website: https://publiko.al
 *
 * LICENSE
 * -------
 * This software is furnished under a license and may be used and copied
 * only in accordance with the terms of such license and with the inclusion
 * of the above copyright notice. If you Purchased from Codecanyon,
 * Please read the full License from here - http://codecanyon.net/licenses/standard
 */

namespace App\Observers\Traits\Setting;

trait GeoLocationTrait
{
	/**
	 * Saved
	 *
	 * @param $setting
	 */
	public function geoLocationSaved($setting)
	{
		$this->saveTheDefaultCountryCodeInSession($setting);
	}
	
	/**
	 * If the Default Country is changed,
	 * Then clear the 'country_code' from the sessions,
	 * And save the new value in session.
	 *
	 * @param $setting
	 */
	private function saveTheDefaultCountryCodeInSession($setting)
	{
		if (isset($setting->value['default_country_code'])) {
			session()->forget('country_code');
			session(['country_code' => $setting->value['default_country_code']]);
		}
	}
}
