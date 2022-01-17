<?php

require '../vendor/autoload.php';
include_once "./Data/researches.php";

use App\Model\Product;
use App\Client\Http;
use App\Handler\HtmlHandler;
use App\Error\ClientError;


foreach($researches as $research) {

    try {

        $product = new Product($research);
        
        $html = Http::request($product);
        $isAvailable = false;
        
        $isAvailable = HtmlHandler::run($product, $html);

        if ($isAvailable) {
            // send an email to inform that the console is available
        }

        var_dump($isAvailable);

    } catch(\Exception $error) {
        $clientError = new ClientError($error);
        $clientError->write();
    }
}
