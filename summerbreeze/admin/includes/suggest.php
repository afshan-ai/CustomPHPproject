<?php
header("Content-type: application/json");
require("../libs/config.php");


 $sql = "SELECT DISTINCT `u_name`,`user_id` FROM users WHERE `u_name` LIKE '".$_REQUEST['ch']."%'"; 

$result = mysql_query($sql);



while($arg=mysql_fetch_assoc($result))
{

	//$data[] = $arg['u_name'];
	
	$data[] = array("label"=>$arg['u_name'],"value"=>$arg['user_id']);
}



echo json_encode($data); 


?>