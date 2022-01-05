<?php

namespace App\Error;

use App\Error\Error;

class ClientError extends Error {

    private \ErrorException $error;

    public function __construct(\ErrorException $error) {
        $this->error = $error;
    }


    private function getMessage(): string {
        return parent::getDateTime() . " - " . $this->error->getMessage() . PHP_EOL;
    }

    public function write(): void {

        $message = $this->getMessage();

        file_put_contents($this->logPath . $this->error->getFile(), $message, FILE_APPEND);
    }

}