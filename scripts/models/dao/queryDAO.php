<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 3/19/15
 * Time: 7:59 PM
 */

require_once(dirname(__FILE__).'/../db/dbConnectionFactory.php');

class queryDAO {

    public function insert($userID){
        $connection=DbConnectionFactory::create();
        $query = 'INSERT INTO queries (userID) VALUES (:userID)';
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':userID', $userID);
        $stmt->execute();
        $queryID = $connection->lastInsertId();
        $connection = null;
        return $queryID;

    }

    public function find($queryid){
        $connection=DbConnectionFactory::create();
        $query = 'SELECT * FROM queries WHERE queryID=:queryID';
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':queryID', $queryID);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'queryModel');
        $retquer = $stmt->fetch();
        $connection = null;
        return $retquer;
    }

    public function getAllQueries($userID){
        $connection=DbConnectionFactory::create();
        $query='SELECT * FROM queries WHERE userID=:userID';
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':userID', $userID);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'queryModel');
        $querylist=$stmt->fetchAll();
        $connection=null;
        return $querylist;
    }
}