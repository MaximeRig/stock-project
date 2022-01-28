<?php

namespace App\Database;

use App\Database\DatabaseInterface;

class FileType implements DatabaseInterface{

    private $fileName;
    private $data;

    public function __construct(string $fileName) {
        $this->fileName = $fileName;
    }

    public function getConnection() {
        $this->data = require constant("ROOT_PATH") . '/src/Data/' . $this->fileName;
    }
    
    public function getData() {
        return $this->data;
    }
}