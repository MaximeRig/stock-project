<?php

namespace App\Client;

use App\Model\Product;

interface ClientInterface {

    public static function request(Product $product);

}