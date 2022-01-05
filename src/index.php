<?php

require '../vendor/autoload.php';
include_once "research.php";

use App\Page;
use App\Client\Http;
use App\Handler\HtmlHandler;
use App\Error\ClientError;


foreach($research as $search) {
    
    try {
        
        $page = new Page($search['url'], $search['xpath'], $search['stringToSearch']);
        $html = Http::request($page->getUrl());
        $isAvalaible = false;

        if (empty($html)) {
            $errorMsg = 'fail to load url content (' . $page->getUrl() . ')';
            throw new \ErrorException($errorMsg, 0, E_ERROR, "app_error.log");
        }
        
        $isAvalaible = HtmlHandler::run($page, $html);

        if ($isAvalaible) {
            // send an email to inform that the console is available
        }

        var_dump($isAvalaible);

    } catch(ErrorException $error) {
        $clientError = new ClientError($error);
        $clientError->write();
    }

}

