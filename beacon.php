<?php


$API_URL = 'https://api.line.me/v2/bot/message';
//it-beacon
$ACCESS_TOKEN = 'oAH4P4RfV62EUe9KFpZ8KD3tUc14cRnNtXRlQB/mMZx7OdZz6X4Ax4pu3Rd1WUSRaw8r5f3w0DOIGrg4/bYJ+XzLwYqtY66wHbeVw2K044jpRzOvPJLfZ7JKKv2OwJuyx8beGTEKsnzqKJVU423aRQdB04t89/1O/w1cDnyilFU='; 
$channelSecret = 'b2ee090a95c56ab255fe911e8261df9c';
//it@cubook
//$ACCESS_TOKEN = 'MalHeKonc+s+4OxE1F17SBgCojCXD37LHJpTEmsmUwEm6lAqxZyRN28h5jISMwoKUtuZTNQVw8z6582k6avlNPpED8QLmdMDcTGKSdONAFL4e/PZ+1NGrb0j4M1Q59hnpKYaUT4elMd92DmjRyuyWAdB04t89/1O/w1cDnyilFU=';
//$channelSecret = '2669bb384ac7522ea63d19dd55f324de';

$jsonFlex = [
    "type" => "flex",
    "altText" => "เวลาเข้า-ออกงาน",
    "contents" => [
      "type" => "bubble",
//      "size" => "giga",
      "direction" => "ltr",
      "header" => [
        "type" => "box",
        "layout" => "vertical",
        "contents" => [
          [
            "type" => "text",
            "text" => "บันทึกเวลา",
            "size" => "lg",
            "align" => "start",
            "weight" => "bold",
            "color" => "#009813",
          ],
          [
            "type" => "separator",
            "margin" => "lg",
            "color" => "#C3C3C3"
          ],
          [
            "type" => "text",
            "text" => "$new_date",
            "align" => "center",                   
            "size" => "3xl",
            "weight" => "bold",
            "color" => "#000000"
          ],
          [
            "type" => "text",
            "text" => "$new_time",
            "align" => "center",              
            "size" => "4xl",
            "weight" => "bold",
            "color" => "#0000ff"
          ],
//          [
//            "type" => "text",
//            "text" => "สาขาแว่นแก้ว",
//            "size" => "lg",
//            "weight" => "bold",
//            "color" => "#000000"
//          ],
          [
            "type" => "separator",
            "margin" => "lg",
            "color" => "#C3C3C3"
          ]
        ]
      ],
      "footer" => [
        "type" => "box",
        "layout" => "horizontal",
        "contents" => [
          [
            "type" => "text",
            "text" => "รายละเอียด",
            "size" => "lg",
            "align" => "start",
            "color" => "#0084B6",
            "action" => [
              "type" => "uri",
              "label" => "รายละเอียด",
              "uri" => "https://www.google.co.th/"
            ]
          ]
        ]
      ]
    ]
  ];

if ( sizeof($request_array['events']) > 0 ) {
    foreach ($request_array['events'] as $event) {
        error_log(json_encode($event));
        $reply_message = '';
        $reply_token = $event['replyToken'];

        $data = [
            'replyToken' => $reply_token,
            'messages' => [$jsonFlex]
        ];

        print_r($data);
      
        $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);

        $send_result = send_reply_message($API_URL.'/reply', $POST_HEADER, $post_body);

        echo "Result: ".$send_result."\r\n";
        
    }
}

echo "OK";

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
