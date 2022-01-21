<?php

require './vendor/autoload.php';
include_once "./src/Data/researches.php";

// use App\Model\Product;
// use App\Client\Http;
// use App\Handler\HtmlHandler;
// use App\Error\ClientError;
use App\Utils\DotEnv;

(new DotEnv(__DIR__ . '/.env.local'))->load();

// lancer une instance de App (faire un singleton)
// créer une méthode dans App pour lancer le foreach du dessous

$app = App\App::getInstance();
var_dump($app->run());

/*
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
*/
