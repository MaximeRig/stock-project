<?php

namespace App;

class Page {

    private string $siteName;
    private string $url;
    private string $xpath;
    private string $stringToSearch;

    public function __construct(string $siteName, string $url, string $xpath, string $stringToSearch) {
        $this->siteName = $siteName;
        $this->url = $url;
        $this->xpath = $xpath;
        $this->stringToSearch = $stringToSearch;
    }

    public function getSiteName(): string {
        return $this->siteName;
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