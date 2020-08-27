<?php
/*
* Author: Shahrukh Khan
*/
include("config.php");
include("includes/header.php");
if(isset($_REQUEST['sub']))
{
	
	$ongoing_query = "Insert into `dentalfor_insurance_provider` set `title`=:title,description=:description";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           "title"=>$_REQUEST["title"],
           "description"=>$_REQUEST["description"]
            
            ));

            ?>
            <script type="text/javascript">window.location.href="insurance_provider.php"</script>
            <?php
}
?>

 <div class="height10"></div>
<div class="add-schedule">
<form method="post" action="" name="manufacturers" enctype="multipart/form-data">
<input type="hidden" name="a_ID" value="<?php echo $modelRs["id"]; ?>"  />
<div class="shedule-form">
  <p><label><span>*</span>Name :</label>
  <input type="text" name="title"  required/>
  </p>
    <p><label><span>*</span>Description :</label>
<textarea name="description" required></textarea> 
  </p>  
  

       
            
<p><input type="submit" name="sub" class="save-bt" value="Save"></p>


<div class="height0"></div>
 </div>
 </form>
</div>
<?php
include("includes/footer.php");
?>