<?php

namespace App;

class Product {

    private string $id;
    private string $url;
    private string $xpath;
    private string $stringToSearch;

    public function __construct(array $product) {

        $this->id = $product["id"];
        $this->url = $product["url"];
        $this->xpath = $product["xpath"];
        $this->stringToSearch = $product["stringToSearch"];
    }

    public function getId(): string {
        return $this->id;
    }

    public function getUrl(): string {
        return $this->url;
    }

    public function getXpath(): string {
        return $this->xpath;
    }
    public function getStringToSearch(): string {
        return $this->stringToSearch;
    }
}