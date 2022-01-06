<?php

require '../vendor/autoload.php';
include_once "research.php";

use App\Product;
use App\Client\Http;
use App\Handler\HtmlHandler;
use App\Error\ClientError;


foreach($products as $productToSearch) {

    try {

        $product = new Product($productToSearch);

        if (empty($product->getUrl())) {
            $errorMsg = 'url is empty (product id : ' . $product->getId() . ')';
            throw new \ErrorException($errorMsg, 0, E_ERROR, "app_error.log");
        }
        
        $html = Http::request($product->getUrl());
        $isAvailable = false;

        if (empty($html)) {
            $errorMsg = 'fail to load url content (product id : ' . $product->getId() . ')';
            throw new \ErrorException($errorMsg, 0, E_ERROR, "app_error.log");
        }
        
        $isAvailable = HtmlHandler::run($product, $html);

        if ($isAvailable) {
            // send an email to inform that the console is available
        }

        var_dump($isAvailable);

    } catch(ErrorException $error) {
        $clientError = new ClientError($error);
        $clientError->write();
    }
}
