<?php
/**
 * LaraClassified - Classified Ads Web Application
 * Copyright (c) Skai - Software Solution All Rights Reserved
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

namespace Larapen\Impersonate\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;
use Lab404\Impersonate\Services\ImpersonateManager;
use Prologue\Alerts\Facades\Alert;

class ProtectFromImpersonation
{
    /**
     * Handle an incoming request.
     *
     * @param   \Illuminate\Http\Request  $request
     * @param   \Closure  $next
     * @return  mixed
     */
    public function handle($request, Closure $next)
    {
        $impersonate_manager = app()->make(ImpersonateManager::class);

        if ($impersonate_manager->isImpersonating()) {
        	$message = t('Can not be accessed by an impersonator');
        	
			if ($request->segment(1) == admin_uri()) {
				Alert::error($message)->flash();
			} else {
				flash($message)->error();
			}
			
            return Redirect::back();
        }

        return $next($request);
    }
}
