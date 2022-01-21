<?php

namespace App\Model;

class Search {

    private string $id;
    private string $url;
    private string $xpath;
    private string $stringToSearch;

    public function __construct(array $search) {

        $this->id = $search["id"];
        $this->url = $search["url"];
        $this->xpath = $search["xpath"];
        $this->stringToSearch = $search["stringToSearch"];
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