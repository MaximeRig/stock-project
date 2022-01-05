<?php

namespace App\Client;

use App\Page;

interface ClientInterface {

    public static function request(Page $page);

}