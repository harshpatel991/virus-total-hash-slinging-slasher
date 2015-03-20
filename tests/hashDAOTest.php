<?php

require_once(dirname(__FILE__) . '/../scripts/models/dao/hashesDAO.php');
require_once(dirname(__FILE__) . '/../scripts/models/hashModel.php');

require_once(dirname(__FILE__).'/unitTestBase.php');

class hashDAOTest extends unitTestBase{

    public function testInsertAndFindHashByHashID() {
        $hashesDAO = new hashesDAO();
        $hashModel = new hashModel(1, "Heyheyheyheyheyheybye");

        $insertedID = $hashesDAO->insert($hashModel);
        $retrievedModel = $hashesDAO->findWithHashID($insertedID);

        $this->assertEquals($retrievedModel->hashID, $insertedID);
        $this->assertEquals($retrievedModel->queryID, 1);
        $this->assertEquals($retrievedModel->hash, "Heyheyheyheyheyheybye");
    }

    public function testInsertAndFindHashByQueryID() {
        $hashesDAO = new hashesDAO();
        $hashModel1 = new hashModel(1, "Heyhey");
        $hashModel2 = new hashModel(1, "Yo");

        $hashesDAO->insert($hashModel1);
        $hashesDAO->insert($hashModel2);

        $retrievedModels = $hashesDAO->findWithQueryID(1);

        $this->assertEquals(count($retrievedModels), 2);
        $this->assertEquals($retrievedModels[0]->queryID, 1);
        $this->assertEquals($retrievedModels[1]->queryID, 1);
    }
}