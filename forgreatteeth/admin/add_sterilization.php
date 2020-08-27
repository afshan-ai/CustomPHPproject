<?php
/*
* Author: Shahrukh Khan
*/
include("config.php");
include("includes/header.php");
if(isset($_REQUEST['sub']))
{
 
	
        $ongoing_query = "Insert into `dentalfor_sterilization` set `title`=:title,description=:description";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            
            "title"=>$_REQUEST['title'],
             
           
            "description"=>$_REQUEST['description']
           
            ));
     
      ?>
      <script>window.location.href="sterilization.php"</script>
      <?php
}

?>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
 <div class="height10"></div>
<div class="add-schedule">
<form method="post" action="" name="manufacturers" enctype="multipart/form-data">

<div class="shedule-form">
  <p><label><span>*</span>Title :</label>
  <input type="text" name="title"  required />
  </p>
  <p><label><span>*</span>Description :</label>
  <textarea  name="description" id="description" rows="10" required></textarea>
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