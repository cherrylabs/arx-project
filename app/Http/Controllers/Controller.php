<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends \Arx\BaseController {

	use DispatchesCommands, ValidatesRequests;

}
