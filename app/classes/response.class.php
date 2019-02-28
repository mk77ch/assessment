<?php

class Response
{
    public function __construct($data, $type)
    {
        if($type == 'json')
        {
            $this->json($data);
        }
    }

    public function json($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}

?>