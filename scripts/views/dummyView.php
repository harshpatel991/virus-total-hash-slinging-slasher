<?php
/**
 * Created by PhpStorm.
 * User: Me
 * Date: 3/18/15
 * Time: 1:06 PM
 */

require_once(dirname(__FILE__).'/../VirusTotalApiV2.php');

$virusTotalAPI = new VirusTotalAPIV2('a503e42713758ee85a14e3afe2632db3dc92ddcf5d83e79aa985704c088a312c');
var_dump( $virusTotalAPI->getFileReport('a854cb1793501645398b872a56ce0da9bc6575be9d033080cc51c6ec9c93efd6'));

