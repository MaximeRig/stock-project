<?php

namespace App\Handler;

use App\Model\Product;

class HtmlHandler {

    public static function run(Product $product, string $html): bool {
        
        if (!empty($html)) {

            // Désactive le rapport d'erreur libxml
            libxml_use_internal_errors(true);

            $xpath = self::getDOM($html);
            
            $domNodeList = $xpath->query($product->getXpath());
            
            $textContent = "";

            if ($domNodeList === false) {
                $errorMsg = 'fail to find element from xpath (product id : ' . $product->getId() . ')';
                throw new \ErrorException($errorMsg, 0, E_ERROR, "app_error.log");
            }
        
            if ($domNodeList->length > 0) {
                foreach ($domNodeList as $node) {
                    $textContent .= $node->textContent;
                }
            }
        
            $result = trim($textContent);
        
            return stristr($result, $product->getStringToSearch()) === false;

        }
    }

    private static function getDOM(string $html): \DOMXPath {

        $doc = new \DOMDocument();
        $doc->loadHTML($html);
        $xpath = new \DOMXPath($doc);

        return $xpath;
    }

}