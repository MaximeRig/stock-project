<?php

namespace App\Handler;

use App\Page;

class HtmlHandler {

    public static function run(Page $page, string $html) {
        
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
    }

    private static function getDOM(string $html) {

        $doc = new \DOMDocument();
        $doc->loadHTML($html);
        $xpath = new \DOMXPath($doc);

        return $xpath;
    }

}