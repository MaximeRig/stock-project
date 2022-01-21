<?php

require './vendor/autoload.php';
include_once "./src/Data/researches.php";

use App\Utils\DotEnv;

(new DotEnv(__DIR__ . '/.env.local'))->load();

$app = App\App::getInstance();
$app->run($researches);
