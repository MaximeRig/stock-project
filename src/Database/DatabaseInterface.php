<?php

namespace App\Database;

interface DatabaseInterface {

    public function getConnection();
    public function getData();

}