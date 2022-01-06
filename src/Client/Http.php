<?php
namespace App\Client;

use App\Client\ClientInterface;
use App\Model\Product;

class Http implements ClientInterface {

    public static function request(Product $product){

        if (empty($product->getUrl())) {
            $errorMsg = 'url is empty (product id : ' . $product->getId() . ')';
            throw new \ErrorException($errorMsg, 0, E_ERROR, "app_error.log");
        }

        $html = file_get_contents($product->getUrl()); 

        if (empty($html)) {
            $errorMsg = 'fail to load url content (product id : ' . $product->getId() . ')';
            throw new \ErrorException($errorMsg, 0, E_ERROR, "app_error.log");
        }

        return $html;
    }

}