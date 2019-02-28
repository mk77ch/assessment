<?php

class ApiController
{
    public static function get_method()
    {
        $record = new Record();
        $filter = (isset($_GET['filter'])) ? $_GET['filter'] : null;
        $where  = array();

        if(is_array($filter))
        {
            $articles = $record->find_where('articles', $filter);
        }
        else
        {
            $articles = $record->find_all('articles');
        }

        if(is_array($articles))
        {
            $response = new Response($articles, 'json');
        }
    }
}

?>