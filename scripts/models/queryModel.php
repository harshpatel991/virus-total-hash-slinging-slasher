<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 3/19/15
 * Time: 8:00 PM
 */

class query {

    public $userID;
    public $queryID;
    public $queryDate;

    public function  __construct($userID, $queryID, $queryDate=""){
        $this->userID=$userID;
        $this->queryID=$queryID;
        $this->queryDate=$queryDate;
    }

}