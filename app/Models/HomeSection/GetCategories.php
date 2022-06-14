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

namespace App\Models\HomeSection;

class GetCategories
{
	public static function getValues($value)
	{
		if (empty($value)) {
			
			$value['type_of_display'] = 'c_picture_icon';
			$value['show_icon'] = '0';
			$value['max_sub_cats'] = '3';
			
		} else {
			
			if (!isset($value['type_of_display'])) {
				$value['type_of_display'] = 'c_picture_icon';
			}
			if (!isset($value['show_icon'])) {
				$value['show_icon'] = '0';
			}
			if (!isset($value['max_sub_cats'])) {
				$value['max_sub_cats'] = '3';
			}
			
		}
		
		return $value;
	}
	
	public static function setValues($value, $setting)
	{
		return $value;
	}
	
	public static function getFields($diskName)
	{
		$fields = [
			[
				'name'              => 'type_of_display',
				'label'             => 'Type of display',
				'type'              => 'select2_from_array',
				'options'           => [
					'c_normal_list'    => 'Normal List',
					'c_circle_list'    => 'Circle List',
					'c_check_list'     => 'Check List',
					'c_border_list'    => 'Border List',
					'c_picture_icon'   => 'Picture as Icon',
					'cc_normal_list'   => 'Normal List CC',
					'cc_normal_list_s' => 'Normal List Styled CC',
				],
				'allows_null'       => false,
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			[
				'name'              => 'max_items',
				'label'             => 'max_categories_label',
				'type'              => 'number',
				'hint'              => 'max_categories_hint',
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			[
				'name'              => 'show_icon',
				'label'             => 'Show the categories icons',
				'type'              => 'checkbox',
				'hint'              => 'show_category_icon_hint',
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			[
				'name'              => 'count_categories_posts',
				'label'             => 'count_categories_posts_label',
				'type'              => 'checkbox',
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			[
				'name'  => 'separator_clear_1',
				'type'  => 'custom_html',
				'value' => '<div style="clear: both;"></div>',
			],
			[
				'name'              => 'max_sub_cats',
				'label'             => 'Max subcategories displayed by default',
				'type'              => 'number',
				'hint'              => 'max_sub_cats_hint',
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			[
				'name'              => 'cache_expiration',
				'label'             => 'Cache Expiration Time for this section',
				'type'              => 'number',
				'attributes'        => [
					'placeholder' => '0',
				],
				'hint'              => 'home_cache_expiration_hint',
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			[
				'name'  => 'separator_last',
				'type'  => 'custom_html',
				'value' => '<hr>',
			],
			[
				'name'  => 'hide_on_mobile',
				'label' => 'hide_on_mobile_label',
				'type'  => 'checkbox',
				'hint'  => 'hide_on_mobile_hint',
			],
			[
				'name'  => 'active',
				'label' => 'Active',
				'type'  => 'checkbox',
			],
		];
		
		return $fields;
	}
}
