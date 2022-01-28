<?php

namespace App;

use App\Client\Http;
use App\Model\Search;
use App\Database\Connector;
use App\Handler\HtmlHandler;

class App {

    private static $instance;

    public static function getInstance() :App {

        if (is_null(self::$instance)) {
            self::$instance = new App();
        }

        return self::$instance;
    }

    public function run() {

        $connector = Connector::createConnection($_ENV['DATA_SOURCE']);
        $connector->getConnection();
        $researches = $connector->getData();

        foreach($researches as $research) {
            try {

                $search = new Search($research);
                
                $html = Http::request($search);
                $isAvailable = false;
                
                $isAvailable = HtmlHandler::run($search, $html);

                if ($isAvailable) {
                    // send an email to inform that the console is available
                }

                var_dump($isAvailable);

            } catch(\Exception $error) {
                $clientError = new ClientError($error);
                $clientError->write();
            }
        }
    }
}