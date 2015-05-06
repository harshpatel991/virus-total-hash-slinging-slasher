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

            $resources = array();

            foreach ($hashModelList as $hashM) {
                array_push($resources, $hashM->hash);
            }
            $allHashes = implode(',', $resources);
            $response = $virusapi->getFileReport($allHashes);


            if (is_array($response)) { //multiple queries were submitted
                for ($i = 0; $i < count($response); $i++) { //go through response, add valid items to responseList
                    $responseItem = $response[$i];

                    if (is_null($responseItem) && !$alreadyPrinted) {
                        echo '<div class="alert alert-danger" role="alert">One of your hashes was rejected. There is a limit to Virus Totals API. If you are rapidly attempting queries, please try again in one minute. Otherwise, please verify your hashes.</div>';
                        $alreadyPrinted = true;
                    }
                    if ((!is_null($responseItem)) && $responseItem->response_code == 1) {
                        $prepared = array();
                        $prepared["hash"] = $hashModelList[$i]->hash;
                        $prepared["percentGood"] = (floatval($responseItem->total - $responseItem->positives) / ($responseItem->total)) * 100.0;
                        $prepared["percentBad"] = (floatval($responseItem->positives) / $responseItem->total) * 100.0;
                        $prepared["scans"] = $responseItem->scans;
                        $responseList[] = $prepared;
                    }
                }
            } else if($response->response_code==1) { //single element and it is still valid, add item to responseList
                $responseItem = $response;
                $prepared = array();
                $prepared["hash"] = $hashModelList[0]->hash;
                $prepared["percentGood"] = (floatval($responseItem->total - $responseItem->positives) / ($responseItem->total)) * 100.0;
                $prepared["percentBad"] = (floatval($responseItem->positives) / $responseItem->total) * 100.0;
                $prepared["scans"] = $responseItem->scans;
                $responseList[] = $prepared;

            } else { //it's all bad
                header("Location: ../public/home.php?error=1");
                exit();
            }

            ?>


            <div class="panel-group" id="accordion" role="tablist">

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