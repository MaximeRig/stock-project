<?php

namespace App;

use App\Page;

interface ClientInterface {

    public static function request(Page $page);

}