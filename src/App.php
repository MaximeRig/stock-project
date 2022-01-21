<?php

namespace App;

class App {

    private static $instance;

    public static function getInstance() :App {

        if (is_null(self::$instance)) {
            self::$instance = new App();
        }

        return self::$instance;
    }

    public function run() {
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
    }
}