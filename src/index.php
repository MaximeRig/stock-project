<?php

require '../vendor/autoload.php';
include_once "research.php";

use App\Page;
use App\Client\Http;
use App\Handler\HtmlHandler;
use App\Error\ClientError;


foreach($research as $siteName => $products) {

    foreach($products as $product => $search) {

        try {

            if (empty($search['url'])) {
                $errorMsg = 'url is empty (' . $page->getSiteName() . ' / ' . $product . ')';
                throw new \ErrorException($errorMsg, 0, E_ERROR, "app_error.log");
            }
            
            $page = new Page($siteName, $search['url'], $search['xpath'], $search['stringToSearch']);
            $html = Http::request($page->getUrl());
            $isAvailable = false;
    
            if (empty($html)) {
                $errorMsg = 'fail to load url content (' . $page->getSiteName() . ')';
                throw new \ErrorException($errorMsg, 0, E_ERROR, "app_error.log");
            }
            
            $isAvailable = HtmlHandler::run($page, $html);
    
            if ($isAvailable) {
                // send an email to inform that the console is available
            }
    
            var_dump($isAvailable);
    
        } catch(ErrorException $error) {
            $clientError = new ClientError($error);
            $clientError->write();
        }
    }
}
