<?php
// This is the API, 2 possibility show the user list, and show a specifique user by action.
require("libs/config.php");
require("libs/apiClass.php");
require("libs/mailClass.php");

$request=new apiClass();
$uid = getNumber($_GET['user_id']);
$sid = getNumber($_GET['slot_id']);
$u_name=$_GET['name'];
$u_email=$_GET['email'];
$u_addr=$_GET['addr'];
$u_contact=$_GET['contact'];
$u_pass=$_GET['pass'];
$date=date("Y-m-d",strtotime($_GET['date']));
$message=$_GET['message'];
$from=$_GET['from'];
$refer=$_GET['refer'];
$admin=$_GET['admin'];



if($_GET['apikey']== API_KEY ) {
	if ($_GET['request']=="user_create" && $u_name != "" && $u_pass != "") {
		header("Content-type: application/json");
		echo json_encode($request->create_user($u_name,$u_pass,$u_contact,$u_addr,$u_email));
	}else if ($_GET['request']=="get_referral" && $u_email != "" && $u_name != "") {
		header("Content-type: application/json");
		echo json_encode($request->get_referral($u_name,$u_addr,$u_email,$u_contact,$from));
	}
	
	else if ($_GET['request']=="book") {
		header("Content-type: application/json");
		echo json_encode($request->booking_rqst($uid,$sid,$date));
	}else if ($_GET['request']=="login") {
		header("Content-type: application/json");
		echo json_encode($request->login($u_email,$u_pass));
	}
	else if ($_GET['request']=="schedule") {
		header("Content-type: application/json");
		echo json_encode($request->schedule_slots($date));
	}
	else if ($_GET['request']=="list_users") {
		header("Content-type: application/json");
		echo json_encode($request->list_users());
	}else if ($_GET['request']=="announce") {
		header("Content-type: application/json");
		echo json_encode($request->announcement());
	}else if ($_GET['request']=="location") {
		header("Content-type: application/json");
		echo json_encode($request->locations());
	}else if ($_GET['request']=="get_message") {
		header("Content-type: application/json");
		echo json_encode($request->get_message($from,$message));
	}
	
	else if($_GET['request']=="mail") {
		header("Content-type: application/json");
		$obj =  new mailClass();
		$obj->setFields($_REQUEST["fname"], $_REQUEST["lname"],$_REQUEST["phonecell"], $_REQUEST["phonehome"], $_REQUEST["message"], $_REQUEST["uemail"], $_REQUEST["datetime"]);
		$res = $obj->sendMail();
		echo json_encode($res);
	} 
	

} else {
	echo "Invalid Api Key";	
}
?>