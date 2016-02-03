<?php namespace Modules\Dashboard\Http\Controllers;

use Arx\classes\Dummy;
use Arxmin\ModuleController;
use Module;

class DashboardController extends ModuleController {
	
	public function anyIndex()
	{

		// Using Module::setUsed will define the current module used
		Module::setUsed('dashboard');

		/**
		 * Example of messages, notifications and tasks
		 */
		$messages = [
			[
				'link' => moduleUrl('#'),
				'thumb' => Dummy::image(),
				'title' => Dummy::title(),
				'description' => Dummy::text()
			]
		];

		$notifications = [
			[
				'icon' => null,
				'link' => '#',
				'thumb' => Dummy::image(),
				'title' => Dummy::title(),
				'description' => Dummy::text()
			],

			[
				'icon' => null,
				'link' => '#',
				'thumb' => Dummy::image(),
				'title' => Dummy::title(),
				'description' => Dummy::text()
			]
		];

		$tasks = [
			[
				'link' => '#',
				'thumb' => Dummy::image(),
				'title' => Dummy::title(),
				'progress' => rand(0, 100),
				'description' => Dummy::text()
			]
		];

		$title = "Dashboard example";

		$description = "This dashboard can be customised in /modules/Dashboard";

		return $this->viewMake('dashboard::index', get_defined_vars());
	}
	
}