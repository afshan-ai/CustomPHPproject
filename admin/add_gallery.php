<?php
/*
* Author: Shahrukh Khan
*/
include("config.php");
include("includes/header.php");
if(isset($_REQUEST['sub']))
{
	$folder='provider/';
	$time= time();
	$con=	$folder.$time.$_FILES['image']['name'];
	$file = $time.$_FILES['image']['name'];
	move_uploaded_file($_FILES['image']['tmp_name'], $con);
	$ongoing_query = "Insert into `dental_gallery` set `title`=:title,image=:image";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "title"=>$_REQUEST["title"],
           
            "image" =>$file
            ));
}
?>

 <div class="height50"></div>
<div class="add-schedule">
<form method="post" action="" name="manufacturers" enctype="multipart/form-data">
<input type="hidden" name="a_ID" value="<?php echo $modelRs["id"]; ?>"  />
<div class="shedule-form">
  <p><label><span>*</span>Name :</label>
  <input type="text" name="title"  />
  </p>
   
  <p><label><span>*</span>Image :</label>
 <input type="file" name="image" />
   </p>

            
<p><input type="submit" name="sub" class="save-bt" value="Save"></p>


<div class="height0"></div>
 </div>
 </form>
</div>
<?php
include("includes/footer.php");
?>