<?php
require_once(dirname(__FILE__).'/../../models/dao/queryDAO.php');
require_once(dirname(__FILE__).'/../../models/dao/hashesDAO.php');
require_once(dirname(__FILE__).'/../../models/queryModel.php');

/**
 * Inserts hashes into tables and redirects to the report page with the appropriate query parameter
 */
$hashes = $_POST['hashes'];
$hashes = explode("\r\n", $hashes);

$queryDAO = new queryDAO();
$hashDAO = new hashesDAO();

$notValid=true;
$validhashes=array();
foreach($hashes as $hashString){
    if (ctype_alnum($hashString) && (strlen($hashString)==40 || strlen($hashString)==32 || strlen($hashString)==64)) { //consists of numbers and letters
        $validhashes[]=$hashString;
    }
}
if (empty($validhashes)){
    header("Location: ../../../public/home.php");
    exit();
}
$userID = -1;
$queryID = $queryDAO->insert($userID);

foreach($validhashes as $hashString) {
    $hash = new hashModel($queryID, $hashString);
    $hashDAO->insert($hash);
}

header("Location: ../../../public/report.php?queryID=".$queryID);
exit();