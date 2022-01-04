<?php

include_once "./sites.php";

function checkProductAvailability(array $site): bool {

    $url = $site['url'];

    // récupère le html
    $html = file_get_contents($url);
    
    // supprime certaintes erreurs
    libxml_use_internal_errors(true);
    
    // Création du document DOM
    $doc = new DOMDocument();

    // Check si $html contient quelque chose
    if (!empty($html)) {

        // Charge le html dans le document DOM
        $doc->loadHTML($html);
        $xpath = new DOMXPath($doc);
        
        $entries = $xpath->query($site['xpath']);
        
        $textContent = "";
    
        if (count($entries) > 0) {
            foreach ($entries as $entry) {
                $textContent .= $entry->textContent;
            }
        }
    
        $result = trim($textContent);
    
        return strpos($site['stringToSearch'], $result) === false;
    }

    $errorMsg = 'fail to load url content (' . $url . ')';

    throw new ErrorException($errorMsg, 0, E_ERROR, "app_error.log");
    return false;
}

function writeErrorLog(ErrorException $error) {
    // 'An error has occurred: fail to load url content.'
    var_dump($error);

    $dateTime = new \DateTime('now');
    $date = $dateTime->format('Y-m-d H:i:s');
    $trace = $error->getTrace()[0];

    $message = $date . " - " . "file : " . $trace["file"] . " : " . $error->getMessage() . PHP_EOL;

    file_put_contents("../logs/" . $error->getFile(), $message, FILE_APPEND);
}


foreach ($sites as $site) {
    try {

        $isAvailable = checkProductAvailability($site);
        var_dump($isAvailable);

    } catch(ErrorException $error) {
        writeErrorLog($error);
    }
}
