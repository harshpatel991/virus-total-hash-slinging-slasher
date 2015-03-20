<?php

class hashModel {
    public $hashID;
    public $queryID;
    public $hash;

    public function __construct($queryID=0, $hash='', $hashID=0) {
        $this->queryID = $queryID;
        $this->hash = $hash;
        $this->hashID = $hashID;
    }
}