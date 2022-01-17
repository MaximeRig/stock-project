<?php

namespace App\Utils;

class DotEnv {

    private string $path;

    public function __construct(string $path) {

        if (!is_readable($path)) {
            throw new \InvalidArgumentException('File does not exist in path ' . $path);
        }

        $this->path = $path;
    }

    public function load() {
        $entries = file($this->path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach($entries as $entry) {

            list($key, $value) = explode('=', $entry);
            
            if (!array_key_exists($key, $_ENV)) {
                $_ENV[$key] = $value;
            }

        }
    }
}