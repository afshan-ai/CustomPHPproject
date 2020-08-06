<?php
/*
* Author: Shahrukh Khan
*/
include("config.php");
include("includes/header.php");
if(isset($_REQUEST['sub']))
{
 
	
        $ongoing_query = "Update `dentalmarcelo_sterilization` set `title`=:title,description=:description where id=:id";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            
            "title"=>$_REQUEST['title'],
            
            "description"=>$_REQUEST['description'],
            "id"=>$_REQUEST['id']
           
            ));
     
      
}
$query_device = "select * from `dentalmarcelo_sterilization` where id=:id";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array("id"=>$_REQUEST['id']));
    $result = $statement_device->fetch();
  
?>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

 <div class="height10"></div>
<div class="add-schedule">
<form method="post" action="" name="manufacturers" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>"/>
<div class="shedule-form">
  <p><label><span>*</span>Title :</label>
  <input type="text" name="title"  value="<?php echo $result->title;?>" required />
  </p>
  
  <p><label><span>*</span>Description :</label>
  <textarea name="description" id="description" required><?php echo $result->description;?></textarea>
   <script>
              CKEDITOR.replace( 'description' );
              </script>
  </p>
   
<p><input type="submit" name="sub" class="save-bt" value="Save"></p>


<div class="height0"></div>
 </div>
 </form>
</div>
<?php
include("includes/footer.php");
?>