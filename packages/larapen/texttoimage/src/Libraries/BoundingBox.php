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

namespace Larapen\TextToImage\Libraries;

class BoundingBox
{
    public $width;
    public $height;
    public $padding;
    
    public function __construct($width, $height, $padding)
    {
        $this->width = $width;
        $this->height = $height;
        $this->padding = $padding;
    }
}
