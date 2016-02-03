<?php

if (!function_exists('__')) {
    function __($name, $content = array())
    {
        return Lang::get($name);
    }
}