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

namespace App\Http\Controllers;

use Illuminate\Support\Str;

class SelectLangController extends FrontController
{
	/**
	 * @param $langCode
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function redirect($langCode)
	{
		// Check if the selected Language Code is supported by the system
		if (!isAvailableLang($langCode)) {
			$message = t('language_not_supported', ['code' => $langCode]);
			flash($message)->error();
			
			return redirect()->back();
		}
		
		// Check if Language Code can be saved into the session
		// And remove the Language Code session, if its cannot be saved, ie:
		// - When, selected Language Code is equal to the website master Language Code
		// - Or when, the 'Website Country Language' detection option is activated
		//   and the selected Language Code is equal to the Country's Language Code
		$langCanBeSaved = true;
		if ($langCode == config('appLang.abbr')) {
			if (config('settings.app.auto_detect_language') == '2') {
				if ($langCode == config('lang.abbr')) {
					$langCanBeSaved = false;
				}
			} else {
				$langCanBeSaved = false;
			}
		}
		
		// Save the Language Code in Session
		if ($langCanBeSaved) {
			session()->put('langCode', $langCode);
		} else {
			// Remove the Language Code from Session
			if (session()->has('langCode')) {
				session()->forget('langCode');
			}
		}
		
		// After the Language Operation is done, ...
		
		// If the next path (URI) is filled (using the '?from=' parameter,
		// Then, redirect to this path
		if (request()->filled('from')) {
			$path = ltrim(request()->get('from'), '/');
			if (!empty($path) && !Str::contains($path, '#')) {
				return redirect(request()->root() . '/' . $path);
			}
		}
		
		// If the Country selection parameter is filled,
		// Redirect to the homepage with it (without the eventual 'from' parameter)
		// If not, redirect user to the previous page
		if (request()->filled('d')) {
			$queryArray = request()->except(['from']);
			
			$queryString = '';
			if (!empty($queryArray)) {
				$queryString = '?' . httpBuildQuery($queryArray);
			}
			
			return redirect(request()->root() . '/' . $queryString);
		} else {
			$previousUrl = url()->previous();
			
			if (config('plugins.domainmapping.installed')) {
				$previousUrl = request()->root();
				
				$origParsedUrl = mb_parse_url(url()->previous());
				$parsedUrl = mb_parse_url(request()->root());
				
				if (isset($origParsedUrl['host'], $parsedUrl['host'])) {
					if ($origParsedUrl['host'] == $parsedUrl['host']) {
						$previousPath = isset($origParsedUrl['path']) && !empty($origParsedUrl['path'])
							? $origParsedUrl['path']
							: '';
						$previousPath = ltrim($previousPath, '/');
						$previousUrl = $previousUrl . '/' . $previousPath;
					}
				}
			}
			
			return redirect($previousUrl);
		}
	}
}
