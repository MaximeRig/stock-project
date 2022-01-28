<?php

namespace App\Database;

use App\Database\FileType;
use App\Database\DatabaseInterface;

class Connector {

    const FILETYPE = 'file';

    private function __construct() {}

    static function createConnection(string $type): DatabaseInterface {

        if ($type === self::FILETYPE) {
            return new FileType($_ENV['DATA_FILENAME']);
        }

    }

}