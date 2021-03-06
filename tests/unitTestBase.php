<?php

require_once dirname(__FILE__).'/../scripts/models/db/dbConnectionFactory.php';

class unitTestBase  extends PHPUnit_Framework_TestCase{

    public function setUp() {
        $dbConn = DbConnectionFactory::create();
        $sql = file_get_contents(dirname(__FILE__).'/../sql/destroyTables.sql');
        $sql .= file_get_contents(dirname(__FILE__).'/../sql/createDatabase.sql');
        $dbConn->exec($sql);
        $dbConn = null;
        parent::setUp();
    }

}