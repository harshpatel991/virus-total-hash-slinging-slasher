<?php

class userModel {
    private $userId;
    private $email;
    private $password;

    public function __constructor($email='', $password='', $userId=0) {
        $this->email = $email;
        $this->password = $password;
        $this->userId = $userId;

    }
}