<?php

require '../vendor/autoload.php';
include_once "research.php";

use App\Page;
use App\Client\Http;
use App\Handler\HtmlHandler;


foreach($research as $search) {
    
    try {
        
        $page = new Page($search['url'], $search['xpath'], $search['stringToSearch']);
        $html = Http::request($page->getUrl());
        $isAvalaible = false;

        // lancer le traitement du html
        if (!empty($html)) {
            
            // lancer le traitement du html
            $isAvalaible = HtmlHandler::run($page, $html);

        }

        if ($isAvalaible) {
            // send an email to inform that the console is available
        }

        var_dump($isAvalaible);

    } catch(ErrorException $error) {
        writeErrorLog($error);
    }

}

function writeErrorLog(ErrorException $error) {

    $dateTime = new \DateTime('now');
    $date = $dateTime->format('Y-m-d H:i:s');
    $trace = $error->getTrace()[0];

    $message = $date . " - " . "file : " . $trace["file"] . " : " . $error->getMessage() . PHP_EOL;

    file_put_contents("../logs/" . $error->getFile(), $message, FILE_APPEND);
}
