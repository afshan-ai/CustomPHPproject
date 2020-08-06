<?php
require("../libs/config.php");


if(isset($_GET['cat']) && $_GET['cat']!=""){



$_SESSION['cat']=$_GET['cat'];

}

if(isset($_GET['doc']) && $_GET['doc']!=""){

$_SESSION['doc']=$_GET['doc'];

}

if(isset($_GET['loc']) && $_GET['loc']!=""){

$_SESSION['loc']=$_GET['loc'];

}
if(isset($_GET['annc']) && $_GET['annc']!=""){

$annc=$_GET['annc'];	
?> 	
  <tr class="raw">
  <td align="left" valign="top">Sender </td>
      <td align="left" valign="top">To </td>
    <td align="left" valign="top">Messages </td>
    <td align="left" valign="top">Action </td>
</tr>	
<?php

if($annc=="All"){
	
	
	$SQL = "SELECT * FROM `messages` WHERE `type`<>'broadcast' ORDER BY id DESC";
	}elseif($annc=="Received"){

$SQL = "SELECT * FROM `messages` WHERE `type`='broadcast' AND `from`<>'admin' ORDER BY id DESC";
}elseif($annc=="Sent"){

$SQL = "SELECT * FROM `messages` WHERE `from`='admin' AND `type`='broadcast_rep'  ORDER BY id DESC";
}
 $Query = mysql_query($SQL) or die(mysql_error());
while($rs = mysql_fetch_assoc($Query)){ 

if(is_numeric($rs["from"]))
{
$sql="SELECT user_id,u_name FROM users WHERE user_id=".$rs["from"]."";
$result=mysql_query($sql);
$rs2=mysql_fetch_array ($result);
?>
<tr>
     <td align="left" valign="top"><?php echo stripslashes($rs2["u_name"]); ?></td>
       <td align="left" valign="top"><?php echo stripslashes($rs["to"]); ?></td>
<?php }else {
	$sql="SELECT `user_id`,`u_name` FROM users WHERE `user_id`='".$rs["to"]."'";
$result=mysql_query($sql);
$rs2=mysql_fetch_array ($result);
?>
<tr>
      <td align="left" valign="top"><?php echo stripslashes($rs["from"]); ?></td>
       <td align="left" valign="top"><?php echo stripslashes($rs2["u_name"]); ?></td>
    <?php } ?>
	  <td align="left" valign="top"><?php echo stripslashes($rs["message"]); ?></td>
     <td align="left" valign="top"><?php if(is_numeric($rs["from"]))
{ ?><span class="reply"><a href="add_edit_mails.php?edit=<?php echo ($rs2["user_id"]); ?>&msgid=<?php echo ($rs["id"]); ?>">Reply</a> </span><?php } ?> 
    <span class="delete"> <a href="announcements.php?del_m=<?php echo $rs["id"] ?>">Delete</a></span>
    <?php /*?><a href="models.php?del=<?php echo ($rs["models_id"]); ?>" onclick="return confirm('Are you sure?');">Delete</a> </td><?php */?>
</tr>
<?php 
}
	
	}

