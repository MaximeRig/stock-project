<?php

namespace App\Client;

interface ClientInterface {

    public static function request(string $path);

}