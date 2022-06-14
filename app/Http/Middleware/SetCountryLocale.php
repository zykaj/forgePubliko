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

namespace App\Http\Middleware;

use App\Http\Controllers\Traits\LocalizationTrait;
use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class SetCountryLocale
{
	use LocalizationTrait;

	/**
	 * Handle an incoming request.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \Closure $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		// Exception for some Routes
		if (
			isFromAdminPanel()
			|| Str::contains(Route::currentRouteAction(), 'InstallController')
			|| Str::contains(Route::currentRouteAction(), 'UpgradeController')
		) {
			return $next($request);
		}

		// Load Localization Data
		$this->loadLocalizationData();

		// Get the User's Country info (by his IP address) \w the Country's language
		$country = config('country');
		if (!empty($country)) {
			// Check if the 'Website Country Language' detection option is activated
			if (config('settings.app.auto_detect_language') == '2') {
				// Check if the language is available in the system
				if (is_array($country) && isset($country['lang']) && isset($country['code'])) {
					$lang = collect($country['lang']);

					if (!$lang->isEmpty()) {
						// Config: Language (Updated)
						if (!$lang->isEmpty()) {
							config()->set('lang.abbr', $lang->get('abbr'));
							config()->set('lang.locale', $lang->get('locale'));
							config()->set('lang.direction', $lang->get('direction'));
							config()->set('lang.russian_pluralization', $lang->get('russian_pluralization'));
						}

						// Apply Country's Language Code to the system
						if (isAvailableLang($lang->get('abbr'))) {
							config()->set('app.locale', $lang->get('abbr'));
						}
					}
				}
			}
		}

		return $next($request);
	}
}
