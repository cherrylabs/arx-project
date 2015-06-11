<?php namespace App\Http\Controllers;

class PageController extends Controller {

    protected $layout = "layouts.page";

    public function __construct(){
        parent::__construct();
    }

    public function anyIndex(){

        return $this->viewMake('home', get_defined_vars());
    }
    
}