elseif(isset($_GET['msg']) && $_GET['msg']!=""){
	

	
$msg=$_GET['msg'];	
?> 	
  <tr class="raw">
    <td align="left" valign="top">Sender</td>
    <td align="left" valign="top">To</td>
    <td align="left" valign="top">Messages</td>
    <td align="left" valign="top">Action</td>
  </tr>	
<?php

if($msg=="All"){
	
	
	$SQL = "SELECT * FROM `messages` WHERE `type`<>'broadcast' ORDER BY id DESC";
	}elseif($msg=="Received"){

$SQL = "SELECT * FROM `messages` WHERE `from`<>'admin' AND `type`<>'broadcast' ORDER BY id DESC";
}elseif($msg=="Sent"){

$SQL = "SELECT * FROM `messages` WHERE `from`='admin' AND `type`='Sent' ORDER BY id DESC";
}
 $Query = mysql_query($SQL) or die(mysql_error());
while($rs = mysql_fetch_assoc($Query)){ 

if(is_numeric($rs["from"]))
{
$sql="SELECT user_id,u_name FROM users WHERE user_id=".$rs["from"]."";
$result=mysql_query($sql);
$rs2=mysql_fetch_array ($result);
?>
<tr>
  <td align="left" valign="top"><?php echo stripslashes($rs2["u_name"]); ?></td>
     <td align="left" valign="top"><?php echo stripslashes($rs["to"]); ?></td>
<?php }else {
	$sql="SELECT `user_id`,`u_name` FROM users WHERE `user_id`='".$rs["to"]."'";
$result=mysql_query($sql);
$rs2=mysql_fetch_array ($result);
?>
<tr>
  <td align="left" valign="top"><?php echo stripslashes($rs["from"]); ?></td>
     <td align="left" valign="top"><?php echo stripslashes($rs2["u_name"]); ?></td>
    <?php } ?>
	<td align="left" valign="top"><?php echo stripslashes($rs["message"]); ?></td>
    <td align="left" valign="top"><?php if(is_numeric($rs["from"]))
{ ?><span class="reply"><a  href="add_edit_messages.php?edit=<?php echo ($rs2["user_id"]); ?>&msgid=<?php echo ($rs["id"]); ?>">Reply</a> </span><?php } ?> 

  <span class="delete">    <a href="messages.php?del=<?php echo $rs["id"] ?>">Delete</a> </span>
</tr>
<?php 
}}

else if(isset($_GET['decide']) && $_GET['decide']!="")


