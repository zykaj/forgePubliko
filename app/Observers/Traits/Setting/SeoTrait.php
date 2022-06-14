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

use Illuminate\Support\Facades\File;

trait SeoTrait
{
	/**
	 * Updating
	 *
	 * @param $setting
	 * @param $original
	 */
	public function seoUpdating($setting, $original)
	{
		// Remove the "public/robots.txt" file (It will be re-generated automatically)
		if ($this->checkIfRobotsTxtFileCanBeRemoved($setting, $original)) {
			$this->removeRobotsTxtFile($setting, $original);
		}
	}
	
	/**
	 * @param $setting
	 * @param $original
	 * @return bool
	 */
	private function checkIfRobotsTxtFileCanBeRemoved($setting, $original)
	{
		$canBeRemoved = false;
		
		if (
			array_key_exists('robots_txt', $setting->value)
			|| array_key_exists('robots_txt_sm_indexes', $setting->value)
		) {
			if (
				empty($original['value'])
				|| (
					is_array($original['value'])
					&& !isset($original['value']['robots_txt'])
				)
				|| (
					is_array($original['value'])
					&& isset($original['value']['robots_txt'])
					&& md5($setting->value['robots_txt']) != md5($original['value']['robots_txt'])
				)
				|| (
					is_array($original['value'])
					&& !isset($original['value']['robots_txt_sm_indexes'])
				)
				|| (
					is_array($original['value'])
					&& isset($original['value']['robots_txt_sm_indexes'])
					&& $setting->value['robots_txt_sm_indexes'] != $original['value']['robots_txt_sm_indexes']
				)
			) {
				$canBeRemoved = true;
			}
		}
		
		return $canBeRemoved;
	}
	/**
	 * Remove the robots.txt file (It will be re-generated automatically)
	 *
	 * @param $setting
	 * @param $original
	 */
	private function removeRobotsTxtFile($setting, $original)
	{
		$robotsFile = public_path('robots.txt');
		if (File::exists($robotsFile)) {
			File::delete($robotsFile);
		}
	}
}
