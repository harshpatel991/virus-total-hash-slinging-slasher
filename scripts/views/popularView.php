<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 4/18/15
 * Time: 8:11 PM
 */
require_once(dirname(__FILE__).'/../models/dao/hashesDAO.php');
require_once(dirname(__FILE__).'/../models/hashModel.php');

$hashDAO = new hashesDAO();
$hashes = $hashDAO->getTop5Hashes();
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3 col-md-offset-2 col-md-8">

            <?php foreach($hashes as $hash) {
                ?>


                <div class="panel panel-default">
                    <div class="panel-heading">
                        <form action="../scripts/controllers/formControllers/hashFormController.php" method="post">
                            <input type="hidden" name="hashes" id="hashes" value="<?php echo $hash["hash"]?>">
                            <h3 class="panel-title"><?php echo $hash["hash"]?></h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                                <li class="list-group-item">
                                    <?php echo "Searched ".$hash["hash_count"]. " times";?>
                                </li>
                        </ul>
                        <button type="submit" class="label label-primary pull-right"> <span class="glyphicon glyphicon-refresh"></span>Run analysis</button>
                        </form>
                    </div>
                </div>

            <?php } ?>


        </div>
    </div>
</div>