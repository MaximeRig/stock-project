<?php

require '../vendor/autoload.php';
include_once "./Data/products.php";

use App\Model\Product;
use App\Client\Http;
use App\Handler\HtmlHandler;
use App\Error\ClientError;


foreach($products as $productToSearch) {

    try {

        $product = new Product($productToSearch);
        
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
