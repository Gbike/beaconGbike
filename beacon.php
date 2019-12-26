<?php


$API_URL = 'https://api.line.me/v2/bot/message';
//it-beacon
$ACCESS_TOKEN = '4rdPrwctgzH4f52jYbtvykZkki+MN2xZK+finbLthiCRMR1fyBLt+dlKU8ExfQxxcV7ZC9VX+lG/VG5XnZHp7xuoVQs4tyoCNUA0TxZek8M1DqArJBPPalW51qk2NWCu0L1En5v+FdTDw3csua882gdB04t89/1O/w1cDnyilFU='; 
$channelSecret = '39a9b2c7954e9685bc7007335ea632ba';
//it@cubook
//$ACCESS_TOKEN = 'MalHeKonc+s+4OxE1F17SBgCojCXD37LHJpTEmsmUwEm6lAqxZyRN28h5jISMwoKUtuZTNQVw8z6582k6avlNPpED8QLmdMDcTGKSdONAFL4e/PZ+1NGrb0j4M1Q59hnpKYaUT4elMd92DmjRyuyWAdB04t89/1O/w1cDnyilFU=';
//$channelSecret = '2669bb384ac7522ea63d19dd55f324de';


$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);

$request = file_get_contents('php://input');   // Get request content
$request_array = json_decode($request, true);   // Decode JSON to Array
var_export($request_array);

$new_date = date('Y-m-d', strtotime($_POST['dateFrom']));
echo $new_date;

?>
