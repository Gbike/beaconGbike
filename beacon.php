<?php


$API_URL = 'https://api.line.me/v2/bot/message';
//it-beacon
$ACCESS_TOKEN = 'oAH4P4RfV62EUe9KFpZ8KD3tUc14cRnNtXRlQB/mMZx7OdZz6X4Ax4pu3Rd1WUSRaw8r5f3w0DOIGrg4/bYJ+XzLwYqtY66wHbeVw2K044jpRzOvPJLfZ7JKKv2OwJuyx8beGTEKsnzqKJVU423aRQdB04t89/1O/w1cDnyilFU='; 
$channelSecret = 'b2ee090a95c56ab255fe911e8261df9c';
//it@cubook
//$ACCESS_TOKEN = 'MalHeKonc+s+4OxE1F17SBgCojCXD37LHJpTEmsmUwEm6lAqxZyRN28h5jISMwoKUtuZTNQVw8z6582k6avlNPpED8QLmdMDcTGKSdONAFL4e/PZ+1NGrb0j4M1Q59hnpKYaUT4elMd92DmjRyuyWAdB04t89/1O/w1cDnyilFU=';
//$channelSecret = '2669bb384ac7522ea63d19dd55f324de';


$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);

$request = file_get_contents('php://input');   // Get request content
$request_array = json_decode($request, true);   // Decode JSON to Array
var_export($request_array);

if ( sizeof($request_array['events']) > 0 )
{

 foreach ($request_array['events'] as $event)
 {
  $reply_message = '';
  $reply_token = $event['replyToken'];

  if( $result['parameters'] == 'website'){
    $text = $result['parameters']['website'];
    $reply_message = 'I will check website status right now ('.$text.') ';
    $ip = gethostbyname($text);
    if (!$socket = @fsockopen($ip, 80, $errno, $errstr, 30))
    {
      //echo "Offline!";
      $reply_message = 'Offline';
    }
    else 
    {
      //echo "Online!";
      $reply_message = 'Online';
      fclose($socket);
    }

  }

  if( strlen($reply_message) > 0 )
  {
   //$reply_message = iconv("tis-620","utf-8",$reply_message);
   $data = [
    'replyToken' => $reply_token,
    'messages' => [['type' => 'text', 'text' => $reply_message]]
   ];
   $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);

   $send_result = send_reply_message($API_URL, $POST_HEADER, $post_body);
   echo "Result: ".$send_result."
";
  }
 }
}

function send_reply_message($url, $post_header, $post_body)
{
 $ch = curl_init($url);
 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
 $result = curl_exec($ch);
 curl_close($ch);

 return $result;
}

?>

