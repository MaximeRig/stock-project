<?php

namespace App\Error;

use App\Error\Error;

class ClientError extends Error {

    private \Exception $error;

    public function __construct(\Exception $error) {
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