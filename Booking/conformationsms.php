<?php
$mobile = $_GET['mobile'];
$msg = "Thanks for booking at transport with IIT Tirupati.
Please wait to hear from us shortly";

$mobile = (int)$mobile;


$senderId = "";
$route = ;
$sms = array(
    'message' => $msg,
    'to' => array($mobile)
);
//Prepare you post parameters
$postData = array(
    'sender' => $senderId,
    'route' => $route,
    'sms' => array($sms)
);
$postDataJson = json_encode($postData);

// Api from message provider url
$url="";

$curl = curl_init();

//
//
//
// Authorization key and validation
//
//
//

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}
?>
