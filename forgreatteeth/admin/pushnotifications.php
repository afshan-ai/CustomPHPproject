<?php
ob_start();
/*
 * Author: Shahrukh Khan and Santanu Mondal
 */
require("libs/config.php");
if (!isUserLoggedIn()) redirect(SITE_ADMIN_URL . "logout.php");



include("includes/header.php");


if (isset($_POST['actiontype'])) {
  /*echo '<pre>';
  print_r($_POST);
  echo '</pre>';*/
  define('API_ACCESS_KEY', 'AIzaSyBT80psvn5UIC50nC9MWyQfZpFq6LikY1g');
  $fcmUrl = 'https://fcm.googleapis.com/fcm/send';

  $notification = [
    'title' => 'New Notification',
    'body' => $_POST['message'],
    'color' => "#203E78",
    'sound' => 'default'
  ];
  $extraNotificationData = ["message" => $notification];

  $headers = [
    'Authorization: key=' . API_ACCESS_KEY,
    'Content-Type: application/json'
  ];








  $select_all_device = "SELECT * FROM all_device_id";

  $result_all_device = mysql_query($select_all_device);

  $num_rows = mysql_num_rows($result_all_device);

  if ($num_rows > 0) {
    while ($row_all_device = mysql_fetch_object($result_all_device)) {

      $token = $row_all_device->device_token;

      $fcmNotification = [
        //'registration_ids' => $tokenList, //multple token array
        'to' => $token, //single token
        'notification' => $notification,
        'data' => $extraNotificationData
      ];


      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $fcmUrl);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
      $result = curl_exec($ch);
      curl_close($ch);


      //echo $result;
    }
  }



/*$alldata = "SELECT * FROM all_device_id";

if(!empty($alldata)){
                      foreach ($alldata as $alldataVlue) {
                          $app_id =0;
                          $singleID = $alldataVlue->device_token; 
                          $passphrase = 'push';
                          $ctx = stream_context_create();
                                         stream_context_set_option($ctx, 'ssl', 'local_cert', 'ck.pem');
                                         
                                          stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
                                          $fp = stream_socket_client(
  'ssl://gateway.push.apple.com:2195', $err,
  $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

if (!$fp)
  exit("Failed to connect: $err $errstr" . PHP_EOL);

 $badge=$app_id+1;
 
 //$Sql="UPDATE `device_id` SET `app_id`='".$badge."' WHERE `id`='".$fetch['id']."'";
  
    // $Sql_ex=mysql_query($Sql);
                      
// Create the payload body
$text=$_POST['message'];
$body['aps'] = array(
  'alert' => $text,
     'badge' => $badge,
  'sound' => 'default',
  //'page' => $_POST['redirect']
  );


$payload = json_encode($body);

$msg = chr(0) . pack('n', 32) . pack('H*', $singleID) . pack('n', strlen($payload)) . $payload;

// Send it to the server
 $result2 = fwrite($fp, $msg, strlen($msg));
if(!$result2)
  echo "message not sent";
else
   echo "notification sent successfully";

fclose($fp);



                      }
                   

  
                   
}*/




//device token
//$deviceToken = "a58c9e7406c4b591eda8f192027d00ef82cdba361821f693e7b8ac9cb3afbc61";

//Message will send to ios device
//$message = 'this is custom message';

//certificate file
/*$apnsCert = 'summerbridge_ck.pem';
//certificate password
$passphrase = 1234;

$ctx = stream_context_create();
stream_context_set_option($ctx, 'ssl', 'local_cert', $apnsCert);
stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
$fp = stream_socket_client('ssl://gateway.sandbox.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);


// Create the payload body
$body['aps'] = array(
    'badge' => +1,
    'alert' => $_POST['message'],
    'sound' => 'default'
);

$payload = json_encode($body);



$select_all_device2 = "SELECT * FROM all_device_id";

  $result_all_device2 = mysql_query($select_all_device2);

  $num_rows2 = mysql_num_rows($result_all_device2);

  if ($num_rows2 > 0) {
    while ($row_all_device2 = mysql_fetch_object($result_all_device2)) {

      $token2 = $row_all_device2->device_token;

      // Build the binary notification
$msg = chr(0) . pack('n', 32) . pack('H*', $token2) . pack('n', strlen($payload)) . $payload;

// Send it to the server
$result = fwrite($fp, $msg, strlen($msg));

if (!$result)
    echo 'Message not delivered' . PHP_EOL;
else
    echo 'Message successfully delivered amar' . $_POST['message'] . PHP_EOL;

// Close the connection to the server
fclose($fp);


      //echo $result;
    }
  }*/




$alldata = "SELECT * FROM all_device_id";

$result_alldata = mysql_query($alldata);

$num_rows2 = mysql_num_rows($result_alldata);

if ($num_rows2 > 0) {

while ($row_all_device2 = mysql_fetch_object($result_alldata))

{

$deviceToken = $row_all_device2->device_token;

//$deviceToken = $result_alldata_value->device_token;

//device token
//$deviceToken = "14F3CB52C8EE19786A261C22BC178126C0864CF2AAA10B91ED6BCDB26D2FEB45";

//Message will send to ios device
$message = $_POST['message'];

//certificate file
$apnsCert = 'ck.pem';
//certificate password
$passphrase = 'push';

$ctx = stream_context_create();
stream_context_set_option($ctx, 'ssl', 'local_cert', $apnsCert);
stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
$fp = stream_socket_client('ssl://gateway.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);


// Create the payload body
$body['aps'] = array(
    'badge' => +1,
    'alert' => $message,
    'sound' => 'default'
);

$payload = json_encode($body);
// Build the binary notification
$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

// Send it to the server
$result = fwrite($fp, $msg, strlen($msg));



if (!$result)
    echo 'Message not delivered' . PHP_EOL;
else
    echo 'Message successfully delivered amar' . $message . PHP_EOL;

// Close the connection to the server
fclose($fp);
}

}





}
?>   

<?php echo $msg; ?>
  <div class="height50"></div>
<div class="add-schedule">
<form method="post" action="" name="messages">
<input type="hidden" name="from" value="admin"  />

<input type="hidden" name="actiontype" value="send_pushnotification"  />
<div class="shedule-form">
  <p><label><span>*</span>Message :</label>
  
<input type="text" id="to" name="message" value="" />
                                                                                                                                                        
  </p>
  
            
<p><input type="submit" name="send_push" class="save-bt" value="Send"></p>


<div class="height0"></div>
 </div>
 </form>
</div>


<?php /*?>
<?php
include("includes/footer.php");
?><?php */ ?>








