<?php

require_once(dirname(__FILE__) . '/../../scripts/models/dao/hashesDAO.php');
require_once(dirname(__FILE__) . '/../../scripts/models/hashModel.php');

class hashDAOTest extends PHPUnit_Framework_TestCase{


    public function testInsertHash() {
        $hashesDAO = new hashesDAO();
        $hashModel = new hashModel(1, "Heyheyheyheyheyheybye");

        var_dump($hashModel);
        $insertedID = $hashesDAO->insert($hashModel);

        $retrievedModel = $hashesDAO->find($insertedID);

        $this->assertEquals($retrievedModel->hashID, $insertedID);
    }




}