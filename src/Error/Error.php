<?php

namespace App\Error;

abstract class Error {

    protected string $logPath = "../logs/";
    
    public function getDateTime() {
        $dateTime = new \DateTime('now');
        $date = $dateTime->format('Y-m-d H:i:s');

        return $date;
    }

}