<?php

require_once(dirname(__FILE__).'/../userModel.php');
require_once(dirname(__FILE__).'/../db/dbConnectionFactory.php');

class userDAO {

    /**
     * Inserts the specified user in the data base
     * @param $queryID
     * @param $hash
     * @return string
     */

    public function insert($user) {
        $connection = DbConnectionFactory::create();
        $query = 'INSERT INTO users (email, password) VALUES (:email, :password)';
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':email', $user->email);
        $stmt->bindParam(':password', $user->password);
        $stmt->execute();
        $userID = $connection->lastInsertId();
        $connection = null;
        return $userID;
    }

    /**
     * Finds a user by id
     * @param $userID The user id
     * @return userModel The found user
     */
    public function find($userID) {
        $connection = DbConnectionFactory::create();
        $query = 'SELECT * FROM users WHERE userID=:userID';
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':userID', $userID);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'userModel');
        $user = $stmt->fetch();
        $connection = null;
        return $user;
    }
}
