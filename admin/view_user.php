<?php
/*
* Author: Shahrukh Khan and Santanu Mondal
*/
require("libs/config.php");
if (!isUserLoggedIn()) redirect(SITE_ADMIN_URL."logout.php");
$pageTitle = "Registered User Listing";
$msg = '';
include("includes/header.php");

function checkAppleErrorResponse($fp) {

       $apple_error_response = fread($fp, 6); //byte1=always 8, byte2=StatusCode, bytes3,4,5,6=identifier(rowID). Should return nothing if OK.
       //NOTE: Make sure you set stream_set_blocking($fp, 0) or else fread will pause your script and wait forever when there is no response to be sent.

       if ($apple_error_response) {

            $error_response = unpack('Ccommand/Cstatus_code/Nidentifier', $apple_error_response); //unpack the error response (first byte 'command" should always be 8)

            if ($error_response['status_code'] == '0') {
                $error_response['status_code'] = '0-No errors encountered';

            } else if ($error_response['status_code'] == '1') {
                $error_response['status_code'] = '1-Processing error';

            } else if ($error_response['status_code'] == '2') {
                $error_response['status_code'] = '2-Missing device token';

            } else if ($error_response['status_code'] == '3') {
                $error_response['status_code'] = '3-Missing topic';

            } else if ($error_response['status_code'] == '4') {
                $error_response['status_code'] = '4-Missing payload';

            } else if ($error_response['status_code'] == '5') {
                $error_response['status_code'] = '5-Invalid token size';

            } else if ($error_response['status_code'] == '6') {
                $error_response['status_code'] = '6-Invalid topic size';

            } else if ($error_response['status_code'] == '7') {
                $error_response['status_code'] = '7-Invalid payload size';

            } else if ($error_response['status_code'] == '8') {
                $error_response['status_code'] = '8-Invalid token';

            } else if ($error_response['status_code'] == '255') {
                $error_response['status_code'] = '255-None (unknown)';

            } else {
                $error_response['status_code'] = $error_response['status_code'].'-Not listed';

            }

            echo '<br><b>+ + + + + + ERROR</b> Response Command:<b>' . $error_response['command'] . '</b>&nbsp;&nbsp;&nbsp;Identifier:<b>' . $error_response['identifier'] . '</b>&nbsp;&nbsp;&nbsp;Status:<b>' . $error_response['status_code'] . '</b><br>';
            echo 'Identifier is the rowID (index) in the database that caused the problem, and Apple will disconnect you from server. To continue sending Push Notifications, just start at the next rowID after this Identifier.<br>';

            return true;
       }
       return false;
    }

$id=$_GET['id'];
$msgid=$_GET['msgid'];
$slot_id=$_GET['slot_id'];

echo $msges; 


