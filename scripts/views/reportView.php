<?php
require_once(dirname(__FILE__).'/resultListItem.php');
require_once(dirname(__FILE__).'/../VirusTotalApiV2.php');
require_once(dirname(__FILE__).'/../models/hashModel.php');
require_once(dirname(__FILE__).'/../models/dao/hashesDAO.php');

error_reporting(E_ALL); //turn on error reporting
ini_set("display_errors", 1);
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3 col-md-offset-2 col-md-8">
<?php
$queryID=$_GET['queryID'];
$virusapi=new VirusTotalAPIV2('a503e42713758ee85a14e3afe2632db3dc92ddcf5d83e79aa985704c088a312c');
$hashDAO=new hashesDAO();
$hashModelList=$hashDAO->findWithQueryID($queryID);
$responseList=array(); //holds percentages
$alreadyPrinted=false;
foreach ($hashModelList as $hashM){
    $response = $virusapi->getFileReport($hashM->hash);
    if (is_null($response) && !$alreadyPrinted){
        echo '<div class="alert alert-danger" role="alert">We\'re sorry. At least one of your hashes was rejected due to Virus Total limitations. Please try again in one minute.</div>';
        $alreadyPrinted=true;
    }
    if ((!is_null($response)) && $response->response_code==1){
        $prepared=array();
        $prepared["hash"]=$hashM->hash;
        $prepared["percentGood"]=(floatval($response->total-$response->positives)/($response->total))*100.0;
        $prepared["percentBad"]=(floatval($response->positives)/$response->total)*100.0;
        $prepared["scans"]=$response->scans;
        $responseList[]=$prepared;
    }
}
?>




            <div class="panel-group" id="accordion" role="tablist">
<!--                --><?php //echo resultListItem::newItem(true, 1, "Test Title", $testHash1Result, 10, 90); ?>
<!--                --><?php //echo resultListItem::newItem(false, 2, "Test Title2", $testHash2Result, 50, 50); ?>
<!--                --><?php //echo resultListItem::newItem(false, 3, "Test Title3", $testHash3Result, 70, 30); ?>
                <?php
                    for ($i=0; $i<count($responseList); $i++){
                        $current=$responseList[$i];
                        $first=false;
                        if ($i==0){
                            $first=true;
                        }
                        echo resultListItem::newItem($first, $i, $current["hash"], $current["scans"], $current["percentGood"], $current["percentBad"]);
                    }
                ?>
            </div>



        </div>
    </div>
</div>