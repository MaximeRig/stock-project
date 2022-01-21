<?php
namespace App\Client;

use App\Client\ClientInterface;
use App\Model\Search;

class Http implements ClientInterface {

    public static function request(Search $search){

        if (empty($search->getUrl())) {
            $errorMsg = 'url is empty (search id : ' . $search->getId() . ')';
            throw new \ErrorException($errorMsg, 0, E_ERROR, "app_error.log");
        }

        $html = file_get_contents($search->getUrl()); 

        if (empty($html)) {
            $errorMsg = 'fail to load url content (search id : ' . $search->getId() . ')';
            throw new \ErrorException($errorMsg, 0, E_ERROR, "app_error.log");
        }

        return $html;
    }

}