if (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) 
{
	

$SQL="UPDATE `messages` SET `noti_status`='1' WHERE id='".$_REQUEST["msgid"]."'";
$re=mysql_query($SQL);

       //$detailsSQL = "SELECT `u_name`,`address`,`u_email`, u_phone FROM users WHERE `user_id` = ".$_REQUEST["id"];
	
//$detailsSQL="select a.*,b.* from users as a, messages as b where b.id='".$_REQUEST["msgid"]."' and b.from='".$_REQUEST["id"]."'";

$detailsSQL="SELECT users.user_id,users.u_name,users.address,users.u_email,users.u_phone,booking_info.user_id,booking_info.slot_id,booking_info.status FROM users INNER JOIN booking_info ON users.user_id=booking_info.user_id WHERE  users.user_id='".$_REQUEST["id"]."' AND booking_info.slot_id='".$_REQUEST["slot_id"]."'";
//echo $detailsSQL; //exit;
$detailsQuery = mysql_query($detailsSQL);
	
}
?>  
<?php
if(isset($_POST['choice_top']))
			{	
				if($_POST['choice_top'] == 1 )
				{
					if($slot_id = $_REQUEST["slot_id"])
					{
						
$SQL="SELECT * FROM schedule_time WHERE slot_id='$slot_id'";
//echo $SQL;
$res=mysql_query($SQL);
$rs=mysql_fetch_array($res);
//print_r($rs);exit;

							$sql="UPDATE booking_info SET status='Approved' WHERE slot_id='$slot_id'";
							//echo $sql;
							if(mysql_query($sql))
								{
							          $qry="UPDATE schedule_time SET status='Booked' WHERE slot_id='$slot_id'";
									if(mysql_query($qry))
                                    
                                        {
       							$msges="Approved Successfully..";	




########################################
//  $deviceToken ='14cd9e48f8cd69ff9f004b4d9debd3d4960a5e53b1f8cae186359a100300569d';

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
 
 $Change_Query=mysql_query("SELECT * FROM `device_id` WHERE user_id='".$_REQUEST["id"]."' ORDER BY  `id` ASC limit $first,$itemsPerPage");
 
 $select_users_cnt = mysql_num_rows($Change_Query);	
		if($select_users_cnt>0)
		{
//echo "SELECT * FROM `device_id` WHERE user_id='".$rs['user_id']."'";
 while($change_Res=mysql_fetch_assoc($Change_Query))
 {
 	$New_Res[]=$change_Res;
 }
 foreach($New_Res as $value)
 {
   
//print_r($value); exit;
// $message ='Your appointment was Approved by the admin From'.$rs['start_time']. 'to' .$rs['end_time'].' on '.$rs['date'].' Kindly arrive at the time';
	//echo  $message;

  $passphrase = 'CasaDe';
	// Put your alert message here:
    //$message ="'".$_POST['message']."'";
	$message ='Just a reminder that your appointment is set for '.$rs['date'].' at '.$rs['start_time'].' to ' .$rs['end_time'].' Looking forward to your presence';
	 //$message1=$data;
	 ////////////////////////////////////////////////////////////////////////////////
	$ctx = stream_context_create();
	stream_context_set_option($ctx, 'ssl', 'local_cert', 'summerbridge_ck.pem');
	stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

// Open a connection to the APNS server
$fp = stream_socket_client(
	'ssl://gateway.push.apple.com:2195', $err,
	$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

if (!$fp)
	//checkAppleErrorResponse($fp); //We can check if an error has been returned while we are sending, but we also need to check once more after we are done sending in case there was a delay with error response.
        
	exit("Failed to connect: $err $errstr" . PHP_EOL);

 $badge=$value['app_no']+1;
$Sql="UPDATE `device_id` SET `app_no`='".$badge."' WHERE `id`='".$value['id']."'";
//echo $Sql;
											mysql_query($Sql);
			
// Create the payload body
$body['aps'] = array(
	'alert' =>'Just a reminder that your appointment is set for '.$rs['date'].' at '.$rs['start_time'].' to ' .$rs['end_time'].' Looking forward to your presence',
         'badge' => $badge,
	'sound' => 'default',
	'page' => $_POST['redirect']
	);
// Encode the payload as JSON
$payload = json_encode($body);
//echo json_encode($body);
// Build the binary notification
//echo $value['app_tokenid'];
//$msg = chr(0) . pack('n', 32) . pack('H*', $value['app_tokenid']) . pack('n', strlen($payload)) . $payload;
$deviceToken = $value['app_tokenid'];
$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

// Send it to the server
$result = fwrite($fp, $msg, strlen($msg));

//if (!$result)
	//echo 'Message not delivered' . PHP_EOL;
//else
	//echo 'Message Successfully delivered';

// Close the connection to the server


fclose($fp);

 }
}



 $x++;
 $New_Res='';
 sleep(3);
//echo "after Sleep $x".'<br>';
} 
//mysql_close($Conn);




 $qry1="UPDATE messages SET subject='Appointment Approved',`message`='Your appointment request has been Approved' WHERE slot_id='$slot_id'";
		mysql_query($qry1);
                


}

									
								}
								else
								{
									$msges="Some Error Occurred";
								}
						
					
					}
					else
					{
						$msges = "select value Please";
					}
				}
				else if($_POST['choice_top'] == 2)
				{
					if($slot_id =$_REQUEST["slot_id"])
					{
						

$SQL="SELECT * FROM schedule_time WHERE slot_id='$slot_id'";
//echo $SQL;
$res=mysql_query($SQL);
$rs=mysql_fetch_array($res);

							$sql="UPDATE booking_info SET status='Rejected' WHERE slot_id='$slot_id'";
							//echo $sql;
							if(mysql_query($sql))
								{

								$qry="UPDATE schedule_time SET status='Rejected' WHERE slot_id='$slot_id'";
								if(mysql_query($qry))
								{
								
									
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
 
 $Change_Query=mysql_query("SELECT * FROM `device_id` WHERE user_id='".$_REQUEST["id"]."' ORDER BY  `id` ASC limit $first,$itemsPerPage");
 $select_users_cnt = mysql_num_rows($Change_Query);	
		if($select_users_cnt>0)
		{

 while($change_Res=mysql_fetch_assoc($Change_Query))
 {
 	$New_Res[]=$change_Res;
 }
 foreach($New_Res as $value)
 {
   
  $passphrase = 'CasaDe';
	// Put your alert message here:
    //$message ="'".$_POST['message']."'";
	$message ='Please note that your appointment request on '.$rs['date'].' at '.$rs['start_time'].' to '.$rs['end_time'].' has been rejected  due to an overbooking on that day. Kindly resubmit your appointment request for a new time';
 //$message1=$data;
	 ////////////////////////////////////////////////////////////////////////////////
	$ctx = stream_context_create();
	stream_context_set_option($ctx, 'ssl', 'local_cert', 'CasaDck.pem');
	stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

// Open a connection to the APNS server
$fp = stream_socket_client(
	'ssl://gateway.push.apple.com:2195', $err,
	$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

if (!$fp)
	// checkAppleErrorResponse($fp); //We can check if an error has been returned while we are sending, but we also need to check once more after we are done sending in case there was a delay with error response.
        
	exit("Failed to connect: $err $errstr" . PHP_EOL);

 $badge=$value['app_no']+1;
$Sql="UPDATE `device_id` SET `app_no`='".$badge."' WHERE `id`='".$value['id']."'";
	//echo $Sql;										
mysql_query($Sql);
											
// Create the payload body
$body['aps'] = array(
	'alert' =>'Please note that your appointment request on '.$rs['date'].' at '.$rs['start_time'].' to '.$rs['end_time'].' has been rejected  due to an overbooking on that day. Kindly resubmit your appointment request for a new time',
     'badge' => $badge,
	'sound' => 'default',
	'page' => $_POST['redirect']
	);
// Encode the payload as JSON
$payload = json_encode($body);
//echo json_encode($body);
// Build the binary notification
//echo $value['app_tokenid'];
$msg = chr(0) . pack('n', 32) . pack('H*', $value['app_tokenid']) . pack('n', strlen($payload)) . $payload;

// Send it to the server
$result = fwrite($fp, $msg, strlen($msg));

//if (!$result)
	//echo 'Message not delivered' . PHP_EOL;
//else
//	echo 'Message Successfully delivered';

// Close the connection to the server


fclose($fp);

 }
}
 $x++;
 $New_Res='';
 sleep(3);
//echo "after Sleep $x".'<br>';
} 
//mysql_close($Conn);

$msges="Updated Successfully..";


 $qry1="UPDATE messages SET subject='Appointment Rejected',`message`='Your appointment request has been Rejected' WHERE slot_id='$slot_id'";
		mysql_query($qry1);


								}

									
								}
								else
								{
									$msges="Some Error Occurred";
								}
						
					
					}
					else
					{
						$msges = "select value Please";
					}
				}
				else if($_POST['choice_top'] == 3)	
				{
					//echo $_POST['choice_top']; 
				if($slot_id = $_REQUEST["slot_id"])
				{
			
				//Then do what you want with the selected items://
				
					$sql ="DELETE FROM booking_info WHERE slot_id='$slot_id'";
					if(mysql_query($sql))				
					{

$qry="DELETE FROM schedule_time SWHERE slot_id='$slot_id'";
								if(mysql_query($qry))
								{
								$msges = "The selected appointment have been successfully deleted.";				
								}
						
					}
					else
					{
						$msges = "An error has occurred";
					}
				
			  
			   
			}
			else
			   {
			   		$msges="select value please";
			   }


			}
?>

<script>
window.location.href="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $id;?>&msgid=<?php echo $msgid;?>&slot_id=<?php echo $slot_id;?>"
</script>
<?php
//header("location:announcements.php");

		}
