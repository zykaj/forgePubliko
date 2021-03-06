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

namespace App\Models\Post;

use App\Models\Category;
use App\Models\Post;

trait SimilarByCategory
{
	/**
	 * Get similar Posts (Posts in the same Category)
	 *
	 * @param int $limit
	 * @return \Illuminate\Support\Collection
	 */
	public function getSimilarByCategory($limit = 20)
	{
		$posts = Post::query();

		$select = [
			'posts.id',
			'posts.country_code',
			'category_id',
			'title',
			'posts.price',
			'featured',
			'posts.archived_at',
		];

		if (is_array($select) && count($select) > 0) {
			foreach ($select as $column) {
				$posts->addSelect($column);
			}
		}

		// Get the sub-categories of the current ad parent's category
		$similarCatIds = [];
		if (!empty($this->category)) {
			if ($this->category->tid == $this->category->parent_id) {
				$similarCatIds[] = $this->category->tid;
			} else {
				if (!empty($this->category->parent_id)) {
					$similarCatIds   = Category::trans()->where('parent_id', $this->category->parent_id)->get()
						->keyBy('tid')
						->keys()
						->toArray();
					$similarCatIds[] = (int)$this->category->parent_id;
				} else {
					$similarCatIds[] = (int)$this->category->tid;
				}
			}
		}

		// Default Filters
		$posts->currentCountry()->verified()->unarchived();
		if (config('settings.single.posts_review_activation')) {
			$posts->reviewed();
		}

		// Get ads from same category
		if (!empty($similarCatIds)) {
			if (count($similarCatIds) == 1) {
				if (isset($similarCatIds[0]) && !empty(isset($similarCatIds[0]))) {
					$posts->where('category_id', (int)$similarCatIds[0]);
				}
			} else {
				$posts->whereIn('category_id', $similarCatIds);
			}
		}

		// Relations
		$posts->with('category')->has('category');
		$posts->with('pictures');
		$posts->with('city')->has('city');

		if (isset($this->id)) {
			$posts->where('posts.id', '!=', $this->id);
		}

		// Set ORDER BY
		$posts->orderBy('created_at', 'DESC');

		$posts = $posts->take((int)$limit)->get();

		// Randomize the Posts
		$posts = collect($posts)->shuffle();

		return $posts;
	}
}
