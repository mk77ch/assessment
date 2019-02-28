<?php

class Request
{
    public $module = null;
    public $method = null;

    public function __construct()
    {
        $uriParts = explode('/', $_SERVER['REQUEST_URI']);
        $uriParts = array_values(array_filter($uriParts));

        if(count($uriParts) == 0)
        {
            $this->module = 'home';
            $this->method = 'index';
        }
        if(count($uriParts) == 1)
        {
            $this->module = $uriParts[0];
            $this->method = 'index';
        }
        if(count($uriParts) >= 2)
        {
            $this->module = $uriParts[0];
            $this->method = $uriParts[1];
        }

        if(file_exists(__DIR__ . '\..\controllers\\' . strtolower($this->module) . '.controller.php'))
        {
            include __DIR__ . '\..\controllers\\' . strtolower($this->module) . '.controller.php';

            if(method_exists(ucfirst($this->module).'Controller', strtolower($this->method).'_method'))
            {
                call_user_func(ucfirst($this->module).'Controller::'.strtolower($this->method).'_method');
            }
        }
    }
}

?>