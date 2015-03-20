<?php

require_once(dirname(__FILE__).'/../../scripts/models/dao/hashesDAO.php');
require_once(dirname(__FILE__).'/../../scripts/models/hashModel.php');
require_once(dirname(__FILE__).'/UnitTestBase.php');

class hashesDAOTest extends unitTestBase {
    public function testInsertHash() {
        $hashesDAO = new hashesDAO();

        $hashModel = new hashModel(1, "Heyheyheyheyheyheybye");

        $hashesDAO->insert($hashModel);

    }



}