<?php
/*
* Author: Shahrukh Khan
*/
include("config.php");
include("includes/header.php");

$query_device = "select * from `dental3_sterilization` where id=:id";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array("id"=>$_REQUEST['id']));
    $result = $statement_device->fetch();
  
?>


 <div class="height50"></div>
<div class="add-schedule">
<form method="post" action="" name="manufacturers" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>"/>
<div class="shedule-form">
  <p><label><b>Title :</b></label></p>
<p>  <?php echo $result->title;?>" </p>
  
  
  <p><label><b>Description :</b></label></p>
<p>  <?php echo $result->description;?>
   
  </p>
   



<div class="height0"></div>
 </div>
 </form>
</div>
<?php
include("includes/footer.php");
?>