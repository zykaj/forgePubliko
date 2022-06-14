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

namespace App\Http\Controllers\Search;

use App\Helpers\Search\PostQueries;
use Meta;

class SearchController extends BaseController
{
	public $isIndexSearch = true;

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		view()->share('isIndexSearch', $this->isIndexSearch);

		// Search
		$data = (new PostQueries($this->preSearch))->fetch();

		// Get Titles
		$title = $this->getTitle();
		$this->getBreadcrumb();
		$this->getHtmlTitle();

		// Meta Tags
		Meta::set('title', $title);
		Meta::set('description', $title);

		return appView('search.results', $data);
	}
}
