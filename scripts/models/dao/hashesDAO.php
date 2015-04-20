<?php

require_once(dirname(__FILE__).'/../hashModel.php');
require_once(dirname(__FILE__).'/../db/dbConnectionFactory.php');

class hashesDAO {

    /**
     * Inserts the specified hash in the data base
     * @param $hashModel hashModel of the object to insert
     * @return int The inserted item's hashID
     */
    public function insert($hashModel) {
        $connection = DbConnectionFactory::create();
        $query = 'INSERT INTO hashes (queryID, hash) VALUES (:queryID, :hash)';
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':queryID', $hashModel->queryID);
        $stmt->bindParam(':hash', $hashModel->hash);
        $stmt->execute();
        $hashID = $connection->lastInsertId();
        $connection = null;
        return $hashID;
    }

    /**
     * Finds a particular hash by its hashID
     * @param $id int The hashID
     * @return hashModel The hash object
     */
    public function findWithHashID($hashID) {
        $connection = DbConnectionFactory::create();
        $query = 'SELECT * FROM hashes WHERE hashID=:hashID';
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':hashID', $hashID);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'hashModel');
        $hash = $stmt->fetch();
        $connection = null;
        return $hash;
    }

    /**
     * Finds all hashes with the matching query ID
     * @param $queryID int
     * @return array of hashModels
     */
    public function findWithQueryID($queryID) {
        $connection = DbConnectionFactory::create();
        $query = 'SELECT * FROM hashes WHERE queryID=:queryID';
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':queryID', $queryID);
        $stmt->execute();
        $hashes = $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'hashModel');
        $connection=null;
        return $hashes;
    }

    public function getTop5Hashes(){
        $connection = DbConnectionFactory::create();
        $query = "SELECT *, COUNT(hash) as hash_count FROM hashes GROUP BY hash ORDER BY hash_count DESC LIMIT 5";
        $stmt = $connection->prepare($query);
        $stmt->execute();
        $hashes = $stmt->fetchAll();
        $connection = null;
        return $hashes;
    }

}
