<?php
error_reporting(1);
define('UPLOAD_DIR','./');

$pic=time().rand(000,9999) .'.'.pathinfo($_FILES['imageName']['name'], PATHINFO_EXTENSION);
//$pic=rtrim($pic);
//$pic = $_FILES['imageName']['name'];
        $pic_loc = $_FILES['imageName']['tmp_name'];
        $folder="image/".$pic;
        if(move_uploaded_file($pic_loc,$folder))
        {
           echo json_encode([
"status" => "yes",
"filename"=>$pic
]);
        }
        else
        {
           $array['status']="fail";
        }
 ?>       