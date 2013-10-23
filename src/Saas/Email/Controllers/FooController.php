<?php

namespace Saas\Email\Controllers;

use Saas\Admin\PackageController as BaseController;

class FooController extends BaseController
{
	public static $type = self::REST;

	/**
	 * This action will accessible from :
	 * GET /email/something
	 * @see ./src/Dummy/EmailServiceProvider.php
	 */
	public function getSomething()
	{
		$this->viewData = array(
			'title' => 'Email Module',
			'hello' => 'email::email.hello',
		);

		$this->setupLayout();
	}
}