<?php
class query {
    public $queryID;
    public $queryDate;

    public function  __construct($queryID, $queryDate=""){
        $this->queryID=$queryID;
        $this->queryDate=$queryDate;
    }

}