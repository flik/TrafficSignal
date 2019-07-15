<?php
//require_once require_once(realpath('vendor/autoload.php'));
spl_autoload_register(
    function($class)
    {
        require_once str_replace("\\", DIRECTORY_SEPARATOR, $class) . ".php";
    }
);