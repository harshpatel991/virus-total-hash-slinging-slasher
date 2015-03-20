<?php
/**
 * Created by PhpStorm.
 * User: Me
 * Date: 3/18/15
 * Time: 1:06 PM
 */

require_once(dirname(__FILE__).'/../VirusTotalApiV2.php');

$virusTotalAPI = new VirusTotalAPIV2('a');
print_r( $virusTotalAPI->getFileReport('a854cb1793501645398b872a56ce0da9bc6575be9d033080cc51c6ec9c93efd6'));

