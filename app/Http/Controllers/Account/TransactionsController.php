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

namespace App\Http\Controllers\Account;


use Meta;

class TransactionsController extends AccountBaseController
{
	private $perPage = 10;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->perPage = (is_numeric(config('settings.listing.items_per_page'))) ? config('settings.listing.items_per_page') : $this->perPage;
	}
	
	/**
	 * List Transactions
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		$data                 = [];
		$data['transactions'] = $this->transactions->paginate($this->perPage);
		
		view()->share('pagePath', 'transactions');
		
		// Meta Tags
		Meta::set('title', t('My Transactions'));
		Meta::set('description', t('My Transactions on', ['appName' => config('settings.app.app_name')]));
		
		return appView('account.transactions', $data);
	}
}
