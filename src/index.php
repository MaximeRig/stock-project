<?php

require '../vendor/autoload.php';
include_once "research.php";

use App\Page;
use App\Client\Http;


foreach($research as $search) {
    
    try {
        
        $page = new Page($search['url'], $search['xpath'], $search['stringToSearch']);
        $isAvalaible = Http::request($page);

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
