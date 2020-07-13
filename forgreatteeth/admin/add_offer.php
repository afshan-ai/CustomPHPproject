<?php
/*
* Author: Shahrukh Khan
*/
include("config.php");
include("includes/header.php");
if(isset($_REQUEST['sub']))
{
 
	
        $ongoing_query = "Insert into `dental3_offer` set `title`=:title,code=:code,description=:description";
   

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute(array(
         
           
            
            "title"=>$_REQUEST['title'],
             "code"=>$_REQUEST['code'],
           
            "description"=>$_REQUEST['description']
           
            ));
     
      ?>
      <script>window.location.href="offers.php"</script>
      <?php
}

?>

 <div class="height10"></div>
<div class="add-schedule">
<form method="post" action="" name="manufacturers" enctype="multipart/form-data">

<div class="shedule-form">
  <p><label><span>*</span>Title :</label>
  <input type="text" name="title"  required />
  </p>
  
    <p><label><span>*</span>Offer Code :</label>
  <input type="text" name="code"  required />
  </p>
  <p><label><span>*</span>Description :</label>
  <textarea name="description"  required></textarea>
  </p>
   
<p><input type="submit" name="sub" class="save-bt" value="Save"></p>


<div class="height0"></div>
 </div>
 </form>
</div>
<?php
include("includes/footer.php");
?>