{ 

$agent=$_GET['agent'];
//echo $agent; 
//exit;
//$id=$_REQUEST['id'];

//print_r($_GET['slot']);die();

$slot_id=$_GET['slot'];

//exit;




?> 
<?php 
//$slot_id=$_GET['id'];

$sql="select * from booking_info where `slot_id`='$slot_id' and `status`<>'Request Pending'";
//echo $sql;
$res=mysql_query($sql);
$result=mysql_num_rows($res);
//echo $result;
if($result<=1)

{
?>
	
<tr>

    <td ><strong>Patient name</strong> </td>
    <td ><strong>Contact </strong> </td>
    <td><strong>Action</strong> </td>
</tr>

<?php
}
?>


<?php

//print_r($_POST); exit;
if($_GET['decide'] == "Approved")

{

	
/*	$SQL = "UPDATE `booking_info` SET `status` = 'Cancel Request Rejected' WHERE `id` = '$agent' ";

$Query = mysql_query($SQL) ;
	
$SQL = "UPDATE `schedule_time` SET `status` = 'Booked' WHERE `slot_id` = ( SELECT `slot_id` FROM `booking_info` WHERE  `id` = '$agent') ";
$Query = mysql_query($SQL);*/



$SQL = "UPDATE `booking_info` SET `status` = 'Approved' WHERE `id` = '$agent' ";

//echo $SQL; exit;

$Query = mysql_query($SQL) ;
	
$SQL = "UPDATE `schedule_time` SET `status` = 'Booked' WHERE `slot_id` = ( SELECT `slot_id` FROM `booking_info` WHERE  `id` = '$agent') ";
$Query = mysql_query($SQL);

if($Query)
{
$msg="You Have Success fully approved";
}
//////////////


	$sql="SELECT * FROM `booking_info` WHERE `id` = '$agent'";
	echo $sql;
		$query = mysql_query($sql);
		
		if(mysql_num_rows($query)>0){
			
			while($rs = mysql_fetch_assoc($query)){
				
				$message="Your appointment on ".$rs['date_of_appointment']." was Approved by the admin. Kindly arrive at the time of appointment.";
				
					$sql = "INSERT INTO `messages` VALUES (NULL, 'admin', '".$rs['user_id']."', '$message','broadcast','booking Approved','unread','".date("Y-m-d")."','".$rs['slot_id']."','0')";
				
				$query = mysql_query($sql);
				
								$sqln= "UPDATE users SET `notification` = `notification` + 1 WHERE `user_id` = '".$rs['user_id']."'";
         	$notification = mysql_query($sqln) or die(mysql_error());




############################
      $badge = 1;
 $sql="SELECT * FROM `device_id` "; 
 $Query=mysql_query($sql);
while($Res=mysql_fetch_assoc($Query))
{
	$Row[]=$Res;
}
 

 $nr =mysql_num_rows($Query);
$itemsPerPage=19;
$lastPage=ceil($nr / $itemsPerPage);
$x=1;

while($x<=$lastPage) {
	
  $first=($x-1) * $itemsPerPage;
 
 $Change_Query=mysql_query("SELECT * FROM `device_id` WHERE user_id='".$rs['user_id']."' ORDER BY  `id` ASC limit $first,$itemsPerPage");
 
//echo "SELECT * FROM `device_id` WHERE user_id='".$rs['user_id']."'";
 while($change_Res=mysql_fetch_assoc($Change_Query))
 {
 	$New_Res[]=$change_Res;
 }
 foreach($New_Res as $value)
 {
   
  $passphrase = 'CasaDe';
	// Put your alert message here:
    //$message ="'".$_POST['message']."'";
	 $message ='Your appointment was Approved by the admin. Kindly arrive at the time of appointment.';
	 //$message1=$data;
	 ////////////////////////////////////////////////////////////////////////////////
	$ctx = stream_context_create();
	stream_context_set_option($ctx, 'ssl', 'local_cert', 'CasaDeck.pem');
	stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

// Open a connection to the APNS server
$fp = stream_socket_client(
	'ssl://gateway.sandbox.push.apple.com:2195', $err,
	$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

if (!$fp)
	exit("Failed to connect: $err $errstr" . PHP_EOL);

 $badge=$value['app_no']+1;
$Sql="UPDATE `device_id` SET `app_no`='".$badge."' WHERE `id`='".$value['id']."'";
echo $Sql;
											mysql_query($Sql);
											
// Create the payload body
$body['aps'] = array(
	'alert' =>'Your appointment was Approved by the admin. Kindly arrive at the time of appointment.',
         'badge' => $badge,
	'sound' => 'default',
	'page' => $_POST['redirect']
	);
// Encode the payload as JSON
$payload = json_encode($body);
//echo json_encode($body);
// Build the binary notification
echo $value['app_tokenid'];
$msg = chr(0) . pack('n', 32) . pack('H*', $value['app_tokenid']) . pack('n', strlen($payload)) . $payload;

// Send it to the server
$result = fwrite($fp, $msg, strlen($msg));

if (!$result)
	echo 'Message not delivered' . PHP_EOL;
else
	echo 'Message Successfully delivered';

// Close the connection to the server


fclose($fp);

 }
 $x++;
 $New_Res='';
 sleep(3);
echo "after Sleep $x".'<br>';
} 
mysql_close($Conn);


#####################################

				}
			
			}

////////
$slotid=mysql_fetch_array(mysql_query("SELECT `slot_id` FROM `booking_info` WHERE  `id` = '$agent'"));


$sq="SELECT * FROM `booking_info` WHERE `slot_id` = '".$slotid[0]."' AND `status` = 'Request Pending' ";
$qr = mysql_query($sq);

while($rsnotice=mysql_fetch_assoc($qr))
{
	
	
				$message="Your appointment on ".$rsnotice['date_of_appointment']." was Rejected by the admin. Kindly book another slot.";
				
					$sql = "INSERT INTO `messages` VALUES (NULL, 'admin', '".$rsnotice['user_id']."', '$message','broadcast','booking Rejected','unread','".date("Y-m-d")."','".$rsnotice['slot_id']."','0')";
				
				$query = mysql_query($sql);
				
								$sqln= "UPDATE users SET `notification` = `notification` + 1 WHERE `user_id` = '".$rsnotice['user_id']."'";
	$notification = mysql_query($sqln) or die(mysql_error());
	
	
	
	}


//$SQL = "UPDATE `booking_info` SET `status` = 'Request Rejected' WHERE `slot_id` = '".$slotid[0]."' AND `status` = 'Request Pending' ";
//$Query = mysql_query($SQL);
		
	}

//if($_GET['decide'] == "Cancelled")

if($_GET['decide'] == "Rejected")

{
	echo 'ghggjgj';
	$sq="SELECT * FROM `booking_info` WHERE `id` = '$agent' ";
$qr = mysql_query($sq);

while($rsnotice=mysql_fetch_assoc($qr))
{
	
	
				$message="Your appointment on ".$rsnotice['date_of_appointment']." was Rejected by the admin. Kindly book another slot.";
				
					$sql = "INSERT INTO `messages` VALUES (NULL, 'admin', '".$rsnotice['user_id']."', '$message','broadcast','booking Rejected','unread','".date("Y-m-d")."','".$rsnotice['slot_id']."','0')";
				
				$query = mysql_query($sql);
				
								$sqln= "UPDATE users SET `notification` = `notification` + 1 WHERE `user_id` = '".$rsnotice['user_id']."'";
	$notification = mysql_query($sqln) or die(mysql_error());
	
	#######################

	      $badge = 1;
 $sql="SELECT * FROM `device_id` "; 
 $Query=mysql_query($sql);
while($Res=mysql_fetch_assoc($Query))
{
	$Row[]=$Res;
}
 

 $nr =mysql_num_rows($Query);
$itemsPerPage=19;
$lastPage=ceil($nr / $itemsPerPage);
$x=1;

while($x<=$lastPage) {
	
  $first=($x-1) * $itemsPerPage;
 
 $Change_Query=mysql_query("SELECT * FROM `device_id` WHERE user_id='".$rs['user_id']."' ORDER BY  `id` ASC limit $first,$itemsPerPage");
 while($change_Res=mysql_fetch_assoc($Change_Query))
 {
 	$New_Res[]=$change_Res;
 }
 foreach($New_Res as $value)
 {
   
  $passphrase = 'CasaDe';
	// Put your alert message here:
    //$message ="'".$_POST['message']."'";
	 $message ='Your appointment was Rejected by the admin. Kindly book another slot.';
	 //$message1=$data;
	 ////////////////////////////////////////////////////////////////////////////////
	$ctx = stream_context_create();
	stream_context_set_option($ctx, 'ssl', 'local_cert', 'CasaDeck.pem');
	stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

// Open a connection to the APNS server
$fp = stream_socket_client(
	'ssl://gateway.sandbox.push.apple.com:2195', $err,
	$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

if (!$fp)
	exit("Failed to connect: $err $errstr" . PHP_EOL);

 $badge=$value['app_no']+1;
$Sql="UPDATE `device_id` SET `app_no`='".$badge."' WHERE `id`='".$value['id']."'";
	echo $Sql;										
											mysql_query($Sql,$Conn);
											
// Create the payload body
$body['aps'] = array(
	'alert' =>'Your appointment was Rejected by the admin. Kindly book another slot.',
     'badge' => $badge,
	'sound' => 'default',
	'page' => $_POST['redirect']
	);
// Encode the payload as JSON
$payload = json_encode($body);
//echo json_encode($body);
// Build the binary notification
echo $value['app_tokenid'];
$msg = chr(0) . pack('n', 32) . pack('H*', $value['app_tokenid']) . pack('n', strlen($payload)) . $payload;

// Send it to the server
$result = fwrite($fp, $msg, strlen($msg));

if (!$result)
	echo 'Message not delivered' . PHP_EOL;
else
	echo 'Message Successfully delivered';

// Close the connection to the server


fclose($fp);

 }
 $x++;
 $New_Res='';
 sleep(3);
echo "after Sleep $x".'<br>';
} 
mysql_close($Conn);








###################################

	
	}

	
	
	//$SQL = "UPDATE `booking_info` SET `status` = 'Cancel Request Approved' WHERE `id` = '$agent' ";
	
	$SQL = "UPDATE `booking_info` SET `status` = 'Request Rejected' WHERE `id` = '$agent' ";
	
if($Query = mysql_query($SQL))
{
$slot_id=$_GET['slot'];	
//echo 'slot'.$slot_id;
	
//$SQL = "UPDATE `schedule_time` SET `status` = 'Available for Booking' WHERE `slot_id` = ( SELECT `slot_id` FROM `booking_info` WHERE  `id` = '$agent') ";

//$numPacket=mysql_num_rows(mysql_query("SELECT * FROM booking_info WHERE `slot_id` ='$slot_id' AND `status`<>'Approved' AND `status`<>'Request Pending'"));

//$id=$_REQUEST['id'];
//$SQL="SELECT status FROM booking_info WHERE `slot_id` ='$slot_id' AND `status` NOT IN('Approved','Request Pending')";

$sel="SELECT status FROM booking_info WHERE `status`='Approved' OR `status`='Request Pending' AND `slot_id` ='$slot_id'";

$res=mysql_query($sel);
$row_cnt = mysql_num_rows($res);
if( $row_cnt > 0 ) 
{ 

}
else
{
$SQL = "UPDATE `schedule_time` SET `status` = 'Available for Booking' WHERE `slot_id` ='$slot_id'";
//echo $SQL; exit;
$Query1 = mysql_query($SQL);

}

}





}





/*$infoQL = "SELECT * FROM users WHERE user_id IN (SELECT user_id FROM booking_info WHERE slot_id = ( SELECT `slot_id` FROM `booking_info` WHERE  `id` = '$agent') AND status = 'Cancel Request Pending') ORDER BY u_name ASC";*/

$infoQL = "SELECT * FROM users WHERE user_id IN (SELECT user_id FROM booking_info WHERE slot_id = ( SELECT `slot_id` FROM `booking_info` WHERE  `id` = '$agent') AND status = 'Request Pending') ORDER BY u_name ASC";


$manufacturerQuery = mysql_query($infoQL);
while($rs = mysql_fetch_array ($manufacturerQuery)){ 
?>
<tr>
    <td ><?php echo stripslashes($rs["u_name"]); ?></td>
    <td ><?php echo stripslashes($rs["u_phone"]); ?></td> 
     <td>
    <select name="decide" id="decide">
    <option value="">Select Option</option>
    
    <?php /*?>    <option value="<?php echo $rs2["id"] ?>_Cancelled">Accept</option>
    <option value="<?php echo $rs2["id"] ?>_Approved">Reject</option><?php */?>
    
    <option value="<?php echo $rs["id"] ?>_Approved">Approve</option>
    <option value="<?php echo $rs["id"] ?>_Rejected">Reject</option>
    </select>
    
    </td>
</tr>


<?php 
}}

else {
$agent=date("Y-m-d",strtotime($_GET['agent']));

	$location_id=$_SESSION['loc'];

?>

  <tr class="raw">
    <td align="left" valign="top">Start Time</td>
    <td align="left" valign="top">End Time</td>
    <td align="left" valign="top">Status</td>
    <td align="left" valign="top">Action</td>
  </tr>
<?php
$SQL = "SELECT * FROM schedule_time WHERE date = '$agent' AND `location_id`='$location_id' ORDER BY slot_id ASC";


$Query = mysql_query($SQL);

$count= mysql_num_rows($Query) ;

if($count>0)
{
while($rs = mysql_fetch_array ($Query)){
	
	
	$rsu=mysql_fetch_array(mysql_query("SELECT * FROM users where user_id = (SELECT user_id FROM booking_info WHERE slot_id='".$rs["slot_id"]."' AND status='Approved')"));
	

?>
<tr <?php if ($rs['status']!="Available for Booking"){?> style="background-color:#FFFF00;"<?php } ?>>
<?php /*?>    <td><?php echo stripslashes($rs["date"]); ?></td><?php */?>
    <td><?php echo stripslashes($rs["start_time"]); ?></td>
    <td><?php echo stripslashes($rs["end_time"]); ?></td>
    

  <td><?php echo stripslashes($rs["status"]); ?></td>

    <td>
 <?php /*?>       <?php if($rs["status"]=="Cancel Request Pending") { ?><a href="booking.php?id=<?php echo ($rs["slot_id"]); ?>" >Manage booking</a>
	<?php }elseif($rs["status"]=="Booked"){ ?><a href="list_users.php?id=<?php echo $rsu["user_id"]; ?>" >View Client Details</a><?php }  else { ?> No actions available <?php } ?><?php */?>
    
    <?php if($rs["status"]=="Request Pending") { ?><a href="booking.php?id=<?php echo ($rs["slot_id"]); ?>" >Manage booking</a>
	<?php }elseif($rs["status"]=="Booked"){ ?><a href="booking.php?slot=<?php echo ($rs["slot_id"]); ?>&action=details" >Manage booking</a><?php }  else { ?> No actions available <?php } ?>
 

<!--<?php if($rs["status"]=="Request Pending") { ?><a href="booking.php?id=<?php echo ($rs["slot_id"]); ?>" >Manage booking</a>
	<?php }elseif($rs["status"]=="Booked"){ ?><a href="list_users.php?id=<?php echo $rsu["user_id"]; ?>" >View Client Details</a><?php }  else { ?> No actions available <?php } ?>-->






   
        <span style="float:right"><a onclick="return confirm('click OK to proceed.');" href="schedule.php?del_s=<?php echo ($rs["slot_id"]); ?>" >Delete Slot</a></span>
    </td>
</tr>


<?php 
}
}
else{
    ?>
<tr><td colspan="4">Sorry no data found</td></tr>
<?php
	/*$SQL = "SELECT * FROM default_schedule ORDER BY slot_id ASC";
$Query = mysql_query($SQL);


while($rs = mysql_fetch_array ($Query)){ */
?>
<!--<tr <?php if ($rs['status']!="Available for Booking"){?> style="background-color:#f6f6f6;"<?php } ?>>
<?php /*?>    <td><?php echo stripslashes($rs["date"]); ?></td><?php */?>
    <td><?php echo stripslashes($rs["start_time"]); ?></td>
    <td><?php echo stripslashes($rs["end_time"]); ?></td>
  <td><?php echo stripslashes($rs["status"]); ?></td>
   

    <td><?php /*?><a href="add_edit_schedule.php?edit=<?php echo ($rs["slot_id"]); ?>">Edit</a>
    <a href="schedule.php?del=<?php echo ($rs["slot_id"]); ?>" onclick="return confirm('Are you sure?');">Delete</a> <?php */?> 
    <?php if($rs["status"]=="Request Pending") { ?><span style="float:left"><a href="booking.php?id=<?php echo ($rs["slot_id"]); ?>" >Manage booking</a><?php } else { ?>No actions available</span><?php } ?>
    
    <span style="float:right"><a onclick="return confirm('click OK to proceed.');" href="schedule.php?del_s=<?php echo ($rs["slot_id"]); ?>&date=<?php echo $agent; ?>&loc=<?php echo $location_id; ?>" >Delete Slot</a></span>
    </td>
</tr>-->


<?php /*
}*/
	
	}


$sql = "SELECT * FROM schedule_time WHERE date = '$agent' AND status = 'Booked'";
	  $exePacket = mysql_query($sql) or die(mysql_error());
	  $numPacket = mysql_num_rows($exePacket);
	
?>		 
<tr><td></td>
<td></td>
<td></td>
<td>
<?php if(mysql_num_rows(mysql_query("SELECT * FROM schedule_time WHERE date = '$agent' AND `location_id`='$location_id'"))>0) { ?>

<a style="float:left" href="add_edit_schedule.php?edit=<?php echo $agent; ?>&loc=<?php echo $location_id; ?>"><button>Re Schedule</button></a><a style="float:right" href="schedule.php?del=<?php echo $agent; ?>" onclick="return confirm('Are you sure?');"><button>Delete Schedule</button></a>
<?php }} ?></td> </tr>
