<?php

namespace App\Client;

use App\Model\Search;

interface ClientInterface {

    public static function request(Search $search);

}