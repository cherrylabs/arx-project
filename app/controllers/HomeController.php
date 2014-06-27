<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

    // See {arx/core}/src/views/layouts/starter

    protected $layout = 'arx::layouts.starter';

    public $data = array();


	public function showWelcome()
	{
        // Example of Assign Nav structure
        $this->assign('nav', Lang::get('nav'));

        return $this->viewMake('home');
	}

}