<?php
require_once(dirname(__FILE__).'/resultListItem.php');

//$searchID=$_GET['queryID'];
//$hashDAO=new hashesDAO();
//
//$hashes=; //TODO: Dahl'quiqui


$testHash1Result = [["scanner"=> "Harsh", "detected"=>"true", "version"=>"1.2.4", "result"=>"Malware"], ["scanner"=> "Johnny Bravo", "detected"=>"false", "version"=>"2.2.4", "result"=>"Hey Mama"]]; //TODO: delete these
$testHash2Result = [["scanner"=> "Alex", "detected"=>"true", "version"=>"1.3.4", "result"=>"Trojan"], ["scanner"=> "Harsh", "detected"=>"true", "version"=>"1.2.4", "result"=>"Malware"], ["scanner"=> "Johnny Bravo", "detected"=>"false", "version"=>"2.2.4", "result"=>"Hey Mama"]];
$testHash3Result = [["scanner"=> "Matt", "detected"=>"false", "version"=>"1.4.4", "result"=>"Spyware"], ["scanner"=> "Harsh", "detected"=>"true", "version"=>"1.2.4", "result"=>"Malware"], ["scanner"=> "Johnny Bravo", "detected"=>"false", "version"=>"2.2.4", "result"=>"Hey Mama"]];
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3 col-md-offset-2 col-md-8">


            <div class="panel-group" id="accordion" role="tablist">
                <?php echo resultListItem::newItem(true, 1, "Test Title", $testHash1Result, 10, 90); ?>
                <?php echo resultListItem::newItem(false, 2, "Test Title2", $testHash2Result, 50, 50); ?>
                <?php echo resultListItem::newItem(false, 3, "Test Title3", $testHash3Result, 70, 30); ?>
            </div>



        </div>
    </div>
</div>