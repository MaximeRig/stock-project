<?php
namespace App;

use App\Page;
use App\ClientInterface;

class Client implements ClientInterface {

    public static function request(Page $page) {
        $html = self::getHtml($page->getUrl());
        
        if (!empty($html)) {

            // Désactive le rapport d'erreur libxml
            libxml_use_internal_errors(true);

            $xpath = self::getDOM($html);
            
            $entries = $xpath->query($page->getXpath());
            
            $textContent = "";
        
            if (count($entries) > 0) {
                foreach ($entries as $entry) {
                    $textContent .= $entry->textContent;
                }
            }
        
            $result = trim($textContent);
        
            return strpos($page->getStringToSearch(), $result) === false;

        }

        $errorMsg = 'fail to load url content (' . $page->getUrl() . ')';

        throw new \ErrorException($errorMsg, 0, E_ERROR, "app_error.log");
    }

    private static function getDOM(string $html) {

        $doc = new \DOMDocument();
        $doc->loadHTML($html);
        $xpath = new \DOMXPath($doc);

        return $xpath;
    }

    private static function getHtml(string $url): ?string {
        return file_get_contents($url);
    }

}