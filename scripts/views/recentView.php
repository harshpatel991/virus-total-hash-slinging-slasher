<?php
require_once(dirname(__FILE__).'/resultListItem.php');
require_once(dirname(__FILE__).'/../VirusTotalApiV2.php');
require_once(dirname(__FILE__).'/../models/queryModel.php');
require_once(dirname(__FILE__).'/../models/dao/queryDAO.php');
require_once(dirname(__FILE__).'/../models/dao/hashesDAO.php');
require_once(dirname(__FILE__).'/../models/hashModel.php');

$hashesDAO = new hashesDAO();
$queryDAO = new queryDAO();
$queries = $queryDAO->find10RecentQueries();
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3 col-md-offset-2 col-md-8">

            <?php foreach($queries as $query) {
                ?>


                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Query #<?php echo $query["queryID"]?> Run on <?php echo date_format(new DateTime($query["querydate"]), 'Y-m-d H:i:s'); ?><a href="report.php?queryID=<?php echo $query["queryID"];?>"> <span class="label label-primary pull-right"> <span class="glyphicon glyphicon-refresh"></span> Rerun analysis</span></a></h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                       <?php
                       $hashes = $hashesDAO->findWithQueryID($query["queryID"]);
                       foreach($hashes as $hash) { ?>
                            <li class="list-group-item">
                                <?php echo $hash->hash ?>
                            </li>
                        <?php }?>
                        </ul>
                    </div>
                </div>

            <?php } ?>


        </div>
    </div>
</div>