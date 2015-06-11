<?php namespace App\Http\Controllers;

use App;
use Auth;
use Config;
use Hook;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Input;
use Lang;
use Session;

abstract class Controller extends \Arx\BaseController {

	use DispatchesCommands, ValidatesRequests;

    /**
     * Example of Construct method
     */
    public function __construct()
    {
        global $user, $isAuth;

        $this->setupLayout();

        if (!$isAuth) {
            $isAuth = Auth::check();
        }

        \View::share('isAuth', $isAuth);

        # Here you can assign your own menu logic
        $menu = Lang::get('menu.navbar');

        $this->assign('menu', $menu);
        \View::share('menu', $menu);

        /**
         * Assign some variables shared with JS
         */
        Hook::put('__app', [
            'debug' => Config::get('app.debug') || Input::get('debug'),
            'lang' => App::getLocale(),
            'user' => $user ?: false,
        ], true);

        /**
         * Add notifications
         */
        if (Session::has('notifications')) {
            $notifications = Session::get('notifications');
            Hook::put('__app.notifications', $notifications, true);
        }
    }

}
