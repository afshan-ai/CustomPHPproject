<?php
/*
* Author: Shahrukh Khan
*/
include("config.php");
include("includes/header.php");
/*ini_set('display_errors', 1);  
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); */
if(isset($_REQUEST['sub']))
{
  //echo '<pre>';print_r($_REQUEST);echo '</pre>';
		$ongoing_query ="Update `dentalsb_appointment` set `scheduled_time`=:appointment_time,appointment_date=:appointment_date,new_user=:new_user,status=:status where id=:id";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "appointment_time"=>$_REQUEST["appointment_time"],
            "appointment_date"=>$_REQUEST["appointment_date"],
           "status"=>$_REQUEST["status"],
           "new_user"=>$_REQUEST["new_user"],
            "id"=>$_REQUEST["id"]
           
            ));


define('API_ACCESS_KEY', 'AAAAvndyczY:APA91bE_FvpUq9Fq4R_ra7xTPrSW2LtryGWtn3vEd3vTE84PeyIOCqVnSlOrrhoxjBEsur7TjldACiJ3TE20Ae5qt9P3gokSVDegKEgk6EFl0YRHA7nnk27txytav45UDj9VSGbX1I6_');
  $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
  if($_REQUEST["status"]=='approved')
$message = "Admin has successfully approved your appointment.";
if($_REQUEST["status"]=='cancelled')
$message = "Admin has cancelled your appointment.";
if($_REQUEST["status"]=='completed')
$message = "The scheduled appointment is completed.";
  $notification = [
    'title' => 'Appointment Notification',
    'body' => $message,
    'click_action'=>'OPEN_ACTIVITY',
            'tag'=>$_REQUEST["status"],
    'color' => "#203E78",
    'sound' => 'default'
  ];
  $extraNotificationData = ["message" => $notification];

  $headers = [
    'Authorization: key=' . API_ACCESS_KEY,
    'Content-Type: application/json'
  ];






$query_device = "select * from `dentalsb_user_device` where user_id=:user_id";

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

  $ongoing_query ="Insert into `dentalsb_notification` set `user_id`=:user_id,notification_date=:notification_date,notification_type=:notification_type,message=:message,notification_attr=:status";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "message"=>$message,
            "notification_date"=>date('Y-m-d h:i:sa'),
           "status"=>$_REQUEST["status"],
           "user_id"=>$_REQUEST["user_id"],
"notification_type"=>"Appointment"
           
           
            ));

}
 $query_device = "select * from `dentalsb_appointment` where id=:id";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array("id"=>$_REQUEST['id']));
    $result_devices = $statement_device->fetch();
