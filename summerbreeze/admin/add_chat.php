<?php
session_start();
/*ini_set('display_errors', 1);  
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); */
 $username = $_SESSION['username'];
 $user_id = $_REQUEST['user_id'];
include("config.php");


         $time= date('Y-m-d h:i:sa');

    $ongoing_query = "Insert into `dental2_chat` set `message`=:message,user_id=:user_id,dt=:dt,from_user=0";


    $statement = $pdo->prepare($ongoing_query);

    $statement->execute(array(
     
       "message"=>$_REQUEST["ch"],
       
"user_id"=>$user_id,
       
           
        "dt"=>$time
        ));

     $ongoing_query1 = "SELECT * from dental2_chat where (user_id=:user_id and from_user=0) or (from_user=:from_user and user_id=0) order by id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
         "user_id"=>$user_id,
         "from_user"=>$user_id
           
            ));
        $results = $statement1->fetchAll();
        foreach($results as $result)
        {
        	if($result->from_user==0)
        	{
        	?>
        	 <li class="clearfix">
                                        <div class="message-data text-right">
                                            <span class="message-data-time"><?php echo $result->dt;?>
                                            </span>
                                            &nbsp; &nbsp;
                                            <span class="message-data-name">Admin</span>
                                        </div>
                                        <div class="message other-message float-right"> <?php echo $result->message;?> </div>
                                    </li>
                                    <?php
        }
        else
        {
        	 $ongoing_query1 = "SELECT * from dental2_user where id=:user_id";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute(array(
         
         
            "user_id"=>$user_id
            ));
        $result1 = $statement1->fetchAll();
        	?>
        	<li>
                                        <div class="message-data">
                                            <span class="message-data-name"><?php echo ucfirst($result1->fullname);?> </span>
                                            <span class="message-data-time"><?php echo $result->dt;?></span>
                                        </div>
                                        <div class="message my-message">
                                            <p><?php echo $result->message;?></p>
                                            <div class="row">
                                            </div>
                                        </div>
                                    </li>
                                    <?php
        }
    }

    define('API_ACCESS_KEY', 'AAAAvndyczY:APA91bE_FvpUq9Fq4R_ra7xTPrSW2LtryGWtn3vEd3vTE84PeyIOCqVnSlOrrhoxjBEsur7TjldACiJ3TE20Ae5qt9P3gokSVDegKEgk6EFl0YRHA7nnk27txytav45UDj9VSGbX1I6_');
  $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
 $status="chat";
$message = $_REQUEST["ch"];
  $notification = [
    'title' => 'Chat Notification',
    'body' => $message,
    'click_action'=>'OPEN_ACTIVITY',
            'tag'=>$status,
    'color' => "#203E78",
    'sound' => 'default'
  ];
  $extraNotificationData = ["message" => $notification];

  $headers = [
    'Authorization: key=' . API_ACCESS_KEY,
    'Content-Type: application/json'
  ];






$query_device = "select * from `dental2_user_device` where user_id=:user_id";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array("user_id"=>$_REQUEST['user_id']));
    $result_devices = $statement_device->fetchAll();

  $num_rows = $statement_device->rowCount();

  if ($num_rows > 0) {
    foreach($result_devices as $result_device) {

      $token = $result_device->device_id;

      $fcmNotification = [
        
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


      
    }
  }

  


?>   