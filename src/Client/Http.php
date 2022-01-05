<?php
namespace App\Client;

use App\Client\ClientInterface;

class Http implements ClientInterface {

    public static function request(string $url){
        return file_get_contents($url);
    }

}