?>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <div class="height10"></div>
<div class="add-schedule">
<form method="post" action="" name="manufacturers" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>"  />
<input type="hidden" name="user_id" value="<?php echo $result_devices->user_id; ?>"  />
<div class="shedule-form">
<p><label><span>*</span>Appointment Date :</label>
	<input type="text" name="appointment_date" class="appointment_date" value="<?php echo $result_devices->appointment_date;?>" readonly/>
  <p><label><span>*</span>Appointment Time :</label>
  	<select name="appointment_time">
  	<option value="9.00 am" <?php if($result_devices->scheduled_time=="9.00 am") echo 'selected="selected"';?>>9.00 am</option>
    <option value="9.15 am" <?php if($result_devices->scheduled_time=="9.15 am") echo 'selected="selected"';?>>9.15 am</option>
    <option value="9.30 am" <?php if($result_devices->scheduled_time=="9.30 am") echo 'selected="selected"';?>>9.30 am</option>
    <option value="9.45 am" <?php if($result_devices->scheduled_time=="9.45 am") echo 'selected="selected"';?>>9.45 am</option>
    
    <option value="10.00 am" <?php if($result_devices->scheduled_time=="10.00 am") echo 'selected="selected"';?>>10.00 am</option>
     <option value="10.15 am" <?php if($result_devices->scheduled_time=="10.15 am") echo 'selected="selected"';?>>10.15 am</option>
      <option value="10.30 am" <?php if($result_devices->scheduled_time=="10.30 am") echo 'selected="selected"';?>>10.30 am</option>
       <option value="10.45 am" <?php if($result_devices->scheduled_time=="10.45 am") echo 'selected="selected"';?>>10.45 am</option>

    <option value="11.00 am"  <?php if($result_devices->scheduled_time=="11.00 am") echo 'selected="selected"';?>>11.00 am</option>
    <option value="11.15 am"  <?php if($result_devices->scheduled_time=="11.15 am") echo 'selected="selected"';?>>11.15 am</option>
    <option value="11.30 am"  <?php if($result_devices->scheduled_time=="11.30 am") echo 'selected="selected"';?>>11.30 am</option>
    <option value="11.45 am"  <?php if($result_devices->scheduled_time=="11.45 am") echo 'selected="selected"';?>>11.45 am</option>

    <option value="12.00 pm"  <?php if($result_devices->scheduled_time=="12.00 pm") echo 'selected="selected"';?>>12.00 pm</option>
    <option value="12.15 pm"  <?php if($result_devices->scheduled_time=="12.15 pm") echo 'selected="selected"';?>>12.15 pm</option>
    <option value="12.30 pm"  <?php if($result_devices->scheduled_time=="12.30 pm") echo 'selected="selected"';?>>12.30 pm</option>
    <option value="12.45 pm"  <?php if($result_devices->scheduled_time=="12.45 pm") echo 'selected="selected"';?>>12.45 pm</option>

    <option value="1.00 pm"  <?php if($result_devices->scheduled_time=="1.00 pm") echo 'selected="selected"';?>>1.00 pm</option>
    <option value="1.15 pm"  <?php if($result_devices->scheduled_time=="1.15 pm") echo 'selected="selected"';?>>1.15 pm</option>
    <option value="1.30 pm"  <?php if($result_devices->scheduled_time=="1.30 pm") echo 'selected="selected"';?>>1.30 pm</option>
    <option value="1.45 pm"  <?php if($result_devices->scheduled_time=="1.45 pm") echo 'selected="selected"';?>>1.45 pm</option>

    <option value="2.00 pm"  <?php if($result_devices->scheduled_time=="2.00 pm") echo 'selected="selected"';?>>2.00 pm</option>
    <option value="2.15 pm"  <?php if($result_devices->scheduled_time=="2.15 pm") echo 'selected="selected"';?>>2.15 pm</option>
    <option value="2.30 pm"  <?php if($result_devices->scheduled_time=="2.30 pm") echo 'selected="selected"';?>>2.30 pm</option>
    <option value="2.45 pm"  <?php if($result_devices->scheduled_time=="2.45 pm") echo 'selected="selected"';?>>2.45 pm</option>

    <option value="3.00 pm"  <?php if($result_devices->scheduled_time=="3.00 pm") echo 'selected="selected"';?>>3.00 pm</option>
    <option value="3.15 pm"  <?php if($result_devices->scheduled_time=="3.15 pm") echo 'selected="selected"';?>>3.15 pm</option>
    <option value="3.30 pm"  <?php if($result_devices->scheduled_time=="3.30 pm") echo 'selected="selected"';?>>3.30 pm</option>
    <option value="3.45 pm"  <?php if($result_devices->scheduled_time=="3.45 pm") echo 'selected="selected"';?>>3.45 pm</option>

    <option value="4.00 pm"  <?php if($result_devices->scheduled_time=="4.00 pm") echo 'selected="selected"';?>>4.00 pm</option>
    <option value="4.15 pm"  <?php if($result_devices->scheduled_time=="4.15 pm") echo 'selected="selected"';?>>4.15 pm</option>
    <option value="4.30 pm"  <?php if($result_devices->scheduled_time=="4.30 pm") echo 'selected="selected"';?>>4.30 pm</option>
    <option value="4.45 pm"  <?php if($result_devices->scheduled_time=="4.45 pm") echo 'selected="selected"';?>>4.45 pm</option>

    <option value="5.00 pm"  <?php if($result_devices->scheduled_time=="5.00 pm") echo 'selected="selected"';?>>5.00 pm</option>
    <option value="5.15 pm"  <?php if($result_devices->scheduled_time=="5.15 pm") echo 'selected="selected"';?>>5.15 pm</option>
    <option value="5.30 pm"  <?php if($result_devices->scheduled_time=="5.30 pm") echo 'selected="selected"';?>>5.30 pm</option>
    <option value="5.45 pm"  <?php if($result_devices->scheduled_time=="5.45 pm") echo 'selected="selected"';?>>5.45 pm</option>

    <option value="6.00 pm"  <?php if($result_devices->scheduled_time=="6.00 pm") echo 'selected="selected"';?>>6.00 pm</option>
    <option value="6.15 pm"  <?php if($result_devices->scheduled_time=="6.15 pm") echo 'selected="selected"';?>>6.15 pm</option>
    <option value="6.30 pm"  <?php if($result_devices->scheduled_time=="6.30 pm") echo 'selected="selected"';?>>6.30 pm</option>
    <option value="6.45 pm"  <?php if($result_devices->scheduled_time=="6.45 pm") echo 'selected="selected"';?>>6.45 pm</option>


    <option value="7.00 pm"  <?php if($result_devices->scheduled_time=="7.00 pm") echo 'selected="selected"';?>>7.00 pm</option>
    <option value="7.15 pm"  <?php if($result_devices->scheduled_time=="7.15 pm") echo 'selected="selected"';?>>7.15 pm</option>
    <option value="7.30 pm"  <?php if($result_devices->scheduled_time=="7.30 pm") echo 'selected="selected"';?>>7.30 pm</option>
    <option value="7.45 pm"  <?php if($result_devices->scheduled_time=="7.45 pm") echo 'selected="selected"';?>>7.45 pm</option>


    <option value="8.00 pm"  <?php if($result_devices->scheduled_time=="8.00 pm") echo 'selected="selected"';?>>8.00 pm</option>
    <option value="8.15 pm"  <?php if($result_devices->scheduled_time=="8.15 pm") echo 'selected="selected"';?>>8.15 pm</option>
    <option value="8.30 pm"  <?php if($result_devices->scheduled_time=="8.30 pm") echo 'selected="selected"';?>>8.30 pm</option>
    <option value="8.45 pm"  <?php if($result_devices->scheduled_time=="8.45 pm") echo 'selected="selected"';?>>8.45 pm</option>


    <option value="9.00 pm"  <?php if($result_devices->scheduled_time=="9.00 pm") echo 'selected="selected"';?>>9.00 pm</option>
<select>
	  </p>  
    <p><label><span>*</span>Status :</label>
    <select name="status">
    <option value="In Progress" <?php if($result_devices->status=="In Progress") echo 'selected="selected"';?>>In Progress</option>
    <option value="approved" <?php if($result_devices->status=="approved") echo 'selected="selected"';?>>Approved</option>
    <option value="completed" <?php if($result_devices->status=="completed") echo 'selected="selected"';?>>Completed</option>
    <option value="cancelled" <?php if($result_devices->status=="cancelled") echo 'selected="selected"';?>>Cancelled</option>
<select>
    </p>  

 <p><label><span></span>New User :</label>
  <input type="checkbox" name="new_user" value="1" <?php if($result_devices->new_user==1) echo 'checked="checked"';?>/></p>

            
<p><input type="submit" name="sub" class="save-bt" value="Save"></p>


<div class="height0"></div>
 </div>
 </form>
</div>
<?php
include("includes/footer.php");
?>
  <script>
  $( function() {
    $( ".appointment_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>