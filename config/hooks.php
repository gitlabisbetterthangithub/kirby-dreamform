<?php

use Kirby\Cms\App;
use tobimori\DreamForm\Models\SubmissionPage;

return [

	/**
	 * This hook injects submission variables in the page rendering process
	 */
	'page.render:before' => function (string $contentType, array $data, Kirby\Cms\Page $page) {
		// your code goes here
		return [
			...$data,
			'submission' => SubmissionPage::fromSession()
		];
	}
];
