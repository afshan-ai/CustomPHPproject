<?php
/*
* Author: Shahrukh Khan
*/
include("config.php");
include("includes/header.php");
if(isset($_REQUEST['sub']))
{
 
	
        $ongoing_query = "update `dentalfor_review` set `approve`=:approve where id=:id";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
          
           "approve"=>$_REQUEST['approve'],
            
            "id"=>$_REQUEST['id']
            ));
     
      
}

?>
<?php
 $query_device = "select * from `dentalfor_review` where id=:id order by id desc";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array("id"=>$_REQUEST['id']));
    $provider = $statement_device->fetch();
    
      
?>
 <div class="height10"></div>
<div class="add-schedule">
<form method="post" action="" name="manufacturers" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $_REQUEST["id"]; ?>"  />
<div class="shedule-form">
  <p><label><span>*</span>Approve :</label>
  <select name="approve">
    <option value="1" <?php if($provider->approve==1) echo 'selected="selected"';?>>Yes</option>
    <option value="0" <?php if($provider->approve==0) echo 'selected="selected"';?>>No</option>
  </select>
  </p>
  
     
 
<p><input type="submit" name="sub" class="save-bt" value="Save"></p>


<div class="height0"></div>
 </div>
 </form>
</div>
<?php
include("includes/footer.php");
?>