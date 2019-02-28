<?php

/**
 * watson Articles API
 */

spl_autoload_register(function($class_name)
{
    if(file_exists(__DIR__ . '\..\app\classes\\' . strtolower($class_name) . '.class.php'))
    {
        include __DIR__ . '\..\app\classes\\' . strtolower($class_name) . '.class.php';
    }
});

$request = new Request();

?>