?>
<div class="height30"></div>
<div class="schedule-details sch-detl">
 <?php if($_GET['slot_id']!=0)
{
 ?>


<form name="frm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $id;?>&msgid=<?php echo $msgid;?>&slot_id=<?php echo $slot_id;?>" enctype="multipart/form-data"> 

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr class="raw">
    <td align="left" valign="top">Name</td>
    <td align="left" valign="top">Address</td>
    <td align="left" valign="top">Email</td>
    <td align="left" valign="top">Contact</td>
    <td align="left" valign="top">Schedule Time</td>
   <td align="left" valign="top">Status</td>
   <td>Action</td>
  </tr>
<?php
while($rs = mysql_fetch_array ($detailsQuery))
{
$qry="SELECT * FROM schedule_time WHERE slot_id='".$rs["slot_id"]."'";
//echo $qry;
$res=mysql_query($qry);
$row=mysql_fetch_array($res);
?>
  <tr>
<!--<td><input name="slot_id" id="slot_id" type="hidden" value="<?php echo $row['slot_id'];?>">-->
</td>
   <td ><?php echo stripslashes($rs["u_name"]); ?></td>
   <td ><?php echo stripslashes($rs["address"]); ?></td>
   <td ><?php echo stripslashes($rs["u_email"]); ?></td>
    <td ><?php echo stripslashes($rs["u_phone"]); ?></td>
   <td><?php echo stripslashes($row["start_time"]); ?>-<?php echo stripslashes($row["end_time"]); ?></td>
    <td><?php echo stripslashes($rs["status"]); ?></td>
    <td>
    <div class="notification-sec">
    <select name="choice_top" id="choice">
<option>Select</option>
<option value="1">Approved</option>
<option value="2">Rejected</option>
<option value="3">Delete</option>
</select>

<input type="submit" class="save-bt1" value="Ok">
</div>
</td>
  </tr>
  <?php 
}
?>
</table>

</form>
<?php }else{?>
<!--###################################-->



<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr class="raw">
<td align="left" valign="top">Name</td>
<td align="left" valign="top">Address</td>
<td align="left" valign="top">Email</td>
<td align="left" valign="top">Contact</td>
</tr>
<?php
$detailsSQL="SELECT users.user_id,users.u_name,users.address,
users.u_email,users.u_phone FROM users WHERE  users.user_id='".$_REQUEST["id"]."'";
//echo $detailsSQL; //exit;
$detailsQuery = mysql_query($detailsSQL);

while($rs = mysql_fetch_array ($detailsQuery))
{
$qry="SELECT * FROM schedule_time WHERE slot_id='".$rs["slot_id"]."'";
//echo $qry;
$res=mysql_query($qry);
$row=mysql_fetch_array($res);
?>
  <tr>
<!--<td><input name="slot_id" id="slot_id" type="hidden" value="<?php echo $row['slot_id'];?>">-->
</td>
   <td ><?php echo stripslashes($rs["u_name"]); ?></td>
   <td ><?php echo stripslashes($rs["address"]); ?></td>
   <td ><?php echo stripslashes($rs["u_email"]); ?></td>
    <td ><?php echo stripslashes($rs["u_phone"]); ?></td>
     </tr>
  <?php 
}
?>
</table>






<!--###################################-->
<?php } ?>
</div>

<?php
include("includes/footer.php");
?>
