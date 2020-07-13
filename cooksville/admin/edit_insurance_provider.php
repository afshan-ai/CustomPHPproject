<?php
/*
* Author: Shahrukh Khan
*/
include("config.php");
include("includes/header.php");
if(isset($_REQUEST['sub']))
{
	
	$ongoing_query = "update `dental1_insurance_provider` set `title`=:title,description=:description where id=:id";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "title"=>$_REQUEST["title"],
           "description"=>$_REQUEST["description"],
            "id"=>$_REQUEST['id']
            ));

            ?>
            <script type="text/javascript">window.location.href="insurance_provider.php"</script>
            <?php
}
?>
<?php
 $query_device = "select * from `dental1_insurance_provider` where id=:id";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array("id"=>$_REQUEST['id']));
    $insurance = $statement_device->fetch();
        
?>
 <div class="height10"></div>
<div class="add-schedule">
<form method="post" action="" name="manufacturers" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $_REQUEST["id"]; ?>"  />
<div class="shedule-form">
  <p><label><span>*</span>Name :</label>
  <input type="text" name="title"  value="<?php echo $insurance->title;?>" required/>
  </p>
    <p><label><span>*</span>Description :</label>
<textarea name="description" required><?php echo $insurance->description;?></textarea> 
  </p>  
  

       
            
<p><input type="submit" name="sub" class="save-bt" value="Save"></p>


<div class="height0"></div>
 </div>
 </form>
</div>
<?php
include("includes/footer.php